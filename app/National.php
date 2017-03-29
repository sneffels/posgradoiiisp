<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class National extends Model
{
    protected  $table='nationals';
    protected  $fillable=['person_id','cdDepartment_id','province_id'];
    public  $timestamps=false;
}
