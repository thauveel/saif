<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BaseModel;


class Team extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'logo'
    ];

    public $timestamps = true;

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
}
