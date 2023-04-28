<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanPriceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('reserve', 'App\Http\Controllers\ReserveController')->except(['show']);
Route::get('/reserve/{plan}', 'App\Http\Controllers\ReserveController@show')->name('reserve.show');
Route::get('/reserve/top', 'App\Http\Controllers\ReserveController@top')->name('reserve.top');
Route::get('/reserve/access', 'App\Http\Controllers\ReserveController@access')->name('reserve.access');

Route::get('/contact/index', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get('/contact/{id}', 'App\Http\Controllers\ContactController@show')->name('contact.show');
Route::get('/contact/create', 'App\Http\Controllers\ContactController@create')->name('contact.create');
Route::post('/contact/store', 'App\Http\Controllers\ContactController@store')->name('contact.store');

Route::match(['post', 'delete'], '/contact/{contact}/status', 'App\Http\Controllers\StatusController@update')->name('contact.status');

Route::resource('number', 'App\Http\Controllers\NumberController')->except(['create']);
Route::get('/number/create/{room_id}', 'App\Http\Controllers\NumberController@create')->name('number.create');

Route::resource('plan', 'App\Http\Controllers\PlanController')->except(['create']);
Route::get('/plan/create/{room_id}', 'App\Http\Controllers\PlanController@create')->name('plan.create');

Route::get('/plan_price/{plan_id}', 'App\Http\Controllers\PlanPriceController@index')->name('plan_price.index');
Route::get('/plan_price/{plan_id}/create', 'App\Http\Controllers\PlanPriceController@create')->name('plan_price.create');
Route::post('/plan_price/{plan_id}', 'App\Http\Controllers\PlanPriceController@store')->name('plan_price.store');
Route::get('/plan_price/{plan_id}/{id}/edit', 'App\Http\Controllers\PlanPriceController@edit')->name('plan_price.edit');
Route::put('/plan_price/{plan_id}/{id}', 'App\Http\Controllers\PlanPriceController@update')->name('plan_price.update');
Route::delete('/plan_price/{plan_id}/{id}', 'App\Http\Controllers\PlanPriceController@destroy')->name('plan_price.destroy');

