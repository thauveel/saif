<?php

namespace App\Models;

use App\Enum\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'logo', 'status', 'division', 'jersey_document'
    ];

    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'division' => Division::class,
    ];

    /**
     * Get the tournament for the team.
     */
    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    /**
     * Get the playes for the team.
     */
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Get the officials for the team.
     */
    public function officials(): HasMany
    {
        return $this->hasMany(Official::class);
    }

    /**
     * Get the 6 players for the team.
     */
    public function LatestPlayers()
    {
        return $this->hasMany(Player::class)->latest()->take(4);
    }
    

}
