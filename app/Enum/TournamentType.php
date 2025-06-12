<?php

namespace App\Enum;

enum TournamentType: string
{
    case Handball = 'handball';
    case Futsal = 'futsal';
    case Volleyball = 'volleyball';
    case Football = 'Football';

    public function label(): string
    {
        return match($this) {
            self::Handball => 'Handball',
            self::Futsal => 'Fursal',
            self::Volleyball => 'Volleyball',
            self::Football => 'Football'
        };
    }

}

