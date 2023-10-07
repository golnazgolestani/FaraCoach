<?php

namespace App\Http\Controllers;

use App\teacher;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;


class TeacherController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=teacher::get();
        return view('panelAdmin/teachers')
                    ->with('teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelAdmin/insertTeacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname'         => ['required','persian_alpha', 'string', 'max:30'],
            'lname'         => ['required','persian_alpha', 'string', 'max:30'],
            'email'         => ['nullable', 'string', 'email', 'max:150', 'unique:teachers'],
            'sex'           => ['required','numeric'],
            'tel'           => ['nullable','iran_mobile','unique:teachers'],
            'education'     => ['required','persian_alpha', 'string', 'max:30'],
            'type'          => ['required','persian_alpha', 'string', 'max:30'],
            'city'          => ['required','persian_alpha', 'string', 'max:30'],
            'image'         => ['required','mimes:jpeg,jpg,png','max:600'],
            'biography'     => ['required', 'string'],
            'shortlink'     => ['required','persian_alpha','max:50','unique:teachers']
        ]);

        $file=$request->file('image');
        $image="coach-".$request->tel.".".$request->file('image')->extension();

        $path=public_path('/documents/users/');
        $files=$request->file('image')->move($path, $image);

        $status = teacher::create([
            'fname'         =>$request['fname'],
            'lname'         =>$request['lname'],
            'email'         =>$request['email'],
            'sex'           =>$request['sex'],
            'tel'           =>$request['tel'],
            'education'     =>$request['education'],
            'type'          =>$request['type'],
            'city'          =>$request['city'],
            'image'         =>$image,
            'biography'     =>$request['biography'],
            'shortlink'     =>$request['shortlink']
        ]);

        if($status)
        {
            $msg="استاد با موفقیت در سیستم ثبت شد";
            $errorStatus="success";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
        else
        {
            $msg="خطا در ثبت استاد";
            $errorStatus="danger";
            return back()
                ->with('msg',$msg)
                ->with('errorStatus',$errorStatus);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        if(Auth::check()) {
            $teacher = teacher::join('users', 'teachers.user_id', '=', 'users.id')
                ->where('users.id', '=', $teacher->user_id)
                ->first();
            $dateNow = verta();
            $dateShamsi = $dateNow->format('Y-m-d');
            $date_Miladi = Verta::getGregorian($dateNow->format('Y'), $dateNow->format('m'), $dateNow->format('d'));

            $date_Miladi = $date_Miladi[0] . '-' . $date_Miladi[1] . '-' . $date_Miladi[2];

            return view('coach')
                ->with('coach', $teacher)
                ->with('dateNow', $dateShamsi)
                ->with('date_Miladi', $date_Miladi);
        }
        else
        {
            alert()->error('برای ادامه باید وارد سایت شوید','خطا')->persistent('بستن');
            return redirect('/login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        return view('panelAdmin.editTeachers')
                    ->with('teacher',$teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacher $teacher)
    {
        $this->validate($request, [
            'fname'         => ['required','persian_alpha', 'string', 'max:30'],
            'lname'         => ['required','persian_alpha', 'string', 'max:30'],
            'email'         => ['required', 'string', 'email', 'max:150'],
            'sex'           => ['required','numeric'],
            'tel'           => ['required','iran_mobile'],
            'education'     => ['required','persian_alpha', 'string', 'max:30'],
            'type'          => ['required','persian_alpha', 'string', 'max:30'],
            'city'          => ['required','persian_alpha', 'string', 'max:30'],
            'image'         => ['nullable','mimes:jpeg,jpg,png','max:600'],
            'biography'     => ['required', 'string'],
        ]);
        if ($request->has('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image = "coach-" . $teacher->tel . "." . $request->file('image')->extension();
            $path = public_path('/documents/users/');
            $files = $request->file('image')->move($path, $image);
            $request->image = $image;
        }
        try {
            $teacher->update($request->all());
        } catch (Throwable $e) {

            $msg = $e->errorInfo[2];
            $errorStatus = "danger";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }

        if (isset($image)) {
            $teacher->image = $image;
        }
        $teacher->save();
        $msg = "پروفایل با موفقیت به روزرسانی شد";
        $errorStatus = "success";

        return redirect('/admin/teachers')->with('msg', $msg)
            ->with('errorStatus', $errorStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        $status=$teacher->delete();
        if($status)
        {
            $msg = "استاد با موفقیت حذف شد";
            $errorStatus = "success";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }
        else
        {
            $msg = "خطا در حذف استاد";
            $errorStatus = "danger";
            return back()->with('msg', $msg)
                ->with('errorStatus', $errorStatus);
        }

    }

    public function listTeachers()
    {
        $teachers=teacher::paginate($this->countPage());
        return view('panelUser.teachers')
                    ->with('coaches',$teachers);
    }
}
