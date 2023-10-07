<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Gate::allows('isAdmin'))
        {

        }
        else if(\Gate::allows('isUser'))
        {
            $comments=comment::join('posts','comments.post_id','=','posts.id')
                            ->where('posts.user_id','=',Auth::user()->id)
                            ->select('comments.*','posts.*','comments.user_id as user_id_comment','comments.id as id_comment','comments.status as status_comment')
                            ->orderby('comments.id','desc')
                            ->paginate($this->countPage());


            foreach ($comments as $item)
            {
                $item->user=$this->get_user_byID($item->user_id_comment);
                $item->post=$this->get_postById($item->post_id);
            }


            return view('user.comments')
                        ->with('comments',$comments);
        }
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
        $this->validate($request,
            [
                'comment'   =>'required|string|min:5',
                'post_id'   =>'required|numeric',
                'type'      =>'required|string'
            ]);

        switch ($request->type)
        {
            case 'coach':$post=$this->get_coach(NULL,$request->post_id);
                            break;
            case 'event':$post=$this->get_events($request->id,NULL,NULL,'event');
                            break;

        }

        if(!is_null($post))
        {
            $status=comment::create($request->all()+
                [
                    'user_id'   =>Auth::user()->id,
                    'date_fa'   =>$this->dateNow,
                    'time_fa'   =>$this->timeNow,
                ]);
            if($status) {
                alert()->success('دیدگاه با موفقیت ثبت شد')->persistent('بستن');
                return back();
            }
            else
            {
                alert()->error('خطا در ثبت دیدگاه')->persistent('بستن');
                return back();
            }

        }
        else
        {
            $msg = "خطا در دریافت اطلاعات";
            $errorStatus = "danger";
            return back()
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        $post=$this->get_postById($comment->post_id);
        if(Auth::user()->id==$post->user_id)
        {
            if($comment->status==0)
            {
                $comment['status']=1;
            }
            else
            {
                $comment['status']=0;
            }
            $status=$comment->save();
            if($status)
            {
                $msg = "دیدگاه به نمایش گذاشته شد";
                $errorStatus = "success";
                return redirect('/panel/comments')
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
            }
            else
            {
                $msg = "دیدگاه از نمایش حذف شد";
                $errorStatus = "danger";
                return redirect('/panel/comments')
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
            }
        }
        else
        {
            return abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        $post=($this->get_postById($comment->post_id));
        $user=$this->get_user_byID($post->user_id);
        if(Auth::user()->id==$user->id)
        {
            $status=$comment->delete();
            if($status)
            {
                $msg = "دیدگاه با موفقیت حذف شد";
                $errorStatus = "success";
                return back()
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
            }
            else
            {
                $msg = "خطا در حذف دیدگاه";
                $errorStatus = "danger";
                return back()
                    ->with('msg',$msg)
                    ->with('errorStatus',$errorStatus);
            }
        }
        else
        {
            $msg = "شما مجاز به حذف نمی باشید";
            $errorStatus = "danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
    }
}
