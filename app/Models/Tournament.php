<?php

namespace App\Models;

use App\Enum\Division;
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
        'type',
        'max_players',
        'max_officials',
        'max_jersey_no',
        'jersey_document_required',
        'is_divisible',
        'division',
        'is_libero_included',
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
    

}
