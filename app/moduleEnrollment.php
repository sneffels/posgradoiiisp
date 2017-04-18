<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class moduleEnrollment extends Model
{

    protected $table='moduleEnrollment';
    protected $fillable=['student_id',
    'module_id',
    'grade',
    'obs','enrollmentType',
    'enrollment_id','course_id'];
    public  $timestamps=false;
    
    public function student()
    {
        return $this->belongsTo(Person::class,'student_id');
    }
    
}
