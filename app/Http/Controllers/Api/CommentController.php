<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $comment = Comment::query()->create([
            'comment' => $request['comment'],
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Comment created successfully',
            'status' => 'success',
            'category' => $comment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $comment = Comment::query()->findOrFail($id);

        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $comment = Comment::query()->findOrFail($id);
        $comment->update([
            'comment' => $request['comment'],
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
        ]);

        return response()->json([
            'message' => 'Comment updated successfully',
            'category' => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        // Fetch the category by id
        $comment = Comment::query()->findOrFail($id);

        // Delete the category
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
