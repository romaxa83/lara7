<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\Delegation\AppMessenger;

class DelegationController extends Controller
{

    public function index()
    {
        $title = 'Делегирование';

        $item = new AppMessenger();

        $item->setSender('email.test@test.com')
            ->setRecipient('email.test')
            ->setMessage('email.test')
            ->send();

        $item->toSms()
            ->setSender('sms.test@test.com')
            ->setRecipient('sms.test')
            ->setMessage('sms.test')
            ->send();

        \Debugbar::info($item);

        return view('patterns.delegation.index', compact('title'));
    }
}
