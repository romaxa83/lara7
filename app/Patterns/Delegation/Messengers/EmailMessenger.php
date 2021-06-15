<?php

namespace App\Patterns\Delegation\Messengers;

class EmailMessenger extends AbstractMessenger
{
    public function send(): bool
    {
        \Debugbar::info('Send by ' . __METHOD__);

        return parent::send();
    }
}

