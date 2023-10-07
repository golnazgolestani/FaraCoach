<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{

    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');

//        $this->middleware('can:isUser');
//        $this->middleware(function ($request, $next) {
//            $this->user = Auth::user();
//            if(strlen($this->user->username)==0)
//            {
//                $msg = "برای دسترسی به قسمت بلاگ لطفا نام کاربری خود را در اطلاعات شخصی مشخص کنید";
//                $errorStatus = "danger";
//                return back()
//                    ->with('msg', $msg)
//                    ->with('errorStatus', $errorStatus);
//            }
//
//            return $next($request);

//        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(strlen(Auth::user()->username)==0)
        {
            alert()->error("لطفا از قسمت اطلاعات شخصی نام کاربری خود را مشخص کنید",'خطا')->persistent('بستن');

            return redirect('/panel/profile');
        }
        else
        {
            $posts=post::where('user_id','=',Auth::user()->id)
                        ->orderby('id','desc')
                        ->paginate($this->countPage());
            foreach ($posts as $item)
            {
                $item->comments=count($this->get_commentByPostId_withoutPaginate($item->id));
            }

            $categoryposts=$this->get_categoryPostByUserId(Auth::user()->id);



            return view('user.posts')
                    ->with('posts',$posts)
                    ->with('categoryposts',$categoryposts);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(strlen(Auth::user()->username)==0)
        {
            alert()->error("لطفا از قسمت اطلاعات شخصی نام کاربری خود را مشخص کنید",'خطا')->persistent('بستن');
            return redirect('/panel/profile');
        }
        else {
            $categoryposts=$this->get_categoryPostByUserId(Auth::user()->id);
            return view('user.insertPost')
                        ->with('categoryposts',$categoryposts);
        }
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
                'title'         =>'required|string|min:2|max:200',
                'shortlink'     =>'required|string|max:250',
                'content'       =>'required|string',
                'status'        =>'required|boolean',
                'status_comment'=>'required|boolean',
                'image'         =>'required|string'
            ]);
        $check=post::where('user_id','=',Auth::user()->id)
                    ->where('shortlink','=',$request['shortlink'])
                    ->get();

        if(count($check)==0) {
            $request['user_id'] = Auth::user()->id;
            $request['date_fa'] = $this->dateNow;
            $request['time_fa'] = $this->timeNow;

            $status = post::create($request->all());
            if ($status) {
                alert()->success("پست با موفقیت ذخیره شد",'پیام')->persistent('بستن');
                return back();
            } else {
                alert()->error("خطا در ذخیره",'خطا')->persistent('بستن');
                return back();
            }
        }
        else
        {
            alert()->error("لینک اختصاصی شما تکراری است",'خطا')->persistent('بستن');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($username,$post)
    {
        $user=$this->get_user_byUserName($username);
        $post=post::where('user_id','=',$user->id)
            ->where('shortlink','=',$post)
            ->first();
        if(!(is_null($user))&&(!is_null($post)))
        {
            $post->category=$this->get_categoryPostById($post->categorypost_id);
            if(is_null($post->category))
            {
                $post->category='دسته بندی نشده';
            }
            else
            {
                $post->category=$post->category->category;
            }

            $comments=$this->get_commentByPostId($post->id,1);

            foreach ($comments as $item)
            {
                $item->user=$this->get_user_byID($item->user_id);
                if(!is_null($item->user->username))
                {
                    $item->username=$item->user->username;
                }

                if(!is_null($item->user->fname)||!is_null($item->user->lname))
                {
                    $item->user=$item->user->fname.' '.$item->user->lname;
                }
                else if(!is_null($item->user->username))
                {
                    $item->user=$item->user->username;
                }

                if(is_null($this->get_user_byID($item->user_id)->personal_image))
                {
                    $item->personal_image="default-avatar.png";
                }
                else
                {
                    $item->personal_image=$this->get_user_byID($item->user_id)->personal_image;
                }
            }

            $categoryposts=$this->get_categoryPostByUserId($user->id);



            return view('single')
                ->with('posts',$post)
                ->with('user',$user)
                ->with('comments',$comments)
                ->with('categoryposts',$categoryposts);

        }

        return abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //چک می شود که پست آیا متعلق به خود کاربر است
        if(Auth::user()->id==$post->user_id) {
            $categoryposts=$this->get_categoryPostByUserId(Auth::user()->id);
            return view('user.editPost')
                ->with('post', $post)
                ->with('categoryposts',$categoryposts);
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
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,post $post)
    {
        //چک می شود که پست آیا متعلق به خود کاربر است
        if(Auth::user()->id==$post->user_id)
        {
            $check=post::where('user_id','=',Auth::user()->id)
                ->where('shortlink','=',$request['shortlink'])
                ->get();

            if(count($check)==1)
            {
                if($post->shortlink==$request['shortlink'])
                {
                    $status = $post->update($request->all());
                    if ($status) {
                        alert()->success("پست با موفقیت بروزرسانی شد",'پیام')->persistent('بستن');

                    } else {
                        alert()->error("خطا در بروزرسانی",'خطا')->persistent('بستن');
                    }
                }
                else
                {
                    alert()->error("لینک اختصاصی قبلا استفاده شده است",'خطا')->persistent('بستن');

                }

            }
            else if(count($check)==0)
            {

                $status = $post->update($request->all());
                if ($status) {
                    alert()->success("دسته با موفقیت بروزرسانی شد",'پیام')->persistent('بستن');

                } else {
                    alert()->error("خطا در بروزرسانی",'خطا')->persistent('بستن');
                }
            }
            else
            {
                return abort('403');
            }
        }
        else
        {
            return abort('403');
        }

        return redirect('/panel/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if(Auth::user()->id==$post->user_id)
        {
            $status=$post->delete();
            if($status)
            {
                $msg = "پست با موفقیت بروزرسانی شد";
                $errorStatus = "success";
                return redirect('/panel/post')
                    ->with('msg', $msg)
                    ->with('errorStatus', $errorStatus);
            }
            else
            {
                $msg = "خطا در بروزرسانی";
                $errorStatus = "danger";
                return redirect('/panel/post')
                    ->with('msg', $msg)
                    ->with('errorStatus', $errorStatus);
            }
        }
        else
        {
            return abort(403);
        }

    }

    public function blogHomePage(Request  $request,$user)
    {

        $user=$this->get_user_byUserName($user);
        if(is_null($user))
        {
            return abort(404);
        }
        else
        {
            $posts = post::where('user_id', '=', $user->id)
                        ->where('status', '=', 1)
                        ->orderby('id', 'desc')
                        ->paginate(5);
            foreach ($posts as $item)
            {
                $item->comment=count($this->get_commentByPostId($item->id,1));
                $item->category=$this->get_categoryPostById($item->categorypost_id);
                if(is_null($item->category))
                {
                    $item->category='دسته بندی نشده';
                }
                else
                {
                    $item->category=$item->category->category;
                }
            }

            $categoryposts=$this->get_categoryPostByUserId($user->id);

            return view('blog')
                        ->with('posts',$posts)
                        ->with('user',$user)
                        ->with('categoryposts',$categoryposts);
        }
    }

    public function categoryBlog($user,$category)
    {
        $user=$this->get_user_byUserName($user);
        if(!is_null($user))
        {
            $category=$this->get_categoryPost_ByUserId_ByCategory($user->id,$category);
            if(!is_null($category))
            {
                $posts=post::where('user_id','=',$user->id)
                    ->where('categorypost_id','=',$category->id)
                    ->where('status','=',1)
                    ->orderby('id','desc')
                    ->paginate(5);

                foreach ($posts as $item)
                {
                    $item->comment=count($this->get_commentByPostId($item->id,1));
                    $item->category=$this->get_categoryPostById($item->categorypost_id);
                    if(is_null($item->category))
                    {
                        $item->category='دسته بندی نشده';
                    }
                    else
                    {
                        $item->category=$item->category->category;
                    }
                }

                $categoryposts=$this->get_categoryPostByUserId($user->id);

                return view('blog')
                    ->with('posts',$posts)
                    ->with('user',$user)
                    ->with('categoryposts',$categoryposts);
            }
            else
            {
                return abort(404);
            }

        }
        else
        {
            return abort(404);
        }
    }

    public function newPosts()
    {
        $posts=post::join('users','posts.user_id','=','users.id')
                ->where('status','=',1)
                ->orderby('posts.id','desc')
                ->select('posts.*','users.*','posts.id as id_post')
                ->limit(12)
                ->get();
        $user=Auth::user();
        return view('blog_newPosts')
                ->with('posts',$posts);
    }


}
