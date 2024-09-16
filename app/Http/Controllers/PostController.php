<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $posts = Post::latest()->paginate(10);
            return view("posts.auth.index")->with("posts", $posts);
        } else {
            $posts = Post::latest()->paginate(11);
            return view("posts.guest.index")->with("posts", $posts);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.auth.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // todo : validate request data

        $path = Storage::putFile("public/images", $request->file("image"));
        $filename = basename($path);
        try {
            $post = new Post();
            $post->title = $request->input("title");
            $post->slug = Str::slug($post->title);
            $post->content = $request->input("content");
            $post->excerpt = Str::words($post->content, 25, " ...");
            $post->featured_image = $filename;
            $post->save();
        } catch (Exception $e) {
            return back()->with("error", "Post not added!");
        }

        return redirect()
            ->route("posts.index")
            ->with([
                "success" => "Post added successfully!",
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.guest.show")->with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.auth.edit")->with("post", $post);
        // $founded = Post::find($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $path = Storage::putFile("public/images", $request->file("image"));
        $filename = basename($path);
        
        try {
            $request->merge(['featured_image' => $filename ]);
            $post->update($request->all());
        } catch (Exception $e) {
            return back()->with("error", "Post not updated!");
        }
        return redirect()
            ->route("posts.index")
            ->with("success", "Post has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (Exception $e) {
            return redirect()
                ->route("posts.index")
                ->with("error", "Post not deleted !");
        }
        return redirect()
            ->route("posts.index")
            ->with("success", "Post has been deleted !");
    }
}
