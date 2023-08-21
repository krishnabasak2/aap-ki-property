<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [WebController::class, 'index']);
Route::match(['get', 'post'], '/list-your-properties', [WebController::class, 'list_properties']);
Route::match(['get', 'post'], '/properties/{type}', [WebController::class, 'properties']);
Route::post('/enquiries', [WebController::class, 'enquiries']);
Route::post('/contact-form', [WebController::class, 'contact_form']);


Route::get('boot', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');

    Artisan::call('storage:link');
    Artisan::call('migrate:fresh --seed');
});
