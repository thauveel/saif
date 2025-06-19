<?php

namespace App\Models;

use App\Enum\OfficialType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Official extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'official_name', 'type', 'id_number', 'photo', 'phone', 'team_id'
    ];

    public $timestamps = true;

    protected $casts = [
        'type' => OfficialType::class,
    ];

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
}
