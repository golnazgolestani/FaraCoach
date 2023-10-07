<?php

namespace App\Http\Controllers;

use App\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.financial.wallet.wallet');
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

        $this->validate($request,[
            'amount'    =>'required|numeric',
        ]);

        if(is_null(Auth::user()->wallet))
        {
            $wallet=wallet::create($request->all()+[
                    'user_id'   =>Auth::user()->id,
                ]);
            alert()->success('مبلغ با موفیت به کیف پول اضافه شد')->persistent('بستن');
        }
        else
        {
            $wallet=Auth::user()->wallet;
            $wallet->amount=$wallet->amount+$request->amount;
            $wallet->save();

        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
