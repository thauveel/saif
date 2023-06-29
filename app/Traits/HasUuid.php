<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid():void
    {
        static::creating(function ($model)
        {
            
            $model->id = Str::uuid()->toString();
        });
    }
}