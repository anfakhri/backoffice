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
        Schema::create('saldocoas', function (Blueprint $table) {
            $table->id();
            $table->integer('saldo_awal')->nullable();
            $table->integer('anggaran')->nullable();
            $table->integer('target')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('coa_akun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldocoas');
    }
};