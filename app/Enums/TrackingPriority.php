<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Action HIGH()
 * @method static Action MID()
 * @method static Action LOW()
 */
final class TrackingPriority extends Enum
{
    private const HIGH = 'high';
    private const MID = 'mid';
    private const LOW = 'low';

    public static function random()
    {
        $statuses = self::toArray();

        return $statuses[array_rand($statuses)];
    }
}
