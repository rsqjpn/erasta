<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPelatihTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jadwal_pelatih', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('pelatih_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade');
            $table->foreign('pelatih_id')->references('id')->on('pelatih')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelatih');
    }
}
