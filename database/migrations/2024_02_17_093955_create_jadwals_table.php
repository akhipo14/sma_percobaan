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
            $table->foreignId('hari_id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->foreignId('pelajaran_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            // $table->foreign('hari_id')->references('id')->on('haris')->onDelete('cascade');
            // $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            // $table->foreign('pelajaran_id')->references('id')->on('pelajarans')->onDelete('cascade');

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
