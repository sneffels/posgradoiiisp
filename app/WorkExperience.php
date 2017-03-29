<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workExperience extends Model
{
    protected $table='workExperiences';
    protected $fillable=['institution',
                            'position',
                            'person_id'];
    public  $timestamps=false;
}
