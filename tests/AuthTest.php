<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\TimeEntry;
use Faker\Factory as Faker;
use Auth;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    public function test_user_can_login()
    {
        $user = $this->mockUserCreation();

        Auth::logout();
        
        // Attempt to login with the user's credentials
        $response = $this->post('/login', [
            'email' => $user['email'],
            'password' => 'password',
        ]);
        // Assert that the user is redirected to the home page after login
        $response->assertRedirect('/home');

        // Assert that the user is authenticated
        $this->assertTrue(Auth::check());
    }

    public function test_user_can_logout()
    {
        $user = $this->getAdminUser();

        $this->actingAs($user);

        // Attempt to logout
        $response = $this->get('/logout');

        // Assert that the user is redirected
        $response->assertRedirect('/');

        // Assert that the user is not authenticated
        $this->assertFalse(Auth::check());
    }
}
