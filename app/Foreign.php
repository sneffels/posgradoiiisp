<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foreign extends Model
{
    protected  $table='foreign';
    protected  $fillable=['person_id','country_id','city_id'];
    public  $timestamps=false;
}
