<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pelatih', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Ambil dari tabel users
            $table->string('code')->unique();
            $table->string('nama');
            $table->integer('tgl_lahir');
            $table->string('profile')->nullable(); // URL foto profil
            $table->timestamps();

            // Foreign Key ke tabel users
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelatih');
    }
};
