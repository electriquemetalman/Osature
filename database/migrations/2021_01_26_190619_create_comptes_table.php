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
<<<<<<< HEAD
            $table->string('email');
            $table->string('password');
            $table->string('pays');
            $table->string('apm')->nullable();;
            $table->string('bitcoins')->nullable();;
            $table->string('payeer')->nullable();;
            $table->string('type')->nullable();
            $table->boolean('statut')->default(false);
            $table->boolean('verif_email')->default(false);
            $table->boolean('mdp_forget')->default(true);
=======
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pays');
            // $table->string('apm');
            $table->string('image')->nullable();
            // $table->string('bitcoins')->nullable();
            // $table->string('payeer');
            $table->string('type')->nullable();
            $table->boolean('statut')->default(false);
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
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
