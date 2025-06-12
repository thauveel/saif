<?php

namespace App\Enum;

enum Division: string
{
    case Mens = 'mens';
    case Womens = 'womens';

    public function label(): string
    {
        return match($this) {
            self::Mens => "Men's",
            self::Womens => "Women's"
        };
    }

}

