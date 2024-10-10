<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Cart::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::query()->create([
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Cart created successfully',
            'status' => 'success',
            'category' => $cart
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::query()->findOrFail($id);

        return response()->json($cart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::query()->findOrFail($id);
        $cart->update([
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Cart updated successfully',
            'category' => $cart
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $cart = Cart::query()->findOrFail($id);

        // Delete the category
        $cart->delete();

        return response()->json(['message' => 'Cart deleted successfully']);
    }
}
