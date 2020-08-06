<?php
/**
 * ----------------------------------------------------------
 * date: 2020/8/4 15:56
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

declare(strict_types=1);

namespace App\Utils;


class StdoutLoggerFactory
{
    public function __invoke()
    {
        return Log::getInstance('sys');
    }
}