<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected  $table='versions';
    protected  $fillable=['state','nroVersion','nroCredits',
    'startDate','finishDate','price','discountPrice','enrollmentPrice', 'coo_id','program_id'];
    public  $timestamps=false;

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }

    public function versionModules()
    {
        return $this->hasMany(versionModules::class,'program_id');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'version_id');
    }
    
    public function coo()
    {
        return $this->hasOne(RRHH::class,'id','coo_id');
    }
    
    
}
