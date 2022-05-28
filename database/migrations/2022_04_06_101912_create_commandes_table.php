<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('article');
            $table->integer('quantite');
            $table->float('price');
            $table->float('solde');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email');
            $table->foreign('recette_id')->references('id')->on('recettes')->onDelete('cascade');
            $table->unsignedBigInteger('recette_id');

            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');

            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
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
        Schema::drop('commandes');
    }
}
