<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->string('nim');
            $table->string('nama');
            $table->string('email');
            $table->unsignedBigInteger('id_jurusan');

            $table->foreign('id_jurusan')
                  ->references('id_jurusan')
                  ->on('tb_jurusan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tb_mahasiswa');
    }
};