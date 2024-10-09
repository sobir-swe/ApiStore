<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $product = Product::query()->create([
            'name' =>$request['name'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'category_id' =>$request['category_id'],
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'status' => 'success',
            'category' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $product = Product::query()->findOrFail($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $product = Product::query()->findOrFail($id);
        $product->update([
            'name' =>$request['name'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'category_id' =>$request['category_id'],
        ]);

        return response()->json([
            'message' => 'Product updated successfully',
            'category' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $product = Product::query()->findOrFail($id);

        // Delete the category
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
