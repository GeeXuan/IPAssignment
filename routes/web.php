<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('programmes', 'ProgrammeController');
Route::resource('faculties', 'FacultyController');
Route::resource('login', 'Auth\LoginController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('view', 'userController'); 
Route::patch('programmes/{programme}/edit', 'ProgrammeController@edit')->name('programmes.edit');
Route::patch('courses/{course}/edit', 'CourseController@edit')->name('courses.edit');
Route::resource('courses', 'CourseController');
Route::resource('m_e_r_s', 'MERController');
Route::resource('progstruc', 'ProgrammeStructureController');
Route::post('/progstruccreate', 'ProgrammeStructureController@show');
Route::post('/mercreate', 'MERController@show');
Route::resource('campus', 'CampusController');
Route::resource('partner', 'PartnerController');
Route::resource('accreditation', 'AccreditationController');
Route::resource('accommodation', 'AccommodationController');
Route::resource('loan', 'LoanInformationController');
Route::post('createCoursesXML', [
    'uses' => 'ProgrammeController@createCampusXML'
]);
Route::get('programmes/listprogrammes/display', 'ProgrammeController@listProgramme');
Route::get('programmes/listprogdetails/view', 'ProgrammeController@listprogdetail');
Route::get('programmes/listfilter/filtering', function() {
    $progLevel = Input::get('level');
    if ($progLevel != " ") {
        $programme = DB::table('programmes')->where('progLevel', 'LIKE', '%' . $progLevel . '%')
                ->orWhere('progName', 'LIKE', '%' . $progLevel . '%')
                ->get();
        if (count($programme) > 0) {
            return view('listfilter')->withDetails($programme)->withQuery($progLevel);
        }
        
    }
});

Route::get('partner/{faculty}/create', 'PartnerController@create');
Route::get('accreditation/{faculty}/create', 'AccreditationController@create');
Route::patch('partner/{faculty}/update', 'PartnerController@update');
Route::get('partner/{faculty}/editPartner', 'PartnerController@editPartner');
Route::get('accreditation/{faculty}/editAccreditation', 'AccreditationController@editAccreditation');
Route::patch('accreditation/{faculty}/update', 'AccreditationController@update');
Route::get('faculties/xml/generateXML', 'FacultyController@generateXML');
Route::get('faculties/xml/previewXML', 'FacultyController@previewXML');
Route::get('faculties/xml/previewXSLT', 'FacultyController@previewXSLT');
Route::get('campus/api/findbyID', 'CampusController@findbyID');
Route::get('campus/api/restapi', 'CampusController@restapi');
Route::post('createProgrammeXML', [
    'uses' => 'ProgrammeController@createXML'
]);
Route::get('courses/xml/generateXML', 'CourseController@generateXML');

