<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class RRHH extends Model
{
    protected  $table='rrhh';
    protected  $fillable=['state','type','startDate','curriculumFilePath','person_id','description'];
    public  $timestamps=false;

    public function person()
    {
        return $this->belongsTo(Person::class,'person_id');
    }

}
