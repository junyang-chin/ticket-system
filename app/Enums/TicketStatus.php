<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static Action IN_PROGRESS()
 * @method static Action BACKLOG()
 * @method static Action COMPLETED()
 */
final class TicketStatus extends Enum
{
    private const BACKLOG = 'Backlog';
    private const IN_PROGRESS = 'In Progress';
    private const COMPLETED = 'Completed';

    public static $statuses = ['backlog' => self::BACKLOG, 'in_progress' => self::IN_PROGRESS, 'completed' => self::COMPLETED];

    /**
     * return a random constant
     */
    public static function random()
    {
        $statuses = self::toArray();
        return $statuses[array_rand($statuses)];
    }
}
