<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionType extends Model
{
    protected $fillable=['name'];
    protected $table='institutionTypes';
    public $timestamps=false;

    
}
