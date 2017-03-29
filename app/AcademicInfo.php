<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academicInfo extends Model
{
    protected $table='academicInfos';
    protected $fillable=['graduationDegree',
                            'person_id',
                            'institution_id'];
    public  $timestamps=false;
}
