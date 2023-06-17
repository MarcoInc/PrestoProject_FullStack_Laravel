<?php

use App\Models\GuestHouse;
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
        Schema::create('guest_houses', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->integer('beds');
            $table->float('price',8,2);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void{
        Schema::table('guest_houses', function (Blueprint $table) {
            $table->dropIfExists(['guest_houses']);
           
        });
    }
};
