<?php

use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/*to pass param*/
Route::get('/showId/{id}', function ($id) {
    return 'eslam' . $id;
})->name('Documentation'); // to naming rout

/*maybe pass param maybe not*/
Route::get('/showString/{id?}', function () {
    return 'eslam';
})->name('b');// naming rout

/* from controllers => Front folder*/
Route::namespace('Front')->group(function () {

    /* all route only access controller or methods in folder name Front */
    Route::get('Users', [UserController::class, 'showAdminName']);

    Route::get('view', [UserController::class, 'getView']);

});
/* prefix => P*/
Route::prefix('Users')->group(function () {
    Route::get('Pshow', [UserController::class, 'showAdminName']);
    Route::get('Pedit', [UserController::class, 'EditAdminName']);
    Route::delete('Pdelete', [UserController::class, 'DeleteAdminName']);
    Route::put('Pupdate', [UserController::class, 'UpdateAdminName']);
});

/* Group => G -  best practice */
Route::group(['prefix' => 'users'], function () {

    Route::get('Gshow', [UserController::class, 'showAdminName']);
    Route::get('Gedit', [UserController::class, 'EditAdminName']);
    Route::delete('Gdelete', [UserController::class, 'DeleteAdminName']);
    Route::put('Gupdate', [UserController::class, 'UpdateAdminName']);

});

/* middle ware gives me accessible or not accessible*/
Route::get('check', function () {
    return 'middleware';
})->middleware('auth');

/* best practice */
Route::group(['prefix' => 'users_auth', 'middleware' => 'auth'], function () {

    Route::get('Gshow', [UserController::class, 'showAdminName']);
    Route::get('Gedit', [UserController::class, 'EditAdminName']);
    Route::delete('Gdelete', [UserController::class, 'DeleteAdminName']);
    Route::put('Gupdate', [UserController::class, 'UpdateAdminName']);

});


