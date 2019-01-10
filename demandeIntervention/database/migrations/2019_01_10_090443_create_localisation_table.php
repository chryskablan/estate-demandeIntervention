<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('estate_id')->unsigned(); 
            $table->foreign('estate_id')->references('id')->on('estate')->onDelete('cascade'); 
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
        $table->dropForeign('demandes_intervention_estate_id_foreign');
        $table->dropIndex('demandes_intervention_estate_id_index');
        $table->dropColumn('estate_id');
        Schema::dropIfExists('localisation');
    }
}
