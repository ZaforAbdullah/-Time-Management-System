<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Faker\Factory as Faker;

class RegistrationTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_user_can_register()
    {
        $faker = Faker::create();

        // Create a fixed fake user email address using the factory to refer later
        $user_email = $faker->safeEmail;
        
        $userData = [                
            'email' => $user_email,
        ];

        // Create a user in the database using the provided $userData
        $user = factory(User::class)->create($userData);

        // Make a POST request to your user registration endpoint with the fake user data
        $response = $this->post('/register', $userData);

        // Assuming a successful registration redirects
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['email' => $user_email]);
    }
    
}

