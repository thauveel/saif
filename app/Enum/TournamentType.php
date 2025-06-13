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

    public function is_libero(): bool
    {
        return match($this) {
            self::Handball => false,
            self::Futsal => false,
            self::Volleyball => true,
            self::Football => false
        };
    }

    public function is_follower(): bool
    {
        return match($this) {
            self::Handball => true,
            self::Futsal => false,
            self::Volleyball => false,
            self::Football => false
        };
    }

}

