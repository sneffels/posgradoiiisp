<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected  $table='programs';
    protected  $fillable=['name','academic_offer_id'];
    public  $timestamps=false;

    public function offer()
    {
        return $this->belongsTo(AcademicOffer::class,'academic_offer_id');
    }
    
}
