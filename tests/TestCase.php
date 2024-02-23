<?php

use App\User;
use App\TimeEntry;
use Faker\Factory as Faker;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
    function mockUserCreation()
    {
        $faker = Faker::create();

        // Create a fixed fake user email address using the factory to refer later
        $user_email = $faker->safeEmail;

        $userData = [        
            'id'    => $faker->numberBetween(500, 9999),
            'email' => $user_email,
        ];

        // Create a user in the database using the provided $userData
        $user = factory(User::class)->create($userData);

        // Make a POST request to your user registration endpoint with the fake user data
        $this->post('/register', $userData);

        return $user;
    }

    function createGenericTimeSubmission($user)
    {

        $faker = Faker::create();

        // Create a fixed fake task name using the factory to refer later
        $task_name = $faker->sentence($nbWords = 6, $variableNbWords = true);

        $time_entry = [     
            'user_id'   => $user['id'],         
            'task_name' => $task_name
        ];

        $time_submission = factory(TimeEntry::class)->create($time_entry);

        return $time_submission;
    }

    function getAdminUser()
    {
        return User::where('name', 'Admin')->where('role_id', 1)->first();
    }
}
