<?php

namespace App\Http\Controllers;

use App\clinic_basic_info;
use App\coach;
use App\state;
use Illuminate\Http\Request;

class ClinicBasicInfoController extends Controller
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
        $services= Clinic_Basic_info:: wherenull ('parent_id')
            ->get ();
        return view('admin.clinic.setting.basic_info_insert_service')
            ->with('services',$services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'title'           =>'required|string',
                'pic'             =>'required|mimes:jpeg,jpg|max:600',
                'description'     =>'nullable',
                'status'          =>'required|boolean'

            ]);
        $status=Clinic_Basic_info::create($request->all());
        if ($status)
        {
            alert()->success("اطلاعات با موفقیت ذخیره شد ")->persistent('بستن');
        }
        else
        {
            alert()->error("خطا در ذخیره اطلاعات")->persistent('بستن');
        }
        return back();
    }


    public function store_speciality(Request  $request)
    {
        {
            //
            $this->validate(request(),
                [
                    'title'           =>'required|string',
                    'pic'             =>'required|mimes:jpeg,jpg|max:600',
                    'description'     =>'nullable',
                    'status'          =>'required|boolean',
                    'parent_id'       =>'required|numeric'

                ]);
            $status=Clinic_Basic_info::create($request->all());
            if ($status)
            {
                alert()->success("اطلاعات با موفقیت ذخیره شد ")->persistent('بستن');
            }
            else
            {
                alert()->error("خطا در ذخیره اطلاعات")->persistent('بستن');
            }

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clinic_basic_info  $clinic_basic_info
     * @return \Illuminate\Http\Response
     */
    public function show(clinic_basic_info $clinic_basic_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clinic_basic_info  $clinic_basic_info
     * @return \Illuminate\Http\Response
     */
    public function edit(clinic_basic_info $clinic_basic_info)
    {

        return view('admin.clinic.setting.basic_info_edit_services')
            ->with('clinic_Basic_info', $clinic_basic_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clinic_basic_info  $clinic_basic_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clinic_basic_info $clinic_basic_info)
    {
        $this->validate(request(),
            [
                'title'           =>'required|string',
                'pic'             =>'required|mimes:jpeg,jpg|max:600',
                'description'     =>'nullable',
                'status'          =>'required|boolean',

            ]);
        $clinic_Basic_info = Clinic_Basic_info::where('id', '=', $Clinic_Basic_info)
            ->first();
        $status = $clinic_Basic_info->update($request->all());
        if ($status) {
            alert()->success('به روز رسانی با موفقیت انجام شد')->persistent('بستن');
        } else {
            alert()->success('به روز رسانی با خطا مواجه شد')->persistent('بستن');
        }
        return redirect('admin/clinic_basic_info/create');
    }


    public function update_speciality(Request $request, $Clinic_Basic_info)
    {

        $this->validate(request(),
            [
                'title'           =>'required|string',
                'pic'             =>'nullable|mimes:jpeg,jpg|max:600',
                'description'     =>'nullable',
                'status'          =>'required|boolean',
                'parent_id'       =>'required|numeric'

            ]);
        $clinic_Basic_info = Clinic_Basic_info::where('id', '=', $Clinic_Basic_info)
            ->first();
        $status = $clinic_Basic_info->update($request->all());
        if ($status) {
            alert()->success('به روز رسانی با موفقیت انجام شد')->persistent('بستن');
        } else {
            alert()->success('به روز رسانی با خطا مواجه شد')->persistent('بستن');
        }
        return redirect('admin/clinic_basic_info/create_speciality');
    }
    public function update_orientation (Request $request, $Clinic_Basic_info)
    {

        $this->validate(request(),
            [
                'title'           =>'required|string',
                'pic'             =>'required|mimes:jpeg,jpg|max:600',
                'description'     =>'nullable',
                'status'          =>'required|boolean',
                'parent_id'       =>'required|numeric'

            ]);
        $clinic_Basic_info = Clinic_Basic_info::where('id', '=', $Clinic_Basic_info)
            ->first();
        $status = $clinic_Basic_info->update($request->all());
        if ($status) {
            alert()->success('به روز رسانی با موفقیت انجام شد')->persistent('بستن');
        } else {
            alert()->success('به روز رسانی با خطا مواجه شد')->persistent('بستن');
        }
        return redirect('admin/clinic_basic_info/create_orientation');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clinic_basic_info  $clinic_basic_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(clinic_basic_info $clinic_basic_info)
    {
        //
    }

    public function Services_all()
    {
        return  Clinic_Basic_info:: wherenull ('parent_id')
            ->get ();
    }

    public function create_speciality( )
    {
        $services_all=$this->Services_all();
        $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
            ->get ();
        $speciality=clinic_basic_info::whereIn('parent_id',$services_id)->get();

        return view('admin.clinic.setting.basic_info_insert_speciality')
            ->with('services_all',$services_all)
            ->with('speciality', $speciality);
    }

    public function create_orientation()
    {
        $services_all=$this->Services_all();
        $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
            ->get ();
        $speciality=clinic_basic_info::whereNotIn('parent_id',$services_id)->get();

        return view('admin.clinic.setting.basic_info_insert_orientation')
            ->with('services_all',$services_all)
            ->with('speciality', $speciality);
    }

    public function ajax_data()
    {
        dd('asdasdasd');
    }

    public function edit_speciality( $clinic_Basic_info)
    {
        $services_all=$this->Services_all();
        $clinic_Basic_info = Clinic_Basic_info::where('id', '=', $clinic_Basic_info)
            ->first();
        return view('admin.clinic.setting.basic_info_edit_speciality')
            ->with('services_all',$services_all)
            ->with('clinic_Basic_info', $clinic_Basic_info);
    }

    public function edit_orientation(clinic_basic_info $clinic_Basic_info)
    {

        $services_all=$this->Services_all();
        $services_id= Clinic_Basic_info:: select ('id')->wherenull ('parent_id')
            ->get ();
        $speciality=clinic_basic_info::whereIn('parent_id',$services_id)->get();
        return view('admin.clinic.setting.basic_info_edit_orientation')
            ->with('speciality',$speciality)
            ->with('clinic_Basic_info', $clinic_Basic_info);

    }

    public function ajax($clinic_Basic_info)
    {
        $parents=clinic_basic_info::where('parent_id','=',$clinic_Basic_info)
                            ->get();
        return ($parents);
    }

    public function category(clinic_basic_info $clinic_basic_info,Request $request)
    {


        $services=clinic_basic_info::whereNUll('parent_id')
                        ->get();

         $category=[];
         foreach($clinic_basic_info->children as $child)
         {
             foreach($child->children as $item )
             {
                array_push($category,$item->id);
             }
         }


        $coaches=coach::where(function($query) use ($category)
            {
                for ($i=0;$i<count($category);$i++)
                {
                    $query->orwhere('category', 'like', $category[$i] . ',%')
                            ->orwhere('category', 'like', '%,' . $category[$i])
                            ->orwhere('category', 'like', '%,' . $category[$i] . ',%');
                }
            })
            ->when($request->name,function($query,$request)
            {
                $query->with('User')
                        ->wherehas('User',function($query)use($request)
                        {
                           $query->where('fname','like',"%$request%")
                                    ->orwhere('lname','like',"%$request%");

                        });

            })
            ->when($request->student_coach,function($query)
            {
                $query->where('student_meeting',1);
            })
            ->when($request->gender=='man',function ($query,$request)
            {
                $query->with('User')
                    ->whereHas('user', function($query) use ($request)
                    {
                        $query->where('sex', $request);
                    });

            })
            ->when($request->gender=='woman',function ($query,$request)
            {
                $query->with('User')
                    ->whereHas('user', function($query) use ($request)
                    {
                        $query->where('sex', 0);
                    });

            })
            ->when($request->gender==2,function ($query,$request)
            {
                $query->with('User')
                    ->whereHas('user', function($query) use ($request)
                    {
                        $query->wherein('sex', [1,2,NULL]);
                    });

            })
            ->when($request->state,function($query,$request){
                $query->with('User')
                      ->whereHas('User',function ($query) use ($request)
                      {
                         $query->where('state',$request);
                      });
            })
            ->where('status',1)
            ->paginate(18);

        if($request->state)
        {
            $coaches->appends(['state'=>$request->state]);
        }

        if($request->gender)
        {
            $coaches->appends(['gender'=>$request->gender]);
        }
        if($request->student_coach)
        {
            $coaches->appends(['student_coach'=>$request->student_coach]);
        }

         $states=state::get();



        return view('clinic.clinic_coaches')
                            ->with('coaches',$coaches)
                            ->with('states',$states)
                            ->with('services',$services)
                            ->with('clinic_basic_info',$clinic_basic_info);
    }

}
