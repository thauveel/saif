<?php

namespace App\Enum;

enum TournamentStatus: string
{
    case DRAFT = 'draft';
    case OPEN = 'open';
    case CLOSED = 'closed';
    case ON_GOING = 'on going';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'Draft',
            self::OPEN => 'Opened for Participation',
            self::CLOSED => 'Closed for Participation',
            self::ON_GOING => 'On Going',
            self::COMPLETED => 'Completed',
        };
    }

    public function classes():string{
        return match($this) {
            self::DRAFT => 'inline-flex items-center rounded-full bg-gray-100 px-3 py-0.5 text-sm font-medium text-gray-800',
            self::OPEN => 'inline-flex items-center rounded-full bg-cyan-100 px-3 py-0.5 text-sm font-medium text-cyan-800',
            self::CLOSED => 'inline-flex items-center rounded-full bg-red-100 px-3 py-0.5 text-sm font-medium text-red-800',
            self::ON_GOING => 'inline-flex items-center rounded-full bg-blue-100 px-3 py-0.5 text-sm font-medium text-blue-800',
            self::COMPLETED => 'inline-flex items-center rounded-full bg-green-100 px-3 py-0.5 text-sm font-medium text-green-800',
        };
    }

}

