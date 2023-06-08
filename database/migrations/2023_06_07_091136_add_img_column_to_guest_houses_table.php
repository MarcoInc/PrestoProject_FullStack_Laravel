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
        Schema::table('guest_houses', function (Blueprint $table) {
            $table->string('img')->default('public/media/default.png');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_houses', function (Blueprint $table) {
            $table->dropForeign(['img']);
            $table->dropColumn('img');
            //
        });
    }
};
