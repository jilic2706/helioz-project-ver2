<?php

use App\Http\Controllers\LeaveRequestController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->middleware('auth')->name('leave-requests');

Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->middleware('auth')->name('leave-requests');

Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->middleware('auth')->name('leave-requests/create');

Route::get('/leave-requests/manage', [LeaveRequestController::class, 'manage'])->middleware('auth')->name('leave-requests/manage');

Route::put('/leave-requests/{leave_request}', [ListingController::class, 'update'])->middleware('auth');

Route::delete('/leave-requests/{leave_request}', [LeaveRequestController::class, 'destroy'])->middleware('auth');

require __DIR__.'/auth.php';
