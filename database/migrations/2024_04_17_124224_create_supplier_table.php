<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // inheriting features from the migration calss
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // run the migration and create for me the table
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id(); // usually taken as our primary key
            $table->string('name');
            $table->string('product_category');
            $table->string('product_name');
            $table->string('product_origin');
            $table->string('manufacturer');
            $table->integer('quantity');
            $table->float('price');
            $table->timestamps(); // usually generates the upload and create at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // drop or rreverse the migration
    {
        Schema::dropIfExists('supplier');
    }
};
