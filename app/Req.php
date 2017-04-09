<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    protected  $table='requirements';
    protected  $fillable=['name'];
    public  $timestamps=false;
}
