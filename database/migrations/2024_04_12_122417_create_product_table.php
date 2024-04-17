<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();//primary  
            $table->string('name');
            $table->longText('description');
            $table->string('skuNumber');
            $table->string('category');
            $table->string('supplier');
            $table->integer('numberAvailable');
            $table->float('price');
            $table->timestamps(); // updated at and created at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
