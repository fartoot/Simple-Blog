<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// test routes

Route::get("/team",function(){
    return "team";
})->name("team");

Route::get("/projects",function(){
    return "projects";
})->name("projects");

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
