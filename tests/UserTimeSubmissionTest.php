<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTimeSubmissionTest extends TestCase
{

    public function test_time_submission()
    {
        $user = $this->mockUserCreation();
        $time_entry = $this->createGenericTimeSubmission($user);

        // Make a POST request to your user registration endpoint with the fake user data
        $this->post('/time_entries', $time_entry->toArray());

        $this->assertDatabaseHas('time_entries', ['task_name' => $time_entry['task_name']]);
    }

    public function test_show_time_submission()
    {
        $user = $this->mockUserCreation();
        $time_entry = $this->createGenericTimeSubmission($user);
        $response = $this->actingAs($user)->get('/time_entries/' . $time_entry['id']);
        $response->assertStatus(200);
    }

    public function test_update_time_submission()
    {
        $user = $this->mockUserCreation();

        $time_entry = $this->createGenericTimeSubmission($user);
        $time_entry['task_name'] = 'Updated Task Details';

        $response = $this->actingAs($user)->put('time_entries/'.$time_entry['id'], $time_entry->toArray());
        $this->assertDatabaseHas('time_entries', [
            'id' => $time_entry['id'],
            'task_name' => $time_entry['task_name']
        ]);
    }

    public function test_delete_time_submission()
    {
        $user = $this->mockUserCreation();
        $time_entry = $this->createGenericTimeSubmission($user);

        $response = $this->actingAs($user)->delete('time_entries/'.$time_entry['id']);
        $this->assertSoftDeleted('time_entries', [
            'id' => $time_entry['id']
        ]);
    }
}
