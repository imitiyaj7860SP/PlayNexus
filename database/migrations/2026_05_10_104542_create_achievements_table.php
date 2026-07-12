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
    Schema::create('achievements', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('description');
        $table->string('icon');             // emoji
        $table->string('condition_type');   // score, wins, plays
        $table->integer('condition_value');
        $table->string('color');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
