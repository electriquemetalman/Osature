<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nomuser');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pays');
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->boolean('statut')->default(false);
            $table->boolean('verif_email')->default(false);
            $table->boolean('mdp_forget')->default(true);
            $table->bigInteger('roles_id')->unsigned()->index()->nullable();
            $table->foreign('roles_id')->references('id')->on('roles');
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
        Schema::dropIfExists('comptes');
    }
}
