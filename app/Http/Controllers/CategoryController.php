<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $categories = Category::latest()->paginate(10);
            return view('categories.auth.index')->with('categories', $categories);
        } else {
            $categories = Category::where('status', true)->latest()->paginate(11);
            return view('categories.guest.index')->with('categories', $categories);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category();

            if (!empty($request->file('image'))) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $filename = basename($path);
                $category->featured_image = $filename;
            } else {
                $category->featured_image = '';
            }
            $category->name = $request->input('name');
            $category->slug = Str::slug($category->name);
            $category->description = $request->input('description');
            $category->save();
        } catch (Exception $e) {
            return back()->with('error', 'Post not added!');
        }

        return redirect()
            ->route('categories.index')
            ->with([
                'success' => 'Post added successfully!',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.auth.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            if (!empty($request->file('image'))) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $filename = basename($path);
                $request->merge(['featured_image' => $filename]);
            }
            $category->update($request->all());
        } catch (Exception $e) {
            return back()->with('error', 'Category not updated!');
        }
        return redirect()->route('categories.index')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Category not deleted !');
        }
        return redirect()->route('categories.index')->with('success', 'Category has been deleted !');
    }
}
