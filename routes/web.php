<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('cms.statistics');
});
// Route::view("/addCategory","cms.categoryPages.add_category");
// Route::view("/showCategories","cms.categoryPages.show_categories");
// Route::view("/updateCategory","cms.categoryPages.update_category");

Route::resource("Categories",CategoryController::class);
Route::resource('Products', ProductController::class);


