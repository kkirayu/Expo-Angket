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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->unsignedBigInteger('role_id')->nullable()->after('password');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('acara_id')->nullable()->after('password');
            $table->foreign('acara_id')->references('id')->on('acaras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
