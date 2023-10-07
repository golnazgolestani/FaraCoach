<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            $date = verta();
            $dateNow = $date->format('Y/m/d');
            $timeNow = $date->format('H:i:s');
            View::share('dateNow', $dateNow);
            View::share('timeNow', $timeNow);
            if(Gate::allows('isAdmin'))
            {
                $response=$this->client->request('GET', 'countinbox.json?startdate=1642636800&enddate=1642723200&linenumber=10004002002020&isread=1');
                $countSMS=json_decode($response->getBody()->getContents())->entries;
                View::share('countSMS', $countSMS);
            }
    }
}
