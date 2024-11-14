<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
       {
            $totalPosts = Post::count();
            // $lastMonthPosts = Post::whereMonth('created_at', '=', now()->subMonth()->month)->count();
            // $thisMonthPosts = Post::whereMonth('created_at', '=', now()->month)->count();
            // $percentagePosts = (($thisMonthPosts - $lastMonthPosts) / $lastMonthPosts) * 100;
            // $postsNumber = number_format($percentagePosts, 2);
            // dd($postsNumber);

            $totalUsers= User::count();
            $totalCategories = Category::count();
            $totalTags = Tag::count();
            
            return view('dashboard')->with('totalPosts', $totalPosts)->with('totalUsers', $totalUsers)->with('totalCategories', $totalCategories)->with('totalTags', $totalTags);
       }
}
