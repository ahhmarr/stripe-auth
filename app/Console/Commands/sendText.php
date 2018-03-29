<?php

namespace App\Console\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use App\KioskStatus;
use App\Http\Controllers\KioskController;

class SendText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-text';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send text when kiosk is idle';


    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ctrl=new KioskController();
        $status=KioskStatus::whereReferred(env('KIOSK_DOMAIN', 'https://offsetmytrip.com/kiosk/'))->first();
        if ($status) {
            $ping=$status->last_ping_time;
            $idle=env('KIOSK_IDLE_MINUTES', 10);
            if ($ping->diffInMinutes()>$idle) {
                $ctrl->dead();
            }
        }
    }
}
