<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Notifications\TaskReminderNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:send-task-reminders';
    protected $signature = 'tasks:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for tasks due tomorrow';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = now()->addDay()->toDateString();
        $todos = Todo::whereDate('end_date', $tomorrow)
                    ->where('notified', false)
                    ->with('user')
                    ->get();
        if ($todos->isEmpty()) {
            $this->info('No tasks due tomorrow.');
            return;
        }
        Log::info('Processing tasks for reminders', ['date' => $tomorrow, 'task_count' => $todos->count()]);

        foreach ($todos as $todo) {
            Log::info('Sending reminder for task', ['task_id' => $todo->id, 'user_id' => $todo->user_id]);
            $todo->user->notify(new TaskReminderNotification($todo));
            $todo->update(['notified' => true]);
            Log::info('Updated task notification status', ['task_id' => $todo->id, 'notified' => true]);
        }
        
        $this->info('Task reminders sent successfully.');
    }
}
