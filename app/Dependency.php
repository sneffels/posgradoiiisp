<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    protected $table='dependencies';
    protected $fillable=['institutionId','dependencyId'];
    public $timestamps=false;

    public function institution()
    {
        return $this->belongsTo(Institution::class,'institutionId');
    }

}
