<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //collaboration between users.pembeli dan products
        schema::create('transaction', function(Blueprint $table){
            $table->increments('id');
            $table->string('code');

        //pembeli
        $table->unsignedInteger('user_id')->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        //product
        $table->unsignedInteger('product_id')->nullable();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->integer('quantity');
        $table->integer('subtotal');

        //penerima pengiriman
        $table->string('name');
        $table->string('address');
        $table->integer('portal_code');
        $table->enum('expedisi',['JNE','TIKI','POS']);
        $table->enum('payment',['0','1']);
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
        //
    }
}
