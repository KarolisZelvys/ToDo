<?php

namespace App\Console\Commands;

use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TasksDueDateCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:duedate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check tasks if due date is passed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        $tasks = Task::select('name')
            ->where([
            ['status_id', '!=', 3],
//            ['due_date', '=', $todayDate]
        ])->get();
        $tasks = $tasks->toArray();

        $text = 'Tasks overdue: \n';

        foreach ($tasks as $task) {
            $text.= '\n'.$task['name'];
        }

        Mail::raw($text, function ($message) {
            $adminEmail = User::whereIsAdmin(1)->select('email')->pluck('email')[0];
            $message->from('test@test.test');
            $message->to($adminEmail);
        });

        return true;
    }
}
