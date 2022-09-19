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

    public static $priorities = [self::HIGH, self::MID, self::LOW];
    /**
     * return a random constant
     */
    public static function random()
    {
        $priorities = self::toArray();
        return $priorities[array_rand($priorities)];
    }
}
