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

namespace App\Listener;


use App\Event\UserRegisterEvent;
use Hyperf\Event\Contract\ListenerInterface;

class SendEmailListener implements ListenerInterface
{

    public function listen(): array
    {
        return [
            UserRegisterEvent::class
        ];
    }

    public function process(object $event)
    {
        echo 'SendEmailListener done' . PHP_EOL;
        var_dump($event->data);
    }
}