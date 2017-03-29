<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';
    protected $fillable=['name'];
    public  $timestamps=false;
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
