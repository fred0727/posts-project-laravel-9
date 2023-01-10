<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create',['post'=>$post]);
    }

    public function store(Request $request)
    {
        // Para validar que todos los campos sean requeridos
        $request->validate([
            'title'=> 'required',
            'slug'=> 'required|unique:posts,slug',
            'body'=> 'required',
        ]);

        $post = $request->user()->posts()->create([
            'title'=> $request->title,
            'slug'=> $request->slug,
            'body'=>$request->body,
        ]);
        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request, Post $post)
    {
        // Para validar que todos los campos sean requeridos
        $request->validate([
            'title'=> 'required',
            // .$post->id para ignorar el id actual
            'slug'=> 'required|unique:posts,slug,'.$post->id,
            'body'=> 'required',
        ]);

        $post->update([
            'title'=> $request->title,
            'slug'=> $request->slug,
            'body'=>$request->body,
        ]);
        // Para redireccionar a otra vista
        return redirect()->route('posts.index', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
