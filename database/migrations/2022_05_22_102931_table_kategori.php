<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        schema::create('category', function (Blueprint $table){
            $table->increments('id',40);
            $table->string('slug',40);
            $table->string('icon',40);
            $table->string('name',40);
            //parent_id
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->on('category')->references('id')->onUpdate('cascade')->onDelete('cascade');

            //foreignKey user
            $table->unsignedInteger('user_id')->nullable();
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
