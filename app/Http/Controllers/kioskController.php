<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KioskStatus;
use Carbon\Carbon;
use Twilio\Rest\Client;

class KioskController extends Controller
{
    public function alive(Request $req)
    {
        $ref=$_SERVER['REMOTE_ADDR'];
        if ($ref) {
            $exists=KioskStatus::whereReferred($ref)->first();
            if ($exists) {
                $exists->last_ping_time=Carbon::now();
                $exists->save();
            } else {
                $alive=KioskStatus::create([
                    'referred' => $ref,
                    'last_ping_time'=>Carbon::now()
                ]);
            }
            return $exists ? : $alive;
        }
    }

    public function dead()
    {
        $this->sendText(env('TEXT_NUMBER', '+18282811085'));
    }
    private function _getText()
    {
        $text='Kiosk has been off focus for more than 10 minutes';
        return $text;
    }
    private function _transport($text, $toNumber)
    {
        $fromNumber=env("TWILIO_NUMBER");
        $client=new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $message = $client->messages->create($toNumber, [
                'from' => $fromNumber, // From a valid Twilio number
                'body' => $text
        ]);
    }
    public function sendText($number=false)
    {
        $text=$this->_getText();
        $number=$number ? : env('TEXT_NUMBER');
        if (env('SEND_SMS')) {
            $this->_transport($text, $number);
        } else {
            print_r(['text'=>$text,'number'=>$number]);
        }
    }
}
