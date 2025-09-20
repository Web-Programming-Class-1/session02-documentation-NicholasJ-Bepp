<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-submit', function () {
    return view('test-submit');
});

Route::put('/update', function () {
    return 'Profile UPDATED';
});
Route::delete('/remove', function () {
    return 'Profil REMOVED';
});

Route::post('/submit', function () {
    return 'Post';
});

   Route::get('/admin/student', function () {
      return "<h1>Daftar Mahasiswa</h1>";
   });

   Route::get('/admin/lecturer', function () {
      return "<h1>Daftar Dosen</h1>";
   });

   Route::get('/admin/employee', function () {
      return "<h1>Daftar Karyawan</h1>";
   });

   Route::match(['get', 'post'], '/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});

Route::get('/about', function () {
    return view('about', ['name' => 'Anderies']);
});

Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]);
});

// 2.4 Route Fall Back => Fallback route for undefined pages
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});