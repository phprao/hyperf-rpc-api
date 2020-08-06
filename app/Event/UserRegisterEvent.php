<?php
/**
 * ----------------------------------------------------------
 * date: 2020/8/3 14:23
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Event;


class UserRegisterEvent
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __destruct()
    {
        echo 'UserRegisterEvent destruct'.PHP_EOL;
    }
}