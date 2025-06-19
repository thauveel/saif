<?php

namespace App\Enum;

enum OfficialType: string
{
    
    case MANAGER = 'manager';

    case ASSISTANT_MANAGER = 'assistant_manager';
    case COACH = 'coach';
    case ASSISTANT_COACH = 'assistant_coach';
    case TRAINER = 'trainer';
    case MEDICAL_ASSISTANT = 'medical_assistant';
    case FOLLOWER = 'follower';


    public function label(): string
    {
        return match ($this) {
            self::MANAGER => 'Manager',
            self::ASSISTANT_MANAGER => 'Assistant Manager',
            self::COACH => 'Coach',
            self::ASSISTANT_COACH => 'Assistant Coach',
            self::TRAINER => 'Trainer',
            self::MEDICAL_ASSISTANT => 'Medical Assistant',
            self::FOLLOWER => 'Follower',
            

        };
    }

    public static function forSport(string $sport): array
    {
        return match ($sport) {
            'futsal' => [self::MANAGER, self::ASSISTANT_MANAGER, self::COACH, self::ASSISTANT_COACH, self::TRAINER, self::MEDICAL_ASSISTANT],
            'football' => [self::MANAGER, self::ASSISTANT_MANAGER, self::COACH, self::ASSISTANT_COACH, self::TRAINER, self::MEDICAL_ASSISTANT],
            'volleyball' => [self::MANAGER, self::ASSISTANT_MANAGER, self::COACH, self::ASSISTANT_COACH, self::TRAINER, self::MEDICAL_ASSISTANT],
            'handball' => [self::MANAGER, self::ASSISTANT_MANAGER, self::COACH, self::ASSISTANT_COACH, self::TRAINER, self::MEDICAL_ASSISTANT, self::FOLLOWER],
            default => [self::MANAGER, self::ASSISTANT_MANAGER, self::COACH, self::ASSISTANT_COACH, self::TRAINER, self::MEDICAL_ASSISTANT],
        };
    }

    
}