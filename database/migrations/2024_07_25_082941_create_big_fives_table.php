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
        Schema::create('big_fives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->float('openness', 2, 1)->nullable(); //開放性
            $table->float('agreeableness',2, 1)->nullable(); //協調性
            $table->float('extraversion',2, 1)->nullable(); //外向性
            $table->float('conscientiousness',2, 1)->nullable(); //誠実性
            $table->float('neuroticism',2, 1)->nullable(); //神経症傾向
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('big_fives');
    }
};
