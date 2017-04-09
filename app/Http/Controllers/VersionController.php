<?php

namespace App\Http\Controllers;

use App\Program;
use App\Req;
use App\Version;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $v=Version::with('program')->get();
        return view('academicPlanification.program.index',['versions'=>$v]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs=Program::all();
        //$coo=RRHH::where('type','=','A')->get();
        $req=Req::all();
        return view('academicPlanification.program.create',[
            'programs'=>$programs,

            'req'=>$req
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $v=new Version();
        $v->state=$request->state;
        $v->nroVersion=$request->version; //unique
        $v->nroCredits=$request->credits;
        $v->startDate=$request->startDate;
        $v->finishDate=$request->finishDate;
        $v->price=$request->price;
        $v->discountPrice=$request->discountPrice;
        $v->enrollmentPrice=$request->enrollPrice;
        $v->coo_id=$request->cId;
        $v->program_id=$request->programId;

        $v->save();

        $req=$request->req;
        foreach ($req as $key=>$value)
        {
            $arrReq[]=[

                'req_id'=>$req[$key],
                'version_id'=>$v->id
            ];
        }
        DB::table('ReqVersions')->insert($arrReq);

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
