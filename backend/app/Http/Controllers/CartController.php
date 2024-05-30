<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $cartItem = $this->checkIfProductInCart($validatedData['user_id'], $validatedData['product_id']);

            if ($cartItem) {
                // If the product is already in the cart, update the quantity
                $cartItem->quantity += $validatedData['quantity'];
                if (!$cartItem->save()) {
                    throw new \Exception('Failed to update product quantity in cart');
                }

                DB::commit();
                return response()->json(['message' => 'Product quantity updated successfully', 'cartItem' => $cartItem], 200);
            } else {
                // If the product is not in the cart, create a new cart item
                $cartItem = Cart::create([
                    'user_id' => $validatedData['user_id'],
                    'product_id' => $validatedData['product_id'],
                    'quantity' => $validatedData['quantity'],
                ]);

                if (!$cartItem) {
                    throw new \Exception('Failed to add product to cart');
                }

                DB::commit();
                return response()->json(['message' => 'Product added to cart successfully'], 201);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    private function checkIfProductInCart($userId, $productId){
        return Cart::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();
    }

    public function getCartProducts($userId) {
        // Fetch products and their quantities from the cart where user_id matches the given $userId
        $products = Product::whereIn('products.id', function($query) use ($userId) {
                            $query->select('product_id')
                                ->from('cart')
                                ->where('user_id', $userId);
                        })
                        ->select('products.id', 'products.name', 'products.description', 'products.price', 'products.image_1', 'products.discount', 'products.category', 'products.shipping', 'cart.quantity')
                        ->leftJoin('cart', 'products.id', '=', 'cart.product_id')
                        ->get();

        // Calculate the total price for each product, including discounts
        $products->each(function ($product) {
            $discountedPrice = $product->price * (1 - $product->discount / 100); // Calculate the discounted price
            $product->total_price = $discountedPrice * $product->quantity; // Multiply the discounted price by the quantity
        });

        // Calculate the total price for all products in the cart
        $totalPrice = $products->sum('total_price');

        // Check if there are no products in the cart
        if ($products->isEmpty()) {
            return response()->json(['message' => "There's no products in your cart"], 404);
        }

        // Return the products along with the total price
        return response()->json(['products' => $products, 'total_price' => $totalPrice], 200);
    }



    public function delete($id){
        // Assuming you have a Cart model
        $cartItem = Cart::where('product_id', $id)->first();

        if(!$cartItem){
            return response()->json([
                'message' => 'Cart item not found',
                'code' => 404,
            ]);
        }

        $deleted = $cartItem->delete();

        if(!$deleted){
            return response()->json([
                'message' => 'Product not removed from cart',
                'code' => 500,
            ]);
        }

        return response()->json([
            'message' => 'Product removed from cart',
            'code' => 200,
        ]);
    }

    public function getCount($userId){
        // Count the number of rows in the cart table where user_id matches the given $userId
        $productCount = Cart::where('user_id', $userId)->count();

        // Return the product count
        return response()->json(['products_count' => $productCount], 200);
    }


}
