<?php

namespace App\Models;

use App\Enum\PlayerType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BaseModel;


class Player extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'player_name', 'jersey_number', 'id_number', 'photo', 'type', 'team_id', 'consent'
    ];

    public $timestamps = true;

    protected $casts = [
        'type' => PlayerType::class,
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class,'team_id');
    }
}
