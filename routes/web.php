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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//view route
Route::get('/teachers', 'UserController@index')->name('allTeachers');
Route::get('/teacher/add', 'UserController@add')->name('addTeacher');
Route::get('/teacher/edit/{id}', 'UserController@edit')->name('editTeacher');
Route::get('/edit-profile', 'UserController@edit_profile')->name('editProfile');
Route::get('/teacher/view/{id}', 'UserController@view')->name('viewTeacher');
Route::get('/view-profile/{id}', 'UserController@view')->name('viewTeacher');

Route::get('/students', 'StudentController@index')->name('allStudents');

Route::get('/admission/form', 'CandidateController@admission_form')->name('admissionForm');
Route::get('/admission/candidates', 'CandidateController@all')->name('allCandidates');

Route::get('/settings', 'SettingController@index')->name('personalSettings');

//action route
Route::post('/teacher/insert', 'UserController@insert')->name('insertTeacher');
Route::post('/teacher/update', 'UserController@update')->name('updateTeacher');
Route::get('/teacher/soft-delete/{id}', 'UserController@soft_delete')->name('softDeleteTeacher');
Route::post('/teacher/update-profile', 'UserController@update_profile')->name('updateProfile');

Route::post('/candidate/insert', 'CandidateController@insert')->name('insertCandidate');
Route::post('/candidate/add-marks', 'CandidateController@add_marks')->name('addMarks');

Route::post('/role/insert', 'SettingController@insert_role')->name('insertRole');
Route::get('/role/hide/{id}', 'SettingController@hide_role')->name('hideRole');
Route::get('/role/show/{id}', 'SettingController@show_role')->name('showRole');
Route::get('/role/delete/{id}', 'SettingController@delete_role')->name('deleteRole');

Route::post('/subject/insert', 'SettingController@insert_subject')->name('insertSubject');
Route::get('/subject/hide/{id}', 'SettingController@hide_subject')->name('hideSubject');
Route::get('/subject/show/{id}', 'SettingController@show_subject')->name('showSubject');
Route::get('/subject/delete/{id}', 'SettingController@delete_subject')->name('deleteSubject');