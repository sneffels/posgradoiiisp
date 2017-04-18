<?php

namespace App\Http\Controllers;

use App\Module;
use App\Program;
use App\Version;
use App\versionModules;
use Illuminate\Http\Request;

use App\Http\Requests;

class ModuleController extends Controller
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
        $programs=Version::with('program')->where('state','=','A')->get();
        $modules=versionModules::with('version.program','module')->get();
        
        return view('academicPlanification.modules.create',
            ['programs'=>$programs,'modules'=>$modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moduleV=new versionModules();
        $moduleV->program_id=$request->program_id;
        $moduleV->module_id=$request->module_id;
        $moduleV->state=$request->state;
        $moduleV->startDate=$request->startDate;
        $moduleV->finishDate=$request->finishDate;
        $moduleV->credits=$request->credits;
        $moduleV->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resp=versionModules::with('version.coo.person','version.program','module','courses','courses.professor.person','enrollments.student')->find($id);

        return view('academicPlanification.modules.show',['module'=>$resp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
