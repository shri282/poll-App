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
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('description')->nullable();
            $table->integer('totalVoters');
            $table->string('status')->default('active');
            $table->dateTime('end_date')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->string('category')->nullable();
            $table->json('options')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polls');
    }
};
