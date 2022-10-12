<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Action HIGH()
 * @method static Action MID()
 * @method static Action LOW()
 */
final class TicketPriority extends Enum
{
    private const LOW = 'Low';
    private const MID = 'Mid';
    private const HIGH = 'High';

    public static $priorities = [
        'low' => self::LOW,
        'mid' => self::MID,
        'high' => self::HIGH,
    ];
    /**
     * return a random constant
     */
    public static function random()
    {
        $priorities = self::toArray();
        return $priorities[array_rand($priorities)];
    }
}
