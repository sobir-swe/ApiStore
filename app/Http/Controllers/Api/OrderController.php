<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $order = Order::query()->create([
            'user_id' => $request['user_id'],
            'status' => $request['status'],
            'total_amount' => $request['total_amount'],
        ]);

        return response()->json([
            'message' => 'Order created successfully',
            'status' => 'success',
            'category' => $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $order = Order::query()->findOrFail($id);

        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $order = Order::query()->findOrFail($id);
        $order->update([
            'user_id' => $request['user_id'],
            'status' => $request['status'],
            'total_amount' => $request['total_amount'],
        ]);

        return response()->json([
            'message' => 'Order updated successfully',
            'category' => $order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $order = Order::query()->findOrFail($id);

        // Delete the category
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
