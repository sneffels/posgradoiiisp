<?php

namespace App\Http\Controllers;

use App\Dependency;
use App\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstitutionController extends Controller
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
        $institution=new Institution();
        $institution->name=$request->name;
        $institution->dependencyState=$request->dependencyState;
        $institution->countryId=$request->countryId;
        $institution->cityId=$request->cityId;
        $institution->institutionTypeId=$request->institutionTypeId;
        $institution->save();
        if($institution->dependencyState==0)
        {
            $dependency=new Dependency();
            $dependency->institutionId=$institution->id;
            $dependency->dependencyId=$request->dependencyId;
            $dependency->save();
        }
        return redirect('instacademics');
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
