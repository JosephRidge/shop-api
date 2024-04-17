<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


/**
 * CRUD Routes for products
 * 
 */
// Create 
Route::post('/products', [ProductController::class, 'createProduct']);
// Read All
Route::get('/products', [ProductController::class, 'getAllProducts']);
// Read One
// Update
// Delete


/**
 * SUPPLIERS 
 */
Route::post('/supplier', [SupplierController::class, 'createSupplier']);  // Create
Route::get('/suppliers', [SupplierController::class, 'getAllSuppliers']);  // Read All
Route::get('/supplier', [SupplierController::class, 'getSupplier']);  // Read one
Route::put('/supplier', [SupplierController::class, 'updateSupplier']);  // Update
Route::delete('/supplier', [SupplierController::class, 'deleteSupplier']);// Delete