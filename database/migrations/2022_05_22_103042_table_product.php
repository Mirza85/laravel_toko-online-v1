<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //
        schema::create('products',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('picture');
            $table->string('descriptions');
            $table->string('stock');
            $table->string('price');

            //foreignkey category_id to column id.category
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade')->onDelete('cascade');

            //foreignKey user_id to column id.user_id

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
