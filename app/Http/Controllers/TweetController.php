<?php

namespace App\Http\Controllers;

use App\tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tweets=tweet::orderby('id','desc')
                    ->paginate(10);
        $tweets->appends(['tweets' => $request['tweets']]);
        return view('admin.tweets.tweet_all')
                    ->with('tweets',$tweets);

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
            'tweet'     =>'required|string',
            'status'    =>'required|numeric',
        ]);

        $status=tweet::create($request->all()+[
            'user_id'   =>Auth::user()->id
            ]);

        if($status)
        {
            alert()->success('دلنوشته با موفقیت اضافه شد')->persistent('بستن');
            return '<script>window.location="/"</script>';
        }
        else
        {
            alert()->error('خطا در دلنوشته')->persistent('بستن');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(tweet $tweet)
    {
        $status=$tweet->delete();
        if($status)
        {
            alert()->success('دلنوشته با موفقیت پاک شد')->persistent('بستن');
        }
        else
        {
            alert()->success('خطا در حذف دلنوشته')->persistent('بستن');
        }

        return back();

    }
}
