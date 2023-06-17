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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
            $table->string('name')->default('')->nullable();
            $table->integer('age')->nullable();
            $table->string('language')->default('')->nullable();
            $table->string('work')->default('')->nullable();
            $table->text('contact')->nullable();
            $table->string('from')->default('')->nullable();
            $table->string('img')->default('')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        
        });
    }
};
