<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;

class LivewireSignupTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function can_signuo()
    {
        Livewire::test('auth.signup')
            ->set('email', 'test@test.com')
            ->set('login', 'test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('signup')
            ->assertRedirect('/main')
        ;

        $this->assertTrue(User::whereEmail('test@test.com')->exists());
    }

    /** @test */
    public function email_is_required()
    {
        Livewire::test('auth.signup')
            ->set('email', '')
            ->set('login', 'test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('signup')
            ->assertHasErrors('email')
        ;
    }

    /** @test */
    public function email_is_valid_email()
    {
        Livewire::test('auth.signup')
            ->set('email', 'fdsfsdfsd')
            ->set('login', 'test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('signup')
            ->assertHasErrors(['email' => 'email'])
        ;
    }
}
