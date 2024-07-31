<?php

use App\Http\Controllers\user\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::controller(CategoryController::class)->group(function () {
    Route::post('user/category/create', 'store')->name('api.user.category.create');
    Route::get('/user/{id}/categories', 'index')->name('api.user.categories');
    Route::get('/user/{id}/category/show', 'show')->name('api.user.category.show');
    Route::patch('/user/{id}/category/update', 'update')->name('api.user.category.update');
    Route::delete('/user/{id}/category/destroy', 'destroy')->name('api.user.category.destroy');
});
