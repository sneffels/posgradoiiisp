<?php

namespace App\Http\Controllers;

use App\Country;
use App\DepartmentCD;
use App\Foreign;
use App\Institution;
use App\National;
use App\RRHH;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

class RRHHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        $departments=DepartmentCD::all();
        $independent=Institution::where('dependencyState','=','1')->get();
        return view('rrhh.generalForm', ['countries'=>$countries,
            'departments'=>$departments,'dependencies'=>$independent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastName' => 'required',
            'middleName'=>'required',
            'birthDate'=>'required',
            'personalId'=>'required|unique:persons,personalId'
        ]);

        if($validator->fails()){
            return redirect('/regNewRRHH')->withErrors($validator)->withInput();
        }

        $person=new \App\Person();
        $person->name=$request->name;
        $person->lastName=$request->lastName;
        $person->middleName=$request->middleName;
        $person->birthDate=$request->birthDate;
        $person->personalId=$request->personalId;
        $person->phone=$request->phone;
        $person->cellphone=$request->cellphone;
        $person->email=$request->email;
        $person->gender=$request->gender;
        $person->originType=$request->originType;
        $person->save();
        if($request->originType=='N')
        {
            $national=new National();
            $national->personId=$person->id;
            $national->cdDepartmentId=$request->departmentId;
            $national->provinceId=$request->provinceId;
            $national->save();
        }
        else if($request->originType=='E')
        {
            $foreign=new Foreign();
            $foreign->personId=$person->id;
            $foreign->countryId=$request->countryId;
            $foreign->cityId=$request->cityId;
            $foreign->save();
        }

        $positions=$request->position;
        $institutions=$request->institution;

        foreach ($positions as $key=>$val)
        {
            $arrData[]=[
                'institution'=>$institutions[$key],
                'position'=>$positions[$key],
                'personId'=>$person->id
            ];
        }
        DB::table('workExperiences')->insert($arrData);

        $graduationDegrees=$request->graduationDegree;
        $dependenciesIds=$request->dependencyId;

        foreach ($graduationDegrees as $key=>$val)
        {
            $arrDataGD[]=[
                'graduationDegree'=>$graduationDegrees[$key],
                'personId'=>$person->id,
                'institutionId'=>$dependenciesIds[$key]
            ];
        }
        DB::table('academicInfos')->insert($arrDataGD);
        
        $rrhh=new RRHH();
        $rrhh->state=$request->state;
        $rrhh->type=$request->type;
        $rrhh->startDate=$request->startDate;
        $rrhh->person_id=$person->id;
        $rrhh->description=$request->description;



        $file=$request->file('curriculum');
        $ext=$file->getClientOriginalExtension();
        if($ext=='pdf' || $ext=='doc' || $ext=='docx')
        {
            $file->move(storage_path('curriculums/'),'curriculum'.$person->id.$file->getClientOriginalExtension());
            $rrhh->curriculumFilePath='curriculum'.$person->id.$file->getClientOriginalExtension();
        }
        $rrhh->save();

        if($rrhh->type == 'D')
            return redirect('administrativeRRHH');
        else
            return redirect('academicRRHH');
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
