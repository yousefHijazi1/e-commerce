<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function recentProducts(){
        $recent_products = Product::latest()->get();
        return response()->json([
            'recent_products' => $recent_products,
            'code' => 200
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function allProducts(){
        $products = Product::inRandomOrder()->get();
        return response()->json([
            'products' => $products,
            'code' => 200
        ], 200, [], JSON_PRETTY_PRINT);
    }


    public function productsByCategory(string $category){
        // Fetch products by category
        $products = Product::where('category', $category)->get();

        // Check if any products are found
        if ($products->isEmpty()) {
            // If no products are found, return a 404 status code with an error message
            return response()->json([
                'message' => 'There are no products in this category',
                'code' => 404,
            ], 404, [], JSON_PRETTY_PRINT);
        } else {
            // If products are found, return them with a 200 status code
            return response()->json([
                'products' => $products,
                'code' => 200
            ], 200, [], JSON_PRETTY_PRINT);
        }
    }


    public function getProductCategory(string $searchItem){
        // Fetch the product based on the product name
        $product = Product::where('name', $searchItem)->first();

        // If product is found, return its category, otherwise return null
        $category = $product ? $product->category : null;

        return response()->json([
            'category' => $category,
            'code' => 200
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function getProductsNames(string $searchItem){
        $searchTerm = $searchItem;

        // Fetch categories from the database and filter them based on the search term
        $productsNames = Product::where('name', 'like', '%'.$searchTerm.'%')
                            ->orWhere('description', 'like', '%'.$searchTerm.'%')
                            ->pluck('name') // Assuming the category column name is 'category'
                            ->unique(); // Ensure unique category names

        // Return filtered productsNames as a JSON response
        return response()->json(['productsNames' => $productsNames]);
    }


    public function productDetails(string $id){
        try {
            // Fetch the product by its ID, or throw a ModelNotFoundException if not found
            $product = Product::findOrFail($id);

            // If the product is found, return it with a 200 status code
            return response()->json([
                'product' => $product,
                'code' => 200
            ], 200, [], JSON_PRETTY_PRINT);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If no product is found, return a 404 status code with an error message
            return response()->json([
                'message' => 'There is no product with this ID',
                'code' => 404,
            ], 404, [], JSON_PRETTY_PRINT);
        }
    }

    


}
