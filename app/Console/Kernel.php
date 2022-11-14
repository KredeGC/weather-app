<?php

namespace App\Console;

use Log;
use App\Models\ForecastSubscription;
use App\Mail\ForecastMail;
use App\Http\Traits\ForecastTrait;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    use ForecastTrait;
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            $mails = ForecastSubscription::get();
            
            foreach ($mails as $mail)
            {
                $forecast = $this->getForecast($mail->location);
                
                Mail::to($mail->mail)->send(new ForecastMail($forecast, $mail->token));
            }
        })->dailyAt('6:00');//->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
