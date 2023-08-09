<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BaseModel;


class Player extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'player_name', 'jersey_number', 'id_number', 'photo', 'team_id', 'is_libero', 'consent'
    ];

    public $timestamps = true;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class,'team_id');
    }
}
