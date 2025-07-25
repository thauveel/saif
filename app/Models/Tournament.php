<?php

namespace App\Models;

use App\Enum\Division;
use App\Enum\Sport;
use App\Enum\TournamentStatus;
use App\Enum\TournamentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends BaseModel
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'date',
        'due_date',
        'venue',
        'logo',
        'tc',
        'status',
        'sport',
        'type',
        'max_players',
        'max_officials',
        'max_jersey_no',
        'jersey_document_required',
        'verification_document_required',
        'player_type_required',
        'is_divisible',
        'division',
        'created_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime',
        'date' => 'date:d-M-Y',
        'is_divisible' => 'boolean',
        'jersey_document_required' => 'boolean',
        'verification_document_required' => 'boolean',
        'player_type_required' => 'boolean',
        'sport' => Sport::class,
        'division' => Division::class,
        'status' => TournamentStatus::class,
        'type' => TournamentType::class,
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    

}
