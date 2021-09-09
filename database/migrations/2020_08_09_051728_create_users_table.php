<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->boolean('is_admin')->nullable()->comment("1 for admin, 0 for user, 2 for vendor");
            $table->string('name')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postal_code')->nullable();
            $table->integer('points')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('is_online')->nullable()->comment("1 for online 0 for offline")->default('1');
            $table->string('days')->nullable();
            $table->string('country')->nullable();
            $table->string('password')->nullable();
            $table->string('cnic')->nullable();
            $table->string('cnic_front_image')->nullable();
            $table->string('cnic_back_image')->nullable();
            $table->string('shop_banner')->nullable();
            $table->string('shop_page_title')->nullable();
            $table->string('user_image')->nullable();
            $table->string('shop_logo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
