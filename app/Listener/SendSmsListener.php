<?php
/**
 * ----------------------------------------------------------
 * date: 2020/8/3 14:34
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Listener;


use App\Event\UserPayedEvent;
use App\Event\UserRegisterEvent;
use Hyperf\Event\Contract\ListenerInterface;
use Swoole\Coroutine\System;

class SendSmsListener implements ListenerInterface
{

    public function listen(): array
    {
        return [
            UserRegisterEvent::class,
            UserPayedEvent::class,
        ];
    }

    public function process(object $event)
    {
        System::sleep(10);
        echo 'SendSmsListener done' . PHP_EOL;
        var_dump($event->data);
    }
}