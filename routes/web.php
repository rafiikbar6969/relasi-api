<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('utama');

Route::get('/tentang', function(){
    return view('about');
})->name('tentang-saya');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/profile/saya', [ProfileController::class, 'saya'])->name('saya');

Route::get('/nama/saya', function(){
    return 'Pahrul Irfan';
});

Route::get('/dari-view', function () {
    return view('home');
});

Route::view('master', 'template/master');

// route untuk dosen
Route::get('data-dosen', [DosenController::class, 'index']);
Route::get('add-dosen', [DosenController::class, 'create'])->name('create.dosen');
Route::post('input-dosen', [DosenController::class, 'input'])->name('input.dosen');
Route::delete('delete-dosen/{id}', [DosenController::class, 'destroy'])->name('delete.dosen');

// edit
Route::get('edit-dosen/{dosen}', [DosenController::class, 'edit'])->name('edit.dosen');
// proses update
Route::patch('update-dosen/{dosen}', [DosenController::class, 'update'])->name('update.dosen');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
