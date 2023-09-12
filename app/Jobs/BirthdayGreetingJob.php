<?php

namespace App\Jobs;

use App\Mail\About\ResponseMail;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BirthdayGreetingJob implements ShouldQueue
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
        $employees = Employee::whereMonth('employee.date_of_birth', Carbon::now()->format('m'))
            ->whereDay('employee.date_of_birth', Carbon::now()->format('d'))
            ->get();

        foreach ($employees as $employee) {
            $data['header'] = 'Greetings ' . $employee->first_name;
            $data['body'] = 'We wish you a happy ' . $this->addOrdinalNumberSuffix($employee->age) .' birthday!';
            $data['footer'] = 'Love lots, THE Company';
            $data['email'] = $employee->user->email;
            $data['subject'] = 'Happy birthday!';

            Mail::to($data['email'])
                ->send(new ResponseMail($data));
        }
    }

    private function addOrdinalNumberSuffix(int $num) :string
    {
        if (!in_array(($num % 100), array(11, 12, 13))) {
            switch ($num % 10) {
                case 1: return $num.'st';
                case 2: return $num.'nd';
                case 3: return $num.'rd';
            }
        }
        return $num.'th';
    }
}
