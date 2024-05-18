<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function recentProducts()
    {
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function productDetails(string $id){
        $product = Product::findOrFail($id); // Fetch the product by its ID
        return response()->json([
            'product' => $product,
            'code' => 200
        ], 200, [], JSON_PRETTY_PRINT);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
