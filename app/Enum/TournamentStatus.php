<?php

namespace App\Enum;

enum TournamentStatus: string
{
    case Draft = 'draft';
    case Open = 'open';
    case Closed = 'closed';
    case OnGoing = 'on_going';
    case Completed = 'completed';

    public function label(): string
    {
        return match($this) {
            self::Draft => 'Draft',
            self::Open => 'Opened for Participation',
            self::Closed => 'Closed for Participation',
            self::OnGoing => 'On Going',
            self::Completed => 'Completed',
        };
    }

}

