<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claim_id')->nullable();
            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('claim_galleries');
    }
}
