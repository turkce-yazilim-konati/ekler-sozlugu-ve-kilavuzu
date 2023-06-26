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
        Schema::create('ekdizmes', function (Blueprint $table) {
            $table->id();
            $table->text('ek')->nullable();
            $table->text('not')->nullable();
            $table->text('kaynak')->nullable();
            $table->unsignedBigInteger('ekleyen');
            $table->text('aktif')->nullable();
            $table->integer('onaylayan')->nullable();
            $table->timestamps();
            $table->foreign('ekleyen')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekdizmes');
    }
};
