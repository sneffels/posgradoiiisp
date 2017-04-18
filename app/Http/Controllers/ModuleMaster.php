<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

use App\Http\Requests;

class ModuleMaster extends Controller
{
    public function store(Request $request)
    {
        $module=new Module();
        $module->name=$request->name;
        $module->program_id=$request->program_id;
        $module->save();
        return redirect('program/edit/'.$request->program_id);
    }
}
