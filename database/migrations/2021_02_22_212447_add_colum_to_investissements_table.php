<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToInvestissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investissements', function (Blueprint $table) {
            //
            $table->string('profitaccouting')->after('profit')->nullable();
            $table->string('principalback')->after('profit')->nullable();
            $table->float('userlimit')->after('profit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investissements', function (Blueprint $table) {
            //
            $table->dropColumn(['profitaccouting', 'principalback', 'userlimit']);
        });
    }
}
