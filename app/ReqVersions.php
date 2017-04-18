<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReqVersions extends Model
{
    protected  $table='ReqVersions';
    protected  $fillable=['version_id','req_id'];
    public  $timestamps=false;
    
    public function req()
    {
        return $this->belongsTo(Req::class,'req_id');
    }
}
