<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tugas');
            $table->integer('id_kelas');
            $table->integer('id_siswa');
            $table->integer('id_mapel');
            $table->integer('id_guru');
            $table->string('jawaban');
            $table->double('nilai');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulans');
    }
};
