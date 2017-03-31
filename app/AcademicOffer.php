<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicOffer extends Model
{
    protected  $table='academicOffers';
    protected  $fillable=['name'];
    public  $timestamps=false;
}
