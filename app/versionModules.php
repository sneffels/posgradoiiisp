<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class versionModules extends Model
{
    protected  $table='versionModules';
    protected  $fillable=[
        'program_id',
        'module_id',
        'state',
        'startDate',
        'finishDate',
        'credits'];
    public  $timestamps=false;

    public function version()
    {
        return $this->belongsTo(Version::class,'program_id');

    }
    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class,'version_module_id');
    }

    public function enrollments()
    {
        return $this->hasMany(moduleEnrollment::class,'module_id');
    }
}
