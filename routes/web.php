<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Articles CRUD
Route::get("articles",[ArticleController::class,'index'])->middleware("auth")->name("articles.index");



// Categories CRUD
// Route::group(['prefix'=>'categories','middleware'=>'auth'],function(){
    // Route::get('',[CategoryController::class,'index'])->name('categories.index');
    // Route::view('/create', 'categories.create')->name('categories.create');
    // Route::get('/{category}',[CategoryController::class,'show'])->name('categories.show');
    // Route::post('',[CategoryController::class,'store'])->name('categories.store');
    // Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    // Route::put('/{category}',[CategoryController::class,'update'])->name("categories.update");
    // Route::delete('/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
// });

Route::group(['middleware'=>'auth'],function(){
    Route::resource('categories', CategoryController::class);
});