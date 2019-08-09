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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('programmes', 'ProgrammeController');
Route::resource('faculties', 'FacultyController');
Route::patch('programmes/{programme}/edit', 'ProgrammeController@edit')->name('programmes.edit');
Route::patch('courses/{course}/edit', 'CourseController@edit')->name('courses.edit');
Route::resource('courses', 'CourseController');
Route::resource('m_e_r_s', 'MERController');
Route::resource('progstruc', 'ProgrammeStructureController');
Route::view('/', 'new');
Route::post('/progstruccreate', 'ProgrammeStructureController@show');
Route::post('/mercreate', 'MERController@show');
Route::resource('campus', 'CampusController');
Route::resource('partner', 'PartnerController');
Route::resource('accreditation', 'AccreditationController');
Route::resource('accommodation', 'AccommodationController');
Route::resource('loan', 'LoanInformationController');
Route::get('programmes/listprogrammes/display', 'ProgrammeController@listProgramme');
Route::get('programmes/listprogdetails/view', 'ProgrammeController@listprogdetail');
