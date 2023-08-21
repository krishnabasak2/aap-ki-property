<?php

use App\Http\Controllers\Admin\ContactForm;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\MainContoller;
use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;



Route::match(['get', 'post'], '/login', [MainContoller::class, 'login'])->middleware('LoginCheck');
Route::get('/logout', [MainContoller::class, 'logout']);

Route::middleware('AdminCheck')->group(function () {
    Route::get('/', [MainContoller::class, 'index']);
    Route::match(['get', 'post'], '/settings', [MainContoller::class, 'settings']);
    Route::match(['get', 'post'], '/profile', [MainContoller::class, 'profile']);

    Route::prefix('properties')->group(function () {
        Route::get('list/{type}/{list_for?}', [PropertyController::class, 'index']);
        Route::get('status/{id}/{status}', [PropertyController::class, 'status']);
        Route::match(['get', 'post'], 'edit-property/{id}', [PropertyController::class, 'edit_property']);
    });

    Route::prefix('enquiries')->group(function () {
        Route::get('/{type}', [EnquiryController::class, 'index']);
        Route::get('status/{id}/{status}', [EnquiryController::class, 'status']);
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/{type}', [ContactForm::class, 'index']);
        Route::get('status/{id}/{status}', [ContactForm::class, 'status']);
    });
});
