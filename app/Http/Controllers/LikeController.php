<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'post_id'  =>'required|numeric',
        ]);

        $status=like::create($request->all()+[
            'user_id'   =>Auth::user()->id,
            'type'      =>'دلنوشته',
            'date_fa'   =>$this->dateNow,
            'time_fa'   =>$this->timeNow,
        ]);



        if($status) {

            $like=$this->get_likes(NULL,NULL,$request->post_id,'دلنوشته','get');

            return view('like')
                    ->with('status',$status)
                    ->with('like',$like);
        }
        else
        {
            return "<a href='' class='likes' description='" . $request->post_id . "' >
                            <i class='bi bi-heart'></i>
                        </a>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(like $like)
    {
        $dislike=like::where('user_id','=',Auth::user()->id)
                ->where('post_id','=',$like->post_id)
                ->first();
        $status=$dislike->delete();

        if($status)
        {
            return view('dislike')
                    ->with('like',$like);
//            return ("شسیشسیشسی");


        }
        else
        {
            return "ERRIR";
        }
    }
}
