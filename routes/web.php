<?php

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index']);
Route::post('/save', [HomeController::class, 'save']);
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::get('/delete/{id}' , [Homecontroller::class , 'delete'])->name('delete');
