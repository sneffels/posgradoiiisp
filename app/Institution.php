<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable=['name','dependencyState','countryId','cityId','institutionTypeId'];
    protected $table='institutions';
    public $timestamps=false;
    
    public function type()
    {
        return $this->belongsTo(InstitutionType::class,'institutionTypeId');
    }
    
    public function country()
    {
        return $this->hasOne(Country::class,'countryId');
   
    }

    public function city()
    {
        return $this->hasOne(City::class,'cityId');
    }
    
} 
