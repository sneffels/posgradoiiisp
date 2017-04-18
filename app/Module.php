<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected  $table='modules';
    protected  $fillable=['name','program_id'];
    public  $timestamps=false;
    
    
}
