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
Route::get('/student/view/{id}', 'StudentController@view')->name('viewStudent');
Route::get('/student/edit/{id}', 'StudentController@edit')->name('editStudent');

Route::get('/employees', 'EmployeeController@index')->name('allEmployees');
Route::get('/employee/view/{id}', 'EmployeeController@view')->name('viewEmployee');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('editEmployee');

Route::get('/admission/form', 'AdmissionController@admission_form')->name('admissionForm');
Route::get('/admission/candidates', 'CandidateController@all')->name('allCandidates');
Route::get('/admission/selected', 'CandidateController@selected')->name('selectedCandidates');
Route::get('/admission/rejected', 'CandidateController@rejected')->name('rejectedCandidates');
Route::get('/candidate/select/{id}', 'CandidateController@select')->name('selectCandidate');

Route::get('/payments', 'PaymentController@index')->name('allPayments');
Route::get('/payment/add/{id}', 'PaymentController@add')->name('addPayment');
Route::get('/payment/receipt/{id}', 'PaymentController@receipt')->name('receiptPayment');

Route::get('/teachers-salary', 'SalaryController@teachers_index')->name('allTSalary');
Route::get('/teacher-salary/add/{id}', 'SalaryController@ts_add')->name('addTSalary');
Route::get('/teacher-salary/receipt/{id}', 'SalaryController@ts_receipt')->name('receiptTSalary');

Route::get('/employees-salary', 'SalaryController@employees_index')->name('allESalary');
Route::get('/employee-salary/add/{id}', 'SalaryController@es_add')->name('addESalary');
Route::get('/employee-salary/receipt/{id}', 'SalaryController@es_receipt')->name('receiptESalary');

Route::get('/f-others', 'FOtherController@index')->name('allOthers');
Route::get('/f-other/add/{id}', 'FOtherController@add')->name('addOther');
Route::get('/f-other/receipt/{id}', 'FOtherController@receipt')->name('receiptOther');

Route::get('/settings', 'SettingController@index')->name('personalSettings');

//action route
Route::post('/teacher/insert', 'UserController@insert')->name('insertTeacher');
Route::post('/teacher/update', 'UserController@update')->name('updateTeacher');
Route::get('/teacher/soft-delete/{id}', 'UserController@soft_delete')->name('softDeleteTeacher');
Route::post('/teacher/update-profile', 'UserController@update_profile')->name('updateProfile');

Route::post('/student/update', 'StudentController@update')->name('updateStudent');

Route::post('/employee/insert', 'EmployeeController@insert')->name('insertEmployee');
Route::post('/employee/update', 'EmployeeController@update')->name('updateEmployee');
Route::get('/employee/soft-delete/{id}', 'EmployeeController@soft_delete')->name('softDeleteEmployee');

Route::post('/candidate/insert', 'AdmissionController@insert')->name('insertCandidate');
Route::post('/candidate/add-marks', 'CandidateController@add_marks')->name('addMarks');
Route::post('/candidate/add', 'CandidateController@add')->name('addStudent');
Route::get('/candidate/reject/{id}', 'CandidateController@reject')->name('rejectCandidate');

Route::post('/payment/insert', 'PaymentController@insert')->name('insertPayment');

Route::post('/teacher-salary/insert', 'SalaryController@ts_insert')->name('insertTSalary');

Route::post('/employee-salary/insert', 'SalaryController@es_insert')->name('insertESalary');

Route::post('/f-other/insert', 'FOtherController@insert')->name('insertOther');


Route::post('/role/insert', 'SettingController@insert_role')->name('insertRole');
Route::get('/role/hide/{id}', 'SettingController@hide_role')->name('hideRole');
Route::get('/role/show/{id}', 'SettingController@show_role')->name('showRole');
Route::get('/role/delete/{id}', 'SettingController@delete_role')->name('deleteRole');

Route::post('/subject/insert', 'SettingController@insert_subject')->name('insertSubject');
Route::get('/subject/hide/{id}', 'SettingController@hide_subject')->name('hideSubject');
Route::get('/subject/show/{id}', 'SettingController@show_subject')->name('showSubject');
Route::get('/subject/delete/{id}', 'SettingController@delete_subject')->name('deleteSubject');