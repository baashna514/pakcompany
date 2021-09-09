<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->text('address')->nullable();
            $table->string('developer_name')->nullable();
            $table->string('developer_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('copyrights')->nullable();
            $table->string('background_color', 25)->default('#f2f3f7');
            $table->string('title_color', 25)->default('#f2f3f7');
            $table->string('text_color', 25)->default('#555');
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('google')->nullable();
            $table->text('instagram')->nullable();
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
        Schema::dropIfExists('footers');
    }
}
