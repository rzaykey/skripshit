<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_product', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cart');
            $table->integer('id_product');
            $table->string('message');
            $table->string('sent_by')->nullalble();
            $table->string('resi')->nullalble();
            $table->string('status')->default('Waiting for response');
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
        Schema::dropIfExists('return_product');
    }
}
