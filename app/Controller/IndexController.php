<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Event\UserPayedEvent;
use App\Event\UserRegisterEvent;
use App\Utils\Log;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Str;
use Phprao\ComposerTest\Interfaces\CalculatorServiceInterface;
use Phprao\ComposerTest\Interfaces\UserServiceInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Swoole\Coroutine\System;

/**
 * @AutoController()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        System::sleep(10);
        Log::info('request is done');

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function testRpc()
    {
        $client = ApplicationContext::getContainer()->get(CalculatorServiceInterface::class);
        $res = $client->add(1, 2);

        return [
            'result' => $res,
        ];
    }

    public function testUser()
    {
        $client = ApplicationContext::getContainer()->get(UserServiceInterface::class);
        $id = $client->addUser(['name'=>Str::random(), 'age'=>mt_rand(10, 100)]);
        $res = $client->getUserInfoByUserId($id);

        return $res;
    }

    public function testUserRegister()
    {
        $userId = $this->request->input('userId', 0);
        $this->eventDispatcher->dispatch((new UserRegisterEvent($userId)));
        echo 'done'.PHP_EOL;
    }

    public function testUserPayed()
    {
        $userId = $this->request->input('userId', 0);
        $money = $this->request->input('money', 0);
        $this->eventDispatcher->dispatch((new UserPayedEvent(['userId'=>$userId, 'money'=>$money])));
    }
}
