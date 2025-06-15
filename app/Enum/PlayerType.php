<?php

namespace App\Enum;

enum PlayerType: string
{
    // Common player types across sports
    case REGULAR = 'regular';
    case GOALKEEPER = 'goalkeeper';
    case DEFENDER = 'defender';
    case WINGER = 'winger';

    // Futsal specific
    case PIVOT = 'pivot';

    // Volleyball specific
    case LIBERO = 'libero';
    case SETTER = 'setter';
    case SPIKER = 'spiker';
    case BLOCKER = 'blocker';

    // Handball specific
    case RIGHT_WINGER = 'right_winger';
    case LEFT_WINGER = 'left_winger';
    case RIGHT_BACK = 'right_back';
    case LEFT_BACK = 'left_back';
    case CENTER_BACK = 'center_back';

    //football specific
    case MIDFIELDER = 'midfielder'; 
    case ATTACKER = 'attacker';
    case CENTER = 'center';

    public function label(): string
    {
        return match ($this) {
            self::REGULAR => 'Regular Player',
            self::GOALKEEPER => 'Goalkeeper',
            self::DEFENDER => 'Defender',
            self::WINGER => 'Winger',
            self::PIVOT => 'Pivot',

            self::LIBERO => 'Libero',
            self::SETTER => 'Setter',
            self::SPIKER => 'Spiker',
            self::BLOCKER => 'Blocker',

            self::RIGHT_BACK => 'Right Back',
            self::LEFT_BACK => 'Left Back',
            self::CENTER_BACK => 'Center Back',
            self::RIGHT_WINGER => 'Right Winger',
            self::LEFT_WINGER => 'Left Winger',
            self::MIDFIELDER => 'Midfielder',
            self::ATTACKER => 'Attacker',
            self::CENTER => 'Center',

        };
    }

    public static function forSport(string $sport): array
{
    return match ($sport) {
        'futsal' => [self::REGULAR, self::GOALKEEPER, self::DEFENDER, self::WINGER, self::PIVOT, self::ATTACKER],
        'football' => [self::REGULAR, self::GOALKEEPER, self::DEFENDER, self::MIDFIELDER, self::ATTACKER, self::CENTER],
        'volleyball' => [self::REGULAR, self::LIBERO, self::SETTER, self::SPIKER, self::BLOCKER],
        'handball' => [self::REGULAR, self::GOALKEEPER, self::DEFENDER, self::RIGHT_WINGER, self::LEFT_WINGER, self::RIGHT_BACK, self::LEFT_BACK, self::CENTER_BACK],
        default => [self::REGULAR],
    };
}
}