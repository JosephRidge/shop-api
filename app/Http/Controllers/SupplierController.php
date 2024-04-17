<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    /**
     * CRUD Operations
     * Create: createSupplier
     * Read: readSupplier, readSuppliers
     * Update: updateSupplier
     * Delete: deleteSupplier
     * 
     */


    // create operation
    function createSupplier(Request $request)
    {
        //validate 
        $request->validate([
            'name' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_origin' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        // creating the record
        $supplier = SupplierModel::create([
            'name' => $request->name,
            'product_category' => $request->product_category,
            'product_name' => $request->product_name,
            'product_origin' => $request->product_origin,
            'manufacturer' => $request->manufacturer,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]); // eloquent - we dont need to typeour SQL syntax here

        // override supplier variable to contaoin record from DB
        $supplier = SupplierModel::find($supplier->id);

        // return response
        if ($supplier) {
            return response([
                'message' => 'success',
                'supplier' => $supplier,
                'status' => 200
            ]);
        } else {
            return response([
                'message' => 'failed',
                'supplier' => '...',
                'status' => 404,
            ]);
        }
    }

    // Read - read all 
    function getAllSuppliers()
    {
        //validate
        // make the query
        $suppliers = SupplierModel::all();// syntax or autorhing approach for the DB quesries, in Laravel its called eloquent ( abstraction behind the SQL syntax)
        // create instance of record
        // return to user
        if ($suppliers) {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => $suppliers
                ]
            );
        } else {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => 'No available Suppliers yet!'
                ]
            );
        }
    }

    // read one target supplier
    function getSupplier(Request $request)
    {
        // validate
        $request->validate(['id' => 'required']);
        // get instanc from DB
        $supplier = SupplierModel::find($request->id);
        // return response
        if ($supplier) {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => $supplier
                ]
            );
        } else {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => 'Supplier does not exist!'
                ]
            );
        }
    }

    // update supplier
    function updateSupplier(Request $request)
    {
        //validate
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_origin' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        // override the values and save
        $supplier = SupplierModel::find($request->id);

        // if the reord exists
        if ($supplier) {
            $supplier->name = $request->name;
            $supplier->product_category = $request->product_category;
            $supplier->product_name = $request->product_name;
            $supplier->product_origin = $request->product_origin;
            $supplier->manufacturer = $request->manufacturer;
            $supplier->quantity = $request->quantity;
            $supplier->price = $request->price;
            $supplier->save();// updates the record
            // return a response
            return response([
                'message' => 'success',
                'supplierDetails' => $supplier
            ]);

        } else {
            return response([
                'message' => 'success',
                'supplierDetails' => 'Supplier does not exist!'
            ]);
        }
    }


    // delete
    function deleteSupplier(Request $request)
    {
        // validate
        $request->validate(['id' => 'required']);

        // checek whether supplier exists
        $supplier = SupplierModel::find($request->id);

        if ($supplier) {
            $supplier->delete();
            return response([
                'message' => 'success',
                'supplierDetails' => 'Supplier has been deleted!'
            ]);
        } else {
            return response([
                'message' => 'success',
                'supplierDetails' => 'Supplier does not exist'
            ]);
        }

    }


}
