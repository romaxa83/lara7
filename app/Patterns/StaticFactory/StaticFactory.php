<?php

namespace App\Patterns\StaticFactory;

use App\Patterns\Delegation\AppMessenger;
use App\Patterns\Delegation\Interfaces\MessengerInterface;

class StaticFactory
{
    public static function build(string $type = 'email'): MessengerInterface
    {
        $messenger = new AppMessenger();

        switch ($type) {
            case 'email':
                $messenger->toEmail();
                $sender = 'email.test@tets.com';
                break;
            case 'sms':
                $messenger->toSms();
                $sender = '111111111';
                break;
            default:
                throw new \Exception("Not definite type [{$type}]");
        }

        $messenger->setSender($sender)
            ->setMessage('message');

        return $messenger;
    }
}
