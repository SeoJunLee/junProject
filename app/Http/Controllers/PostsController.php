<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostsRequest;

use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware('auth', ['expect' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(3);
//        dd($posts);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        $post = new Post;

        return view('posts.create', compact('post'));
    }

    public function store(PostsRequest $request)
    {
        $post = $request->user()
                        ->posts()
                        ->create($request->all());

        event(new \App\Events\PostCreated($post));

        return redirect(route('post.show', $post->id));
    }

    public function show(Post $post)
    {
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(PostsRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->all());

        return redirect(route('posts.show', $post->id));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return response()->json([], 204);
    }
}
