<?php

namespace App\Console\Commands;

use App\assessment;
use App\faktor;
use App\sms;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;
use Kavenegar;

class sendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms_debt_financial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Send SMS';

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
     * @return int
     */
    public function handle()
    {
        $date = verta();
        $dateNow = $date->format('Y/m/d');
        $faktors=faktor::where('date_faktor','<',$dateNow)
                    ->where('status','=',0)
                    ->get();

        foreach($faktors as $item)
        {
            $msg=$item->user->fname.' '.$item->user->lname." عزیز\n"."با توجه به گذشت تاریخ واریزی شما به مبلغ ".number_format($item->fi) ." تومان در تاریخ ".$item->date_faktor." لطفا نسبت به واریز مبلغ اقدام نمایید\nفراکوچ";
            $this->sendSms($item->user->tel,$msg);
        }
        $msg="تعداد ".$faktors->count()." پیامک برای افراد بدهکار به فراکوچ ارسال شد";
        $this->sendSms('09153159020',$msg);
        $this->sendSms('09197136078',$msg);
    }

    public function sendSms($tel,$message)
    {

        try {
            $sender = "10004002002020";
            $receptor = array($tel);
            $result =Kavenegar::Send($sender, $tel, $message);
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


                $msg=[];

            }

        } catch (\Kavenegar\Exceptions\ApiException $e)
        {
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

            assessment::create([
                'subject'=>$msg['msg']
            ]);


        } catch (\Kavenegar\Exceptions\HttpException $e)
        {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status'] =false;
            assessment::create([
                'subject'=>$msg['msg']
            ]);

        }
    }
}
