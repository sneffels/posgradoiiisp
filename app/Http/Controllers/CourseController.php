<?php

namespace App\Http\Controllers;

use App\Course;
use App\Version;
use App\versionModules;
use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs=Version::with('program')->where('state','=','A')->get();
        $courses=Course::with('version.program','versionModule.module')->get();


        return view('academicPlanification.courses.create',
            ['programs'=>$programs,
            'courses'=>$courses]);
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
        $course=new Course();
        $course->version_id=$request->program_id;
        $course->version_module_id=$request->module_id;
        $course->professor_id=$request->professor_id;
        $course->course=$request->course;
        $course->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resp=Course::with('version.coo.person','version.program','versionModule.module','professor','enrollments.student')->find($id);
        //return $resp;
        return view('academicPlanification.courses.show',['course'=>$resp]);
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
