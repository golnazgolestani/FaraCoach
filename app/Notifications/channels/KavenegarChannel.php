<?php


namespace App\Notifications\channels;


use App\sms;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Kavenegar;

class KavenegarChannel
{
    public function __construct() {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');
    }
    public function send($notifiable,Notification $notification)
    {
        $msg =$notification->toKavenegarSms($notifiable)['text'];
        $tel =$notification->toKavenegarSms($notifiable)['tel'];
        try {
            $sender = "10004002002020";
            $message = $msg;
            $receptor = array($tel);
            $result = Kavenegar::Send($sender, $tel, $message);

            if ($result) {
                foreach ($result as $r) {
                    $messageid = $r->messageid;
                    $message = $r->message;
                    $status = $r->status;
                    $statustext = $r->statustext;
                    $sender = $r->sender;
                    $receptor = $r->receptor;
                    $date = $r->date;
                    $cost = $r->cost;
                }

                sms::create([
                    //'insert_user_id' => Auth::user()->id,
                    'recieve_user' => $tel,
                    'comment' => $message,
                    'date_fa' => $this->dateNow,
                    'time_fa' => $this->timeNow,
                    'type' => $status,
                    'code' => $messageid,
                ]);
                $msg=[];
                return $msg;
            }

        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            if(Auth::check())
            {
                $insert_user_id=Auth::user()->id;
            }
            else
            {
                $insert_user_id=NULL;
            }


            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status']=false;
            sms::create([
                'insert_user_id' => $insert_user_id,
                'recieve_user' => $tel,
                'comment' => $message,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
                'type' => $msg['status'],
                'code' =>  $msg['msg'],
            ]);
            return $msg;

        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status'] =false;
            sms::create([
                'insert_user_id' => Auth::user()->id,
                'recieve_user' => $tel,
                'comment' => $message,
                'date_fa' => $this->dateNow,
                'time_fa' => $this->timeNow,
                'type' => $msg['status'],
                'code' =>  $msg['msg'],
            ]);
            return $msg;
        }
    }
}
