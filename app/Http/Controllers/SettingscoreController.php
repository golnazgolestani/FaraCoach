<?php

namespace App\Http\Controllers;

use App\settingscore;
use Illuminate\Http\Request;

class SettingscoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingscore=settingscore::first();
        return view('panelAdmin.settingScore')
                    ->with('settingscore',$settingscore);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\settingscore  $settingscore
     * @return \Illuminate\Http\Response
     */
    public function show(settingscore $settingscore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settingscore  $settingscore
     * @return \Illuminate\Http\Response
     */
    public function edit(settingscore $settingscore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settingscore  $settingscore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, settingscore $settingscore)
    {
        $this->validate($request, [
            'signup'               => ['required','numeric'],
            'tel_verified'         => ['required','numeric'],
            'email_verified'         => ['required','numeric'],
            'partsprofile'         => ['required','numeric'],
            'introduced'           => ['required','numeric'],
            'loginintroduced'      => ['required','numeric'],
            'changeintroduced'     => ['required','numeric'],

        ]);
        $status=$settingscore->update($request->all());
        if($status)
        {
            $msg="امتیاز با موفقیت در سیستم ثبت شد";
            $errorStatus="success";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            $msg="خطا در ثبت امتیاز";
            $errorStatus="danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settingscore  $settingscore
     * @return \Illuminate\Http\Response
     */
    public function destroy(settingscore $settingscore)
    {
        //
    }
}
