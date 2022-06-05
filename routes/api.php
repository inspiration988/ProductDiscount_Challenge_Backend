<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//product
// Route::get('product/index/{category?}/{sku?}/{price?}',[ProductController::class, 'index'], function ($category = null ,$sku = null ,  $price = null) {
//     return $category;
// });
Route::group(['prefix' => 'v1'], function (){
    Route::get('product/index',[ProductController::class, 'index']);
});






