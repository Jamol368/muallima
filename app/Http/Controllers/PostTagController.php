<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostTagRequest;
use App\Http\Requests\UpdatePostTagRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Tag;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePostTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($postTag, string $slug)
    {
        $posts = Post::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->simplePaginate(6);

        return view('post.index', [
            'posts' => $posts,
            'categories' => PostCategory::all(),
            'recent_posts' => Post::orderBy('id')->limit(5)->get(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostTag $postTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostTagRequest $request, PostTag $postTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostTag $postTag)
    {
        //
    }
}
