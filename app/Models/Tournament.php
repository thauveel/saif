<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'date', 'due_date', 'status', 'venue', 'logo', 'type', 'jersey_document'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'date:d-M-Y',
        'date' => 'date:d-M-Y',
    ];

    /**
     * Get the teams for the tournament.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Get the 6 players for the team.
     */
    public function LatestTeams()
    {
        return $this->hasMany(Team::class)->latest()->take(4);
    }
    

}
