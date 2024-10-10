<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return OrderProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $order_product = OrderProduct::query()->create([
            'order_id' => $request['order_id'],
            'product_id' => $request['product_id'],
            'price' => $request['price'],
        ]);

        return response()->json([
            'message' => 'OrderProduct created successfully',
            'status' => 'success',
            'category' => $order_product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $order_product = OrderProduct::query()->findOrFail($id);

        return response()->json($order_product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $order_product = OrderProduct::query()->findOrFail($id);
        $order_product->update([
            'order_id' => $request['order_id'],
            'product_id' => $request['product_id'],
            'price' => $request['price'],
        ]);

        return response()->json([
            'message' => 'OrderProduct updated successfully',
            'category' => $order_product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $order_product = OrderProduct::query()->findOrFail($id);

        // Delete the category
        $order_product->delete();

        return response()->json(['message' => 'OrderProduct deleted successfully']);
    }
}
