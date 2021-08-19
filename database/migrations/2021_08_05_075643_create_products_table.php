<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();            
            $table->longText('slug');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->decimal('tr_price', 9, 3);
            $table->decimal('usd_price', 9, 3)->nullable();
            $table->decimal('euro_price', 9, 3)->nullable();
            $table->longText('description')->nullable();
            $table->boolean('featured')->default(false);
            $table->string('link');
            $table->foreignId('categories_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
