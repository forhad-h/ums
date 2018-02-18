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
    return redirect('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', 'WelcomeController@welcome')->name('welcome');
//view route

//teachers
Route::get('/teachers', 'UserController@index')->name('allTeachers');
Route::get('/teacher/add', 'UserController@add')->name('addTeacher');
Route::get('/teacher/edit/{id}', 'UserController@edit')->name('editTeacher');
Route::get('/edit-profile', 'UserController@edit_profile')->name('editProfile');
Route::get('/teacher/view/{id}', 'UserController@view')->name('viewTeacher');
Route::get('/view-profile/{id}', 'UserController@view')->name('viewTeacher');

//student
Route::get('/students', 'StudentController@index')->name('allStudents');
Route::get('/student/view/{id}', 'StudentController@view')->name('viewStudent');
Route::get('/student/edit/{id}', 'StudentController@edit')->name('editStudent');

//employee
Route::get('/employees', 'EmployeeController@index')->name('allEmployees');
Route::get('/employee/view/{id}', 'EmployeeController@view')->name('viewEmployee');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('editEmployee');

//admission
Route::get('/admissions', 'AdmissionController@index')->name('allAdmission');
Route::get('/admission/edit/{id}', 'AdmissionController@edit')->name('editAdmission');

//public
Route::get('/admission/form', 'PublicController@admission_form')->name('admissionForm');

//admission exam
Route::get('/admission/exams', 'ExamController@index')->name('admissionExam');
Route::get('/admission/exam/edit/{id}', 'ExamController@edit_exam')->name('editExam');
Route::get('/admission/exams/QuestionPaper/{id}', 'ExamController@all_quest')->name('allQuest');
Route::get('/exam/question/edit/{id}', 'ExamController@edit_quest')->name('editQuest');

Route::get('admission/QuestinPaper/{id}', 'PublicController@QuestinPaper')->name('QuestionPaper');

//candidate
Route::get('/candidates', 'CandidateController@all')->name('allCandidates');
Route::get('/candidates/selected', 'CandidateController@selected')->name('selectedCandidates');
Route::get('/candidates/rejected', 'CandidateController@rejected')->name('rejectedCandidates');
Route::get('/candidate/select/{id}', 'CandidateController@select')->name('selectCandidate');
Route::get('/get-marks/{id}', 'CandidateController@get_marks')->name('getMarks');

//student payment
Route::get('/students-payment', 'PaymentController@index')->name('allPayments');
Route::get('/student-payment/add/{id}', 'PaymentController@add')->name('addPayment');
Route::get('/student-payment/receipt/{sid}/{pid}', 'PaymentController@receipt')->name('receiptPayment');

//teacher salary
Route::get('/teachers-salary', 'SalaryController@teachers_index')->name('allTSalary');
Route::get('/teacher-salary/add/{id}', 'SalaryController@ts_add')->name('addTSalary');
Route::get('/teacher-salary/receipt/{sid}/{pid}', 'SalaryController@ts_receipt')->name('receiptTSalary');

//employee salary
Route::get('/employees-salary', 'SalaryController@employees_index')->name('allESalary');
Route::get('/employee-salary/add/{id}', 'SalaryController@es_add')->name('addESalary');
Route::get('/employee-salary/receipt/{id}', 'SalaryController@es_receipt')->name('receiptESalary');

//others payment
Route::get('/f-others', 'FOtherController@index')->name('allOthers');
Route::get('/f-other/add/{id}', 'FOtherController@add')->name('addOther');
Route::get('/f-other/receipt/{id}', 'FOtherController@receipt')->name('receiptOther');

Route::get('/settings', 'SettingController@index')->name('personalSettings');

//action route

//teacher
Route::post('/teacher/insert', 'UserController@insert')->name('insertTeacher');
Route::post('/teacher/update', 'UserController@update')->name('updateTeacher');
Route::get('/teacher/soft-delete/{id}', 'UserController@soft_delete')->name('softDeleteTeacher');
Route::get('/teacher/delete/{id}', 'UserController@delete')->name('deleteTeacher');
Route::get('/teacher/restore/{id}', 'UserController@restore')->name('restoreTeacher');
Route::post('/teacher/update-profile', 'UserController@update_profile')->name('updateProfile');

//student
Route::post('/student/update', 'StudentController@update')->name('updateStudent');
Route::post('/student/change-semester', 'StudentController@change_semester')->name('changeSemester');
Route::get('/student/soft-delete/{id}', 'StudentController@soft_delete')->name('softDeleteStudent');
Route::get('/student/delete/{id}', 'StudentController@delete')->name('deleteStudent');
Route::get('/student/restore/{id}', 'StudentController@restore')->name('restoreStudent');

//employee
Route::post('/employee/insert', 'EmployeeController@insert')->name('insertEmployee');
Route::post('/employee/add-to-user', 'EmployeeController@add_tu')->name('addtU');
Route::post('/employee/update-to-user', 'EmployeeController@update_tu')->name('updatetU');
Route::post('/employee/update', 'EmployeeController@update')->name('updateEmployee');
Route::get('/employee/soft-delete/{id}', 'EmployeeController@soft_delete')->name('softDeleteEmployee');
Route::get('/employee/eu-delete/{email}', 'EmployeeController@eu_delete')->name('EUDelete');
Route::get('/employee/restore/{id}', 'EmployeeController@restore')->name('restoreEmployee');
Route::get('/employee/delete/{id}', 'EmployeeController@delete')->name('deleteEmployee');

//admission
Route::post('/admission/insert', 'AdmissionController@insert')->name('insertAdmission');
Route::post('/admission/update', 'AdmissionController@update')->name('updateAdmission');
Route::get('/admission/soft-delete/{id}', 'AdmissionController@soft_delete')->name('sdeleteAdmission');
Route::get('/admission/restore/{id}', 'AdmissionController@restore')->name('restoreAdmission');
Route::get('/admission/delete/{id}', 'AdmissionController@delete')->name('deleteAdmission');

// admission exam
Route::post('/exam/insert', 'ExamController@exam_insert')->name('insertExam');
Route::post('/exam/update', 'ExamController@update')->name('updateExam');
Route::get('/exam/soft-delete/{id}', 'ExamController@soft_delete')->name('sdeleteExam');
Route::get('/exam/restore/{id}', 'ExamController@restore')->name('restoreExam');
Route::get('/exam/delete/{id}', 'ExamController@delete')->name('deleteExam');

Route::post('/exam/question/insert/{id}', 'ExamController@quest_insert')->name('insertQuest');
Route::post('/exam/question/update/{id}', 'ExamController@quest_update')->name('updateQuest');
Route::get('/exam/question/delete/{examId}/{id}', 'ExamController@quest_delete')->name('deleteQuest');

Route::post('/exam/answer/insert/{id}', 'PublicController@ans_insert')->name('insertAns');

//public
Route::post('/candidate/insert', 'PublicController@c_insert')->name('insertCandidate');

Route::post('/candidate/add-marks', 'CandidateController@add_marks')->name('addMarks');
Route::post('/candidate/add', 'CandidateController@add')->name('addStudent');
Route::get('/candidate/reject/{id}', 'CandidateController@reject')->name('rejectCandidate');

Route::post('/student-payment/insert', 'PaymentController@insert')->name('insertPayment');

Route::post('/teacher-salary/insert', 'SalaryController@ts_insert')->name('insertTSalary');

Route::post('/employee-salary/insert', 'SalaryController@es_insert')->name('insertESalary');

Route::post('/f-other/insert', 'FOtherController@insert')->name('insertOther');

//role
Route::post('/role/insert', 'SettingController@insert_role')->name('insertRole');
Route::get('/role/hide/{id}', 'SettingController@hide_role')->name('hideRole');
Route::get('/role/show/{id}', 'SettingController@show_role')->name('showRole');
Route::get('/role/delete/{id}', 'SettingController@delete_role')->name('deleteRole');

//subject
Route::post('/subject/insert', 'SettingController@insert_subject')->name('insertSubject');
Route::get('/subject/hide/{id}', 'SettingController@hide_subject')->name('hideSubject');
Route::get('/subject/show/{id}', 'SettingController@show_subject')->name('showSubject');
Route::get('/subject/delete/{id}', 'SettingController@delete_subject')->name('deleteSubject');

//trash
Route::get('/all-trash', 'TrashController@all_trash')->name('allTrash');
