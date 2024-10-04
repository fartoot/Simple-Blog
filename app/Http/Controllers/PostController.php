<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
            return view('posts.auth.index')->with('posts', $posts);
        } else {
            $posts = Post::where('status',true)->latest()->paginate(11);
            return view('posts.guest.index')->with('posts', $posts);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.auth.create')->with("tags",$tags)->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // todo : validate request data
        try {
            $post = new Post();
            if (strtolower($request->input('status')) == 'publish') {
                $post->status = true;
            } else {
                $post->status = false;
            }
            
            if (!empty($request->file('image'))) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $filename = basename($path);
                $post->featured_image = $filename;
            }else{
                $post->featured_image = '';
            }
            $post->title = $request->input('title');
            $post->slug = Str::slug($post->title);
            $post->content = $request->input('content');
            $post->excerpt = Str::words($post->content, 25, ' ...');
            $post->category_id = $request->input('category');
            $post->save();
            $post->tags()->attach($request->input('tags'));
        } catch (Exception $e) {
            dd($e);
            return back()->with('error', 'Post not added!');
        }

        return redirect()
            ->route('posts.index')
            ->with([
                'success' => 'Post added successfully!',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.guest.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {  
        $tags = Tag::all();
        $selectedTags = $post->tags->pluck('id')->all();
        $categories = Category::all();
        return view('posts.auth.edit')->with('post', $post)->with("tags",$tags)->with("categories",$categories)->with("selectedTags",$selectedTags);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request);
        try {
            if (!empty($request->file('image'))) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $filename = basename($path);
                $request->merge(['featured_image' => $filename]);
            }
            if (strtolower($request->input('status')) == 'publish') {
                $request->merge(['status' => true]);
            } else {
                $request->merge(['status' => false]);
            }
            $request->merge(['category_id' => $request->input('category')]);
            $post->tags()->sync($request->input('tags'));
            $post->update($request->all());
        } catch (Exception $e) {
            return back()->with('error', 'Post not updated!');
        }
        return redirect()->route('posts.index')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post not deleted !');
        }
        return redirect()->route('posts.index')->with('success', 'Post has been deleted !');
    }
}
