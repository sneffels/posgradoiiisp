<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/regional','RegionalController@index');
Route::get('/instacademics','InstAcademicHomeController@index');

Route::get('/countries','CountryController@index');
Route::get('/country/edit/{id}','CountryController@edit');
Route::get('/country/create/','CountryController@create');
Route::post('/country','CountryController@store');
Route::put('/country/{id}','CountryController@update');
Route::get('api/country/{id}','CountryController@show');

Route::post('city/{id}','CityController@store');
Route::put('city/{id}','CityController@update');
Route::get('api/cities','CityController@index');

Route::post('/department','DepartmentCDController@store');
Route::get('/department/edit/{id}','DepartmentCDController@edit');
Route::put('/department/edit/{id}','DepartmentCDController@update');

Route::post('province/{id}','ProvinceController@store');
Route::put('province/{id}','ProvinceController@update');
Route::delete('/province/{id}', 'ProvinceController@destroy');

Route::post('/institutiontype', 'InstitutionTypeController@store');

Route::post('institution','InstitutionController@store');

Route::get('/regNewStudent','StudentController@create');
Route::post('/regNewStudent','StudentController@store');

Route::get('/api/independents/{idCountry}/{idCity}','ApiController@independentInstitutionIndex');
Route::get('/api/independents','ApiController@independents');
Route::get('/api/dependencies/{id}','ApiController@dependencies');
Route::get('/api/provinces/{id}','ApiController@provinces');
Route::get('/api/academicRRHH','ApiController@academicRRHH');
Route::get('/api/academicRRHHById/{id}','ApiController@academicRRHHById');
Route::get('/api/modules/{id}','ApiController@modules');
Route::get('/api/version/{id}','ApiController@version');
Route::get('/api/versionModules','ApiController@versionModules');
Route::get('/api/versionModules/{id}','ApiController@versionModulesById');
Route::get('/api/courses','ApiController@courses');
Route::get('/api/person/{id}','ApiController@personByCI');

Route::get('/params','ParamsAPController@index');
Route::post('/paramsAcademicPlanning','AcademicOfferController@store');
Route::post('/program','ProgramController@store');

Route::get('/regNewRRHH','RRHHController@create');
Route::post('/regNewRRHH','RRHHController@store');

Route::get('/program','VersionController@create');
Route::post('/program','VersionController@store');
Route::get('/programs','VersionController@index');

Route::get('/modules','ModuleController@create');

Route::post('/module','ModuleMaster@store');

Route::get('/requirements','RequirementController@index');
Route::post('requirements','RequirementController@store');
Route::get('requirementLast','RequirementController@show');

Route::post('versionModule','ModuleController@store');

Route::get('courses','CourseController@index');
Route::post('course','CourseController@store');

Route::get('enrollment','EnrollmentController@create');


