<?php

namespace App\Http\Controllers;

use App\AcademicOffer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\Validator;

class AcademicOfferController extends Controller
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

        
        $rules=array(
            'name'=>'required|unique:academicOffers',
            'min_workload'=>'required',
            'ac_degree'=>'required'

        );
        $validator=\Illuminate\Support\Facades\Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect('params')->withErrors($validator)->withInput();
        }
        else
        {
            $offer=new AcademicOffer();
            $offer->name=$request->name;
            $offer->min_workload=$request->min_workload;
            $offer->ac_degree=$request->ac_degree;
            $offer->save();
            return redirect('params');
        }
        
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
