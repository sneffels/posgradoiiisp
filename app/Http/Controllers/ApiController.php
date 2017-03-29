<?php

namespace App\Http\Controllers;


use App\DepartmentCD;
use App\Dependency;
use App\Http\Requests;
use App\Institution;
use App\Province;
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
 
}
