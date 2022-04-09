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
        Schema::create('cctvs', function (Blueprint $table) {
            $table->id();
            $table->string('cctv_type')->nullable();
            $table->ipAddress('ip_nvr')->nullable();
            $table->ipAddress('ip_cctv')->nullable();
            $table->string('ch')->nullable();
            $table->enum('status', ['Online', 'Offline'])->nullable();
            $table->string('area')->nullable();
            $table->string('zone')->nullable();
            $table->string('cctv_number')->nullable();
            $table->string('category_area')->nullable();
            $table->string('location')->nullable();
            $table->string('old_cctv')->nullable();
            $table->string('new_cctv')->nullable();
            $table->string('name_change')->nullable();
            $table->string('data_status')->nullable();
            $table->string('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();

            $table->index([
                'ip_nvr',
                'created_at',
                'status',
                'area'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cctvs');
    }
};
