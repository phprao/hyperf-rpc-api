<?php
/**
 * ----------------------------------------------------------
 * date: 2020/8/3 14:35
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Event;


class UserPayedEvent
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __destruct()
    {
        echo 'UserPayedEvent destruct'.PHP_EOL;
    }
}