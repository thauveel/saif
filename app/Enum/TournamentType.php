<?php

namespace App\Enum;

enum TournamentType: string
{
    case ROUND_ROBIN = 'round_robin';
    case KNOCKOUT = 'knockout';
    case DOUBLE_ELIMINATION = 'double_elimination';
    case GROUP_STAGE_KNOCKOUT = 'group_stage_knockout';
    case LEAGUE = 'league';
    case SWISS = 'swiss';
    case HYBRID = 'hybrid';

    public function label(): string
    {
        return match ($this) {
            self::ROUND_ROBIN => 'Round Robin',
            self::KNOCKOUT => 'Knockout',
            self::DOUBLE_ELIMINATION => 'Double Elimination',
            self::GROUP_STAGE_KNOCKOUT => 'Group Stage + Knockout',
            self::LEAGUE => 'League Format',
            self::SWISS => 'Swiss System',
            self::HYBRID => 'Hybrid Format',
        };
    }
}
