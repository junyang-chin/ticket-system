<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Action PENDING()
 * @method static Action OPEN()
 * @method static Action CLOSED()
 */
final class TicketStatus extends Enum
{
    private const PENDING = 'pending';
    private const OPEN = 'open';
    private const CLOSED = 'closed';

    public static $statuses = [self::PENDING, self::OPEN, self::CLOSED];

    /**
     * return a random constant
     */
    public static function random()
    {
        $statuses = self::toArray();
        return $statuses[array_rand($statuses)];
    }
}
