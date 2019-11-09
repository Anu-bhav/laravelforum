<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use App\User;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    // php artisan make:test UserTest - creates file in tests/Feature folder
    // php artisan make:test UserTest --unit - creates file in tests/Unit folder

    // run command> vendor/bin/phpunit --verbose --debug --color=always


    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // vendor/bin/phpunit --verbose --debug --color=always --filter test_create_user_and_login_and_redirect_to_dashboard
    public function test_create_user_and_login_and_redirect_to_dashboard()
    {
        //$this->withoutExceptionHandling();
        $this->withExceptionHandling();

        // php artisan migrate:refresh
        // php artisan tinker
        // factory('App\User')->create();
        // factory('App\Post')->create();

        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password' //hard coded password
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }
}
