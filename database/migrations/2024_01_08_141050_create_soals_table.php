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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acara_id');
            $table->foreign('acara_id')->references('id')->on('acaras')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('role');
            $table->tinyInteger('status')->default(1); // 0:tidak aktif; 1:aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
