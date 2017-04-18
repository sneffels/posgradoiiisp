<?php

namespace App\Http\Controllers;


use App\Course;
use App\DepartmentCD;
use App\Dependency;
use App\Http\Requests;
use App\Institution;
use App\Module;
use App\Person;
use App\Program;
use App\Province;
use App\Req;
use App\ReqVersions;
use App\RRHH;
use App\Version;
use App\versionModules;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //arreglar el api de ciudades
    public function independentInstitutionIndex($idCountry,$idCity)
    {
        $independent=Institution::where('dependencyState','=','1')->where('countryId','=',$idCountry)->where('cityId','=',$idCity)->get();
        return $independent;
    }

    public function dependencies($id)
    {

        $dep=Dependency::with('institution')->where('dependencyId','=',$id)->get();
        return $dep;

    }
    
    public function provinces($id)
    {
        $department=DepartmentCD::with('provinces')->find($id);
        return $department->provinces;
    }
    public function academicRRHH()
    {
        return RRHH::with('person')->where('type','=','A')->get();
    }
    public function academicRRHHById($id)
    {
        $resp= RRHH::whereHas('person',function($query) use ($id){
            $query->where('personalId','=',$id);
        })->with('person')->where('type','=','A')->get();
        return $resp;

    }
    public function modules($id)
    {
        $resp=Module::where('program_id','=',$id)->get();
        return $resp;
    }
    
    public function version($id)
    {
        $resp=Version::with('program')->find($id);
        return $resp;
    }
    public function versionModules()
    {
        $modules=versionModules::with('version.program','module')->get();
        return $modules;
    }
    public function versionModulesById($id)
    {
        $modules=Version::with('program','versionModules.module')->find($id);
        return $modules->versionModules;
    }

    public function courses()
    {
        $courses=Course::with('version.program','versionModule.module','professor.person')->get();
        return $courses;
    }
    public function personByCI($id)
    {
        $resp=Person::where('personalId','=',$id)->get();
        return $resp;
    }
    public function reqByProgram($id)
    {
        $resp=ReqVersions::with('req')->where('version_id','=',$id)->get();
        return $resp;
    }
    
    public function coursesByModule($id)
    {
        $resp=versionModules::with('courses')->find($id);
        return $resp->courses;
    }
    
    public function programByOffer($id)
    {
        $resp=Program::where('academic_offer_id','=',$id)->get();
        return $resp;
    }
}
