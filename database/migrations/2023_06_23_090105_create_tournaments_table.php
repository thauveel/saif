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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->date('date');
            $table->date('due_date');
            $table->string('venue')->nullable();
            $table->string('logo');
            $table->string('tc')->nullable();
            $table->string('status')->default('draft');
            $table->string('sport')->default('draft');
            $table->string('type')->default('volleyball');
            $table->integer('max_players')->default(14);
            $table->integer('max_officials')->default(4);
            $table->integer('max_jersey_no')->default(21);
            $table->boolean('jersey_document_required')->default(true);
            $table->boolean('verification_document_required')->default(true);
            $table->boolean('player_type_required')->default(false);
            $table->boolean('is_divisible')->default(false);
            $table->string('division')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
