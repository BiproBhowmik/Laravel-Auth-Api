<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function storePost(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required',
        ]);

        $post = new Post;

        $post->user_id = $request->input('user_id');
        $post->post_text = $request->input('post_text');

        return $post->save();
    }

    public function allPosts()
    {
        return Post::select('*')->with('user')->get();
    }
}
