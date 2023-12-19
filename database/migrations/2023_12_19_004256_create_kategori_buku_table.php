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
        Schema::create('kategori_buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku')->nullable();
            $table->string('penulis')->nullable();
            $table->string('kategori')->nullable();
            $table->unsignedBigInteger('buku_id')->nullable();
            $table->foreign('buku_id')
            ->references('id')
            ->on('buku_migration')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_buku');
    }
};
