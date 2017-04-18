<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\moduleEnrollment;
use App\Version;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Engines\EngineResolver;

class EnrollmentController extends Controller
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
        return view('persons.student.enrollment',['programs'=>$programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enrollment=new Enrollment();
        $enrollment->student_id=$request->cId; //unique
        $enrollment->version_id=$request->program_id;
        $enrollment->enrollmentDate=DateTime::date();
        $enrollment->save();

        $req=$request->reqEnrollment;
        foreach ($req as $key=>$value)
        {
            $arrReq[]=[

                'req_id'=>$req[$key],
                'ver_enrollment_id'=>$enrollment->id,

            ];
        }
        DB::table('reqEnrollment')->insert($arrReq);

        $moduleEnr=new moduleEnrollment();
        $moduleEnr->student_id=$request->cId;
        $moduleEnr->module_id=$request->module_id;
        $moduleEnr->grade=0;
        $moduleEnr->obs=$request->obs;
        $moduleEnr->enrollmentType=$request->type;
        $moduleEnr->enrollment_id=$enrollment->id;
        $moduleEnr->course_id=$request->course_id;
        $moduleEnr->save();

        return redirect('enrollment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
