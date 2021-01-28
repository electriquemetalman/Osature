<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investissements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('libelle');
            $table->float('licence')->nullable();
            $table->float('investmin');
            $table->float('investmax');
            $table->float('profitjourmin');
            $table->float('profitjourmax')->nullable();
            $table->float('profitmois')->nullable();
            $table->float('dureecontrat');
            $table->float('profit')->nullable();
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
        Schema::dropIfExists('investissements');
    }
}
