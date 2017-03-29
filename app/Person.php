<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected  $table='persons';
    protected  $fillable=['name',
                            'lastName',
                            'middleName',
                            'birthDate',
                            'personalId',
                            'phone',
                            'cellphone',
                            'email',
                            'gender',
                            'originType'];
    public  $timestamps=false;
}
