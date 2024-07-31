<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\DashboardController;

Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'login_view')->name('login');
    Route::post('/', 'login');

    Route::get('/register', 'register_view')->name('register');
    Route::post('/register', 'register');

    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/user/dashboard', 'index')->name('user.dashboard');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/user/profile', 'index')->name('user.profile');
    Route::patch('/user/profile/details', 'details')->name('user.profile.details');
    Route::patch('/user/profile/password', 'password')->name('user.profile.password');
    Route::patch('/user/profile/picture', 'picture')->name('user.profile.picture');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/user/categories', 'index')->name('user.categories');
});

Route::controller(ContactController::class)->group(function() {
    Route::get('/user/contacts', 'index')->name('user.contacts');
    Route::get('/user/contact/create', 'create')->name('user.contact.create');
    Route::post('/user/contact/create', 'store');
    Route::get('/user/contact/{contact}/show', 'show')->name('user.contact.show');
    Route::get('/user/contact/{contact}/edit', 'edit')->name('user.contact.edit');
    Route::patch('/user/contact/{contact}/edit', 'update');
    Route::patch("/user/contact/{contact}/picture", 'picture')->name('user.contact.picture');
    Route::delete("/user/contact/{contact}/destroy", 'destroy')->name('user.contact.destroy');

});