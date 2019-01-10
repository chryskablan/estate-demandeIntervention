<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes_intervention', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('commentaire'); 
            $table->integer('timer'); 
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->integer('localisation_id')->unsigned(); 
            $table->foreign('localisation_id')->references('id')->on('localisation')->onDelete('cascade');
            $table->integer('type_demande_id')->unsigned(); 
            $table->foreign('type_demande_id')->references('id')->on('type_demande')->onDelete('cascade'); 
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
        $table->dropForeign('demandes_intervention_user_id_foreign');
        $table->dropIndex('demandes_intervention_user_id_index');
        $table->dropColumn('user_id');
        $table->dropForeign('demandes_intervention_localisation_id_foreign');
        $table->dropIndex('demandes_intervention_localisation_id_index');
        $table->dropColumn('localisation_id');
        $table->dropForeign('demandes_intervention_type_demande_id_foreign');
        $table->dropIndex('demandes_intervention_type_demande_id_index');
        $table->dropColumn('type_demande_id');
        $table->dropForeign('demandes_intervention_estate_id_foreign');
        $table->dropIndex('demandes_intervention_estate_id_index');
        $table->dropColumn('estate_id');
        Schema::dropIfExists('demandes_intervention');
    }
}
