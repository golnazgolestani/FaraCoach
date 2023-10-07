<?php

namespace App\Http\Controllers;

use App\integrityTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntegrityTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('panelUser.integrityTest');
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
        $mali=$request['vehicle7']+$request['vehicle12']+$request['vehicle23']+$request['vehicle29']+$request['vehicle34']+$request['vehicle36']+$request['vehicle40']+$request['vehicle48']+$request['vehicle53']+$request['vehicle59'];
        $personality=$request['vehicle1']+$request['vehicle8']+$request['vehicle18']+$request['vehicle24']+$request['vehicle30']+$request['vehicle39']+$request['vehicle44']+$request['vehicle49']+$request['vehicle54']+$request['vehicle55']+$request['vehicle62']+$request['vehicle65'];
        $tahodat=$request['vehicle2']+$request['vehicle5']+$request['vehicle10']+$request['vehicle14']+$request['vehicle17']+$request['vehicle21']+$request['vehicle28']+$request['vehicle37']+$request['vehicle52']+$request['vehicle60']+$request['vehicle64'];
        $relation=$request['vehicle3']+$request['vehicle9']+$request['vehicle16']+$request['vehicle19']+$request['vehicle25']+$request['vehicle26']+$request['vehicle31']+$request['vehicle38']+$request['vehicle43']+$request['vehicle45']+$request['vehicle50']+$request['vehicle56']+$request['vehicle61']+$request['vehicle63'];
        $health=$request['vehicle4']+$request['vehicle15']+$request['vehicle20']+$request['vehicle27']+$request['vehicle32']+$request['vehicle42']+$request['vehicle46']+$request['vehicle51']+$request['vehicle57'];
        $ghavanin=$request['vehicle6']+$request['vehicle11']+$request['vehicle13']+$request['vehicle22']+$request['vehicle33']+$request['vehicle35']+$request['vehicle41']+$request['vehicle47']+$request['vehicle58'];

        integrityTest::create([
            'user_id'       =>Auth::user()->id,
            'mali'          =>$mali,
            'personality'   =>$personality,
            'tahodat'       =>$tahodat,
            'relation'      =>$relation,
            'health'        =>$health,
            'ghavanin'      =>$ghavanin
        ]);

        $mali_percent=floor(($mali*100)/50);
//        $mali_percent=100-$mali_percent;
        $personality_percent=floor(($personality*100)/60);
//        $personality_percent=100-$personality_percent;
        $tahodat_percent=floor(($tahodat*100)/55);
//        $tahodat_percent=100-$tahodat_percent;
        $relation_percent=floor(($relation*100)/70);
//        $relation_percent=100-$relation_percent;
        $health_percent=floor(($health*100)/45);
//        $health_percent=100-$health_percent;
        $ghavanin_percent=floor(($ghavanin*100)/45);
//        $ghavanin_percent=100-$ghavanin_percent;

        return view('integrityTest_result')
            ->with('mali',$mali)
            ->with('mali_percent',$mali_percent)
            ->with('personality',$personality)
            ->with('personality_percent',$personality_percent)
            ->with('tahodat',$tahodat)
            ->with('tahodat_percent',$tahodat_percent)
            ->with('relation',$relation)
            ->with('relation_percent',$relation_percent)
            ->with('health',$health)
            ->with('health_percent',$health_percent)
            ->with('ghavanin',$ghavanin)
            ->with('ghavanin_percent',$ghavanin_percent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\integrityTest  $integrityTest
     * @return \Illuminate\Http\Response
     */
    public function show(integrityTest $integrityTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\integrityTest  $integrityTest
     * @return \Illuminate\Http\Response
     */
    public function edit(integrityTest $integrityTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\integrityTest  $integrityTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, integrityTest $integrityTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\integrityTest  $integrityTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(integrityTest $integrityTest)
    {
        //
    }
}
