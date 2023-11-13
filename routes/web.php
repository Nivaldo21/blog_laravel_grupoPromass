<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;

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

Route::get('/', function () {
    return redirect('/entries');
});

Route::get('/entries/search', [EntryController::class, 'search']);
Route::get('/entries', [EntryController::class, 'index']);
Route::get('/entries/create', [EntryController::class, 'create']);
Route::post('/entries', [EntryController::class, 'store']);
Route::get('/entries/{entry}', [EntryController::class, 'show']);


