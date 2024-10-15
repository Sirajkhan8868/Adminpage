<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;

use App\Models\PostTag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {

        // Validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
            'tags' => 'required|array', // Make sure tags are passed as an array
        ]);

        // Create the post
        $post = Post::create([
            'user_id' => 1, // Use auth()->id() for actual logged-in user
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);

        // Attach tags to the post
        foreach ($request->tags as $tag) {
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}

