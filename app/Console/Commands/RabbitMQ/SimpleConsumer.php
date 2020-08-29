<?php

namespace App\Console\Commands\RabbitMQ;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class SimpleConsumer extends Command
{
    protected $signature = 'rabbit:simple-consumer';

    protected $description = 'Получение простого сообщения';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // создаем соединение
        $connection = new AMQPStreamConnection('192.168.133.1', 5672, 'rabbit', 'rabbit');

        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);

        echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

        //Функция, которая будет обрабатывать данные, полученные из очереди
        $callback = function($msg) {
            echo " [x] Received ", $msg->body, "\n";
        };

        //Уходим слушать сообщения из очереди в бесконечный цикл
        $channel->basic_consume('hello', '', false, true, false, false, $callback);
        while(count($channel->callbacks)) {
            $channel->wait();
        }

        //Не забываем закрыть соединение и канал
        $channel->close();
        $connection->close();
    }
}
