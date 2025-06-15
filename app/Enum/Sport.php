<?php

namespace App\Enum;

enum Sport: string
{
    case VOLLEYBALL = 'volleyball';
    case FUTSAL = 'futsal';
    case HANDBALL = 'handball';
    case FOOTBALL = 'football';

    public function is_libero(): bool
    {
        return match($this) {
            self::HANDBALL => false,
            self::FUTSAL => false,
            self::VOLLEYBALL => true,
            self::FOOTBALL => false
        };
    }

    public function is_follower(): bool
    {
        return match($this) {
            self::HANDBALL => true,
            self::FUTSAL => false,
            self::VOLLEYBALL => false,
            self::FOOTBALL => false
        };
    }

    public function label(): string
    {
        return match($this) {
            self::VOLLEYBALL => "Volleyball",
            self::FUTSAL => "Futsal",
            self::HANDBALL => "Handball",
        };
    }



    public static function casesWithLabels(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
        ], self::cases());
    }

}

