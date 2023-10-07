<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/panel";//RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = url()->previous();
    }

    //برای ریدایرکت کردن بعد از لاگین این تابع باید تغییر کند
//    protected function authenticated(Request $request)
//    {
//        if(Auth::check())
//        {
//            return redirect('/panel');
//        }
//    }


    protected function credentials(Request $request)
        {
//          if(is_numeric($request->get('email'))){
//            return ['tel'=>$request->get('email'),'password'=>$request->get('password')];
//          }

          if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
          }
          return ['tel' => $request->get('email'), 'password'=>$request->get('password')];
        }

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }
}
