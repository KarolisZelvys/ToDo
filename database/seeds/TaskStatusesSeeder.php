<?php

use Illuminate\Database\Seeder;
use App\Status;

class TaskStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'To do',
                'color' => '#ffffff',
                'order' => '0',
            ],
            [
                'name' => 'In progress',
                'color' => '#FFFF00',
                'order' => '10',
            ],
            [
                'name' => 'Done',
                'color' => '#008000',
                'order' => '20',
            ],
        ];

        foreach ($statuses as $key => $value) {
            Status::create($value);
        }
    }
}
