<?php

use App\Enum\PlayerType;
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
        Schema::create('players', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('player_name');
            $table->string('jersey_number')->nullable();
            $table->string('id_number');
            $table->string('type')->default(PlayerType::REGULAR)->nullable(); // player, official, coach
            $table->string('photo')->nullable();
            $table->string('verification_document')->nullable();
            $table->foreignUuid('team_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
