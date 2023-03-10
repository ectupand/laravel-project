<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request, string $slug)
    {
        $validated = $request->safe()->all();
        $created_comment = Comment::create([
            'theme' => $validated['subject'],
            'text' => $validated['body'],
            'article_id' => $slug
        ]);
        return new CommentResource($created_comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new CommentResource(Comment::findOrFail($id));
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
