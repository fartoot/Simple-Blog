<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $tags = Tag::latest()->paginate(10);
            return view('tags.auth.index')->with('tags', $tags);
        } else {
            $tags = Tag::latest()->paginate(40);
            return view('tags.guest.index')->with('tags', $tags);
        }
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
    public function store(Request $request)
    {
        try {
            $tag = new Tag();
            $tag->name = $request->input('name');
            $tag->slug = Str::slug($request->slug);
            $tag->save();
        } catch (Exception $e) {
            dd($e);
            return back()->with('error', 'Tag not added!');
        }

        return redirect()
            ->route('tags.index')
            ->with([
                'success' => 'Tag added successfully!',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(10);
        return view('tags.guest.show')->with('posts', $posts)->with("tag",$tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
        } catch (Exception $e) {
            return redirect()->route('tags.index')->with('error', 'Category not deleted !');
        }
        return redirect()->route('tags.index')->with('success', 'Category has been deleted !');
    }
}
