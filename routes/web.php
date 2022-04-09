<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $comments = Comment::latest()->get();
    return view('welcome', compact('comments'));
})->name('welcome')->middleware('auth');

Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

//Route::group(['middleware'=> 'guest'], function(){
    Route::get('/login', function(){
        return view('auth');
    })->name('login');
    
    Route::get('/register', function(){
        return view('auth');
    })->name('register');
//});


