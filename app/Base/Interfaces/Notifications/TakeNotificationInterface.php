<?php

namespace App\Base\Interfaces\Notifications;

interface TakeNotificationInterface
{
    /**
     * Get all notifications with provided parameter
     *
     * @param int $take
     *
     * @return object|null
     */

    public static function takeNotifications(int $take = 10): object|null;
}
