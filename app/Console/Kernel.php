<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $Transaction = new \App\Http\Controllers\Payment\TapController();
        foreach (\App\Models\Order::where('status', 5)->whereNotNull('transaction_number')->get() as $Order) {
            $Transaction->response($Order->transaction_number);
        }
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
