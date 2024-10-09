<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Image::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $image = Image::query()->create([
            'name' => $request['name'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Image created successfully',
            'status' => 'success',
            'category' => $image
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $image = Image::query()->findOrFail($id);

        return response()->json($image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $image = Image::query()->findOrFail($id);
        $image->update([
            'name' => $request['name'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Image updated successfully',
            'category' => $image
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $image = Image::query()->findOrFail($id);

        // Delete the category
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }
}
