<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    // ascertaining that the data will be provided
    protected $table = "product";
    protected $fillable = [
        'name',
        'description',
        'skuNumber',
        'category',
        'supplier',
        'numberAvailable',
        'price'
    ];

}
