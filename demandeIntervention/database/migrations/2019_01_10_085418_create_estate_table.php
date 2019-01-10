<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('address'); 
            $table->integer('cp'); 
            $table->string('city'); 
            $table->string('country'); 
            $table->integer('superficie_carrer'); 
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
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
        $table->dropForeign('estate_user_id_foreign');
        $table->dropIndex('estate_user_id_index');
        $table->dropColumn('user_id');
        Schema::dropIfExists('estate');
        
    }
}
