<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable=['name','cdDepartment_id'];
    protected $table='provinces';
    public $timestamps=false;

    public function department(){
        return $this->belongsTo(DepartmentCD::class,'cdDepartment_id');
    }
}
