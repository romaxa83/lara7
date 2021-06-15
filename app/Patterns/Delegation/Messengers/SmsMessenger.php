<?php

namespace App\Patterns\Delegation\Messengers;

class SmsMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        \Debugbar::info('Send by ' . __METHOD__);

        return parent::send();
    }
}

