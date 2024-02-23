<?php

use Illuminate\Database\Seeder;

class TimeEntrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'task_name' => 'Bug Fix', 'start_time' => '2016-11-01 08:00:00', 'end_time' => '2016-11-01 11:30:00', 'user_id' => 2],
            ['id' => 2, 'task_name' => 'Feature Enhencement', 'start_time' => '2016-11-01 01:14:00', 'end_time' => '2016-11-01 01:50:00', 'user_id' => 2]
        ];

        foreach ($items as $item) {
            \App\TimeEntry::create($item);
        }
    }
}
