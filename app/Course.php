<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected  $table='courses';
    protected  $fillable=[
            'version_id',
            'version_module_id',
            'professor_id',
            'course'];
    public  $timestamps=false;
    
    public function version()
    {
        return $this->belongsTo(Version::class,'version_id');
        
    }

    public function versionModule()
    {
        return $this->belongsTo(versionModules::class,'version_module_id');
    }
    
    public function professor()
    {
        return $this->hasOne(RRHH::class,'id','professor_id');
    }
}
