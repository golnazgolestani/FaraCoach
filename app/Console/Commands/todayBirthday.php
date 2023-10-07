<?php

namespace App\Console\Commands;

use App\assessment;
use App\User;
use Illuminate\Console\Command;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Kavenegar;
class todayBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendSms:todayBirthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dateNow = $date->format('/m/d');
        $users=User::where('datebirth','like','%'.$dateNow)
                ->where('type','<>','-3')
                ->get();
        foreach ($users as $user)
        {
            $msg=$user->fname." ".$user->lname." عزیز\n"."زادروزت شیرین، پر عشق و نور آفرین باد.\n"."قهقهه هایی آسمانی و آرامش زلال زندگی را برایت آرزو داریم . . .\n"."آکادمی بین المللی فراکوچ\n"."لغو: 9";
            $this->sendSms($user->tel,$msg);
        }
        $msg="تعداد ".$users->count()." پیامک برای تولد اعضای سایت ارسال شد";
        $this->sendSms('09153159020',$msg);
        $this->sendSms('09376578529',$msg);
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


        } catch (\Kavenegar\Exceptions\HttpException $e)
        {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            $msg=[];
            $msg['msg'] = $e->errorMessage();
            $msg['status'] =false;

        }
    }
}
