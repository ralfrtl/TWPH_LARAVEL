<?php

namespace App\Jobs;

use App\Mail\About\ContactUsResponseMail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = Employee::whereMonth('employee.date_of_birth', Carbon::now()->format('m'))
            ->whereDay('employee.date_of_birth', Carbon::now()->format('d'))
            ->join('users', 'users.id', '=', 'employee.id')
            ->get();

        foreach ($users as $user) {
            $this->data['full_name'] = $user->first_name;
            $this->data['text'] = 'We wish you a happy ' . $user->age .' birthday!';
            $this->data['email'] = $user->email;

            Mail::to($this->data['email'])
                ->send(new ContactUsResponseMail($this->data, 'User'));
        }
    }
}
