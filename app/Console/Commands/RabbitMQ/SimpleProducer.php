<?php

namespace App\Console\Commands\RabbitMQ;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class SimpleProducer extends Command
{
    protected $signature = 'rabbit:simple-producer';

    protected $description = 'Отправка простого сообщения';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // создаем соединение
        $connection = new AMQPStreamConnection('192.168.133.1', 5672, 'rabbit', 'rabbit');

        //Берем канал и декларируем в нем новую очередь, первый аргумент - название
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);

        //Создаем новое сообщение
        $msg = new AMQPMessage('Hello Romaxa!');

        //Отправляем его в очередь
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Sent 'Hello World!'\n";

        //закрываем канал и соединение
        $channel->close();
        $connection->close();
    }
}
