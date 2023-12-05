<?php

namespace App\Base\Interfaces\Notifications;

interface CountNotificationInterface
{
    /**
     * count provided notifications
     *
     * @return int
     */

    public static function countNotifications(): int;
}
