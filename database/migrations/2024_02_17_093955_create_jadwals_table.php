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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            // $table->string('jam_pelajaran');
            $table->unsignedBigInteger('hari_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('mapel_1_id');
            $table->unsignedBigInteger('mapel_2_id');
            $table->unsignedBigInteger('mapel_3_id');
            $table->unsignedBigInteger('mapel_4_id');
            $table->unsignedBigInteger('mapel_5_id');
            $table->unsignedBigInteger('mapel_6_id');
            $table->unsignedBigInteger('mapel_7_id');
            $table->unsignedBigInteger('mapel_8_id');
            $table->unsignedBigInteger('mapel_9_id');
            $table->unsignedBigInteger('mapel_10_id');
            $table->unsignedBigInteger('mapel_11_id');
            $table->unsignedBigInteger('mapel_12_id');
            $table->timestamps();

            $table->foreign('hari_id')->references('id')->on('haris');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('mapel_1_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_2_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_3_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_4_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_5_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_6_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_7_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_8_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_9_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_10_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_11_id')->references('id')->on('pelajarans');
            $table->foreign('mapel_12_id')->references('id')->on('pelajarans');

            // $table->foreignId('hari_id')->constrained()->onDelete('cascade'); 
            // $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            // $table->foreignId('pelajaran_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
