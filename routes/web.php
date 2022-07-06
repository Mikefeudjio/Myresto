<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\tableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;

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
})->middleware(['auth'])->name('dashboard');

route::middleware(['auth' , 'admin'])->name('admin.')->prefix('admin')->group(function(){
route::get('/', [AdminController::class, 'index'])->name('index');
Route::resource('Category', CategoryController::class);
Route::resource('Menu', MenuController::class);
Route::resource('table', tableController::class);
Route::resource('Reservation', ReservationController::class);
Route::
}); 

require __DIR__.'/auth.php';
