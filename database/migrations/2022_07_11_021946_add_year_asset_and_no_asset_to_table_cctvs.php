<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cctvs', function (Blueprint $table) {
            $table->string('no_asset')->nullable()->after('group');
            $table->string('year_asset')->nullable()->after('no_asset');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cctvs', function (Blueprint $table) {
            //
        });
    }
};
