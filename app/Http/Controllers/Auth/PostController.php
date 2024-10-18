<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::simplePaginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }


    public function store(Request $request)

    {
        $validated = $request->validate([

            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
        ]);
        // dd($request->all());
        $post = Post::create([
            'user_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);

        $request->session()->flash('alert-success', 'Post Created Successful');
        return to_route('posts.index');

        foreach ($request->tags as $tag) {
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }
    }


    public function show(Post $post) {

        return view('posts.show',compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Request $request, Post $post)
    {
        $post->update([

           'user_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,

        ]);

        foreach ($request->tags as $tag) {
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }

        $request->session()->flash('alert-success', 'Post Updated Successful');
        return to_route('posts.index');
    }


    public function destroy(Post $post)
    {
        // return $id;
        // $post = Post::find($id);

        // // if (! $post)
        // if(! $post)
        // {
        //     abort(404);
        // }
        $post->tags()->detach();
        $post->delete();
        return to_route('posts.index');
        $request->session()->flash('alert-success', 'Post Deleted Successful');
    }
}
