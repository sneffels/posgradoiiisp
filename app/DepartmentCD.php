<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentCD extends Model
{
    protected $fillable=['name'];
    protected $table='cdDepartments';
    public $timestamps=false;
    
    public function provinces()
    {
        return $this->hasMany(Province::class,'cdDepartment_id');
    }
}
