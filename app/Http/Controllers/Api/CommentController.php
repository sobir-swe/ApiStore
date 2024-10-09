<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // Create a new category without validation
        $category = Category::query()->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $request['image'],
            'parent_id' => $request['parent_id'],
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'status' => 'success',
            'category' => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $category = Category::query()->findOrFail($id);

        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $category = Category::query()->findOrFail($id);

        // Update the category without validation
        $category->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $request['image'],
            'parent_id' => $request['parent_id'],
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $category = Category::query()->findOrFail($id);

        // Delete the category
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
