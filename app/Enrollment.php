<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected  $table='versionEnrollment';
    protected  $fillable=[
        'student_id',
        'version_id',
        'enrollmentDate',
        ];
    public  $timestamps=false;
    
    public function student()
    {
        return $this->belongsTo(Person::class,'student_id');
    }
}

