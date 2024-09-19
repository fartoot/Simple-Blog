<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get("/welcome",function(){
//     return view("welcome");
// });




Route::get("/",[PostController::class,'index'])->middleware('guest')->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name("posts.show");
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name("category.show");
Route::get('/category', [CategoryController::class, 'index'])->name("category.index");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource("posts",PostController::class)->except(["show"]);
    
    Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
    Route::resource('categories', CategoryController::class)->except(["show"]);
    Route::resource('tags', TagController::class)->except(["show"]);
});
    
    


Route::get("/about", function(){
    return view("pages.about");    
})->name("about");

Route::get("/contact", function(){
    return view("pages.contact");    
})->name("contact");

Route::get("/privacy-policy", function(){
    return view("pages.privacy");    
})->name("privacy");







// test routes

Route::get("/calendar",function(){
    return "calendar";
})->name("calendar");

Route::get("/documents",function(){
    return "documents";
})->name("documents");

Route::get("/reports",function(){
    return "reports";
})->name("reports");

require __DIR__.'/auth.php';