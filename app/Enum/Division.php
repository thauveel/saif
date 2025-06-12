<?php

namespace App\Enum;

enum Division: string
{
    case Female = 'Femalr';
    case Male = 'Male';

    public function label(): string
    {
        return match($this) {
            self::Female => 'Female',
            self::Male => 'Male'
        };
    }

}

