<?php

/**
 * Created by PhpStorm.
 * User: ccwen
 * Date: 3/3/2017
 * Time: 14:07
 */
class InstitutionRepository
{
    public function independentInstitutions()
    {
        $independent=\App\Institution::where('dependencyStatus','=','0');
        return $independent;
    }
}