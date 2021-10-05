<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fathername');
            $table->string('mothername');
            $table->string('permanent_address');
            $table->string('present_address');
            $table->string('email')->unique();
            $table->integer('mobile_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image');
            $table->string('username');
            $table->string('password');
            $table->string('product_name');
            $table->integer('number_of_product');
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
        Schema::dropIfExists('suppliers');
    }
}