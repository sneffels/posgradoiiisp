<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicOffer extends Model
{
    protected  $table='academicOffers';
    protected  $fillable=['name','min_wotkload','ac-grade'];
    public  $timestamps=false;
}
