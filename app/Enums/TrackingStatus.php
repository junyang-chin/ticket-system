<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Action IN_PROGRESS()
 * @method static Action BACKLOG()
 * @method static Action COMPLETED()
 */
final class TrackingStatus extends Enum
{
    private const IN_PROGRESS = 'in_progress';
    private const BACKLOG = 'backlog';
    private const COMPLETED = 'completed';

    public static $statuses = [self::IN_PROGRESS, self::BACKLOG, self::COMPLETED];

    /**
     * return a random constant
     */
    public static function random()
    {
        $statuses = self::toArray();
        return $statuses[array_rand($statuses)];
    }
}
