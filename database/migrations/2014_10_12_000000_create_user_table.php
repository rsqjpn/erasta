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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('google_id')->nullable()->after('email');
            $table->string('code', 10)->unique()->nullable(); // Untuk kode unik
            $table->string('password');
            $table->string('profile', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('no_telp', 14)->nullable();
            $table->enum('role', ['admin', 'pelatih', 'anggota'])->default('anggota');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('isAtlet', ['yes', 'no'])->default('no');
            $table->date('tanggal_join')->nullable();
            $table->string('tingkat', 50)->nullable();
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
        Schema::dropIfExists('users');
    }
};
