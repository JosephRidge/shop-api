<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * ROLE: CREATE
     * - create product
     * 
     */

    function createProduct(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'skuNumber' => 'required',
            'category' => 'required',
            'supplier' => 'required',
            'numberAvailable' => 'required',
            'price'=> 'required'
        ]);
        // create the record in the DB
        $product = ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'skuNumber' => $request->skuNumber,
            'category' => $request->category,
            'supplier' => $request->supplier,
            'numberAvailable' => $request->numberAvailable,
            'price' => $request->price,
        ]);

        // connfirm whether it exists in DB
        $product = ProductModel::find($product->id);
        if ($product) {
            return response(
                [
                    'message' => 'success',
                    'product' => $product, 
                ]
            );
        } else {
            return response(
                [
                    'message' => 'success', 
                    'product' => 'product does not exists',
                ]
            );
        }

        // return to the user a response
    }
}
