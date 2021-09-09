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
            $table->string('name');
            $table->boolean('is_featured')->nullable()->comment("1 for featured, 0 for normal Product");
            $table->string('p_quantity', 10)->nullable();
            $table->string('p_type')->nullable();
            $table->text('p_size')->nullable();
            $table->string('price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('soldout')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('p_detail')->nullable();
            $table->tinyInteger('status')->comment("1 for approved, 0 for pending")->default('0');
            $table->text('p_description')->nullable();
            $table->string('p_thumbnail')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('subcategory1_id')->nullable();
            $table->foreign('subcategory1_id')->references('id')->on('subcategory1s')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('subcategory2_id')->nullable();
            $table->foreign('subcategory2_id')->references('id')->on('subcategory2s')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->string('weight')->nullable()->comment("in kg");
            $table->string('length')->nullable()->comment("in cm");
            $table->string('width')->nullable()->comment("in cm");
            $table->string('height')->nullable()->comment("in cm");
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
