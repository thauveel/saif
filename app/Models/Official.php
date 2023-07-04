<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Official extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'official_name', 'official_type', 'id_number', 'photo', 'phone', 'team_id'
    ];

    public $timestamps = true;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class,'team_id');
    }
}
