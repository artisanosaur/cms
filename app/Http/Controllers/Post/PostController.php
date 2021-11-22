<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        return view('post.list', [
            'posts' => $posts
        ]);
    }

    public function show(int $gameId)
    {
        $post = Post::find($gameId);

        return view('post.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function submitCreate(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $post = new Post($request->all());
        $post->image = $request->file('image')->store('images');
        $post->save();

        return redirect()->route('post.list')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function submitEdit(Request $request, Post $post)
    {
        $post->fill($request->all());

        if($request->hasFile('image')){
            $post->image = $request->file('image')->store('images');
        }
        $post->save();

        return redirect()->route('post.list')
            ->with('success', 'Product updated successfully');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('post.list')
            ->with('success','Product deleted successfully');

    }
}
