<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Faker\Provider\Base;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/panel";//$redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['tel']=$this->convertPersianNumber($data['tel']);

        return Validator::make($data, [
            'fname'             => ['persian_alpha','required', 'string', 'max:30'],
            'lname'             => ['persian_alpha','required', 'string', 'max:30'],
            'sex'               => ['required','boolean'],
            'email'             => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'tel'               => ['required','unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'tel_verified'      => ['required','boolean'],
            'introduced'        => ['nullable','numeric'],
            'gettingknow'       => ['nullable','numeric'],
            'gettingknow_child' => ['nullable','numeric'],
            'organization'      => ['nullable','persian_alpha'],
            'jobside'           => ['nullable','persian_alpha'],
            'types'              => ['nullable','in:1,30']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(!isset($data['gettingknow']))
        {
            $data['gettingknow']=NULL;
        }

        if(!isset($data['introduced']))
        {
            $data['introduced']=NULL;
        }

        if(session()->has('introduce'))
        {
            $data['introduced']=session('introduce');
        }

        if(!isset($data['organization']))
        {
            $data['organization']=NULL;
        }

        if(!isset($data['jobside']))
        {
            $data['jobside']=NULL;
        }

        $data['resource']=NULL;
        $data['detailsresource']=NULL;

        $data['tel']=$this->convertPersianNumber($data['tel']);

        return User::create([
            'fname'             => $data['fname'],
            'lname'             => $data['lname'],
            'sex'               =>$data['sex'],
            'email'             => $data['email'],
            'tel'               =>$data['tel'],
            'tel_verified'      =>$data['tel_verified'],
            'password'          => Hash::make($data['password']),
            'introduced'        =>$data['introduced'],
            'gettingknow'       =>$data['gettingknow'],
            'organization'      =>$data['organization'],
            'jobside'           =>$data['jobside'],
            'resource'          =>$data['resource'],
            'detailsresource'   =>$data['detailsresource'],
            'type'              =>$data['types'],
        ]);
    }


    public function showRegistrationForm()
    {
        //ارسال پارامتر به صفحه ثبت نام
        $condition=['parent_id','=','0'];
        $gettingknow_parent=$this->get_categoryGettingknow(NULL,NULL,1,NULL,'get',$condition);
        return view('auth.register')
                    ->with('gettingknow_parent',$gettingknow_parent);
    }
}
