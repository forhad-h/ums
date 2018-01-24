<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

//teachers
Breadcrumbs::register('teachers', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Teachers', route('allTeachers'));
});


Breadcrumbs::register('editTeacher', function ($breadcrumbs, $teacher) {
    $breadcrumbs->parent('teachers');
    $breadcrumbs->push('Edit teacher', route('editTeacher', $teacher->id));
    $breadcrumbs->push($teacher->name);
});

Breadcrumbs::register('viewTeacher', function($breadcrumbs, $teacher) {
    $breadcrumbs->parent('teachers');
    $breadcrumbs->push('View teacher', route('viewTeacher', $teacher->id));
    $breadcrumbs->push($teacher->name);
});

//Users profile
Breadcrumbs::register('editProfile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', route('editProfile'));
    $breadcrumbs->push('Edit profile', route('editProfile'));
});

Breadcrumbs::register('viewProfile', function($breadcrumbs, $teacher) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', route('viewTeacher', $teacher->id));
    $breadcrumbs->push('View profile', route('viewTeacher', $teacher->id));
});

//admission
Breadcrumbs::register('admissions', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admissions', route('allAdmission'));
});

Breadcrumbs::register('editAdmission', function ($breadcrumbs, $admission) {
    $breadcrumbs->parent('admissions');
    $breadcrumbs->push('Edit admission', route('editAdmission', $admission->admission_id));
});

Breadcrumbs::register('viewAdmission', function($breadcrumbs, $admission) {
    $breadcrumbs->parent('admissions');
    $breadcrumbs->push('View admission', route('viewAdmission', $admission->admission_id));
});

Breadcrumbs::register('admissionForm', function ($breadcrumbs) {
    $breadcrumbs->parent('admission');
    $breadcrumbs->push('Form', route('admissionForm'));
});

//candidates

Breadcrumbs::register('candidates', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Candidates', route('allCandidates'));
});

Breadcrumbs::register('sCandidates', function ($breadcrumbs) {
    $breadcrumbs->parent('candidates');
    $breadcrumbs->push('Selected', route('selectedCandidates'));
});

Breadcrumbs::register('rCandidates', function ($breadcrumbs) {
    $breadcrumbs->parent('candidates');
    $breadcrumbs->push('Rejected', route('rejectedCandidates'));
});

Breadcrumbs::register('sCandidate', function ($breadcrumbs, $candidate) {
    $breadcrumbs->parent('candidates');
    $breadcrumbs->push('Select candidate', route('selectCandidate', $candidate->id));
});

//students
Breadcrumbs::register('students', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Students', route('allStudents'));
});

Breadcrumbs::register('viewStudent', function($breadcrumbs, $student) {
    $breadcrumbs->parent('students');
    $breadcrumbs->push('View student', route('viewStudent', $student->id));
    $breadcrumbs->push($student->name);
});

Breadcrumbs::register('editStudent', function ($breadcrumbs, $student) {
    $breadcrumbs->parent('students');
    $breadcrumbs->push('Edit student', route('editStudent', $student->id));
    $breadcrumbs->push($student->name);
});

//students
Breadcrumbs::register('employees', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Employees', route('allEmployees'));
});

Breadcrumbs::register('viewEmployee', function($breadcrumbs, $employee) {
    $breadcrumbs->parent('employees');
    $breadcrumbs->push('View employee', route('viewEmployee', $employee->id));
    $breadcrumbs->push($employee->name);
});

Breadcrumbs::register('editEmployee', function ($breadcrumbs, $employee) {
    $breadcrumbs->parent('employees');
    $breadcrumbs->push("Edit employee\n", route('editEmployee', $employee->id));
    $breadcrumbs->push($employee->name);
});

//settings
Breadcrumbs::register('settings', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Settings', route('personalSettings'));
});

//Financial

Breadcrumbs::register('financial', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Financial', route('allPayments'));
});

//student payment
Breadcrumbs::register('allPayments', function($breadcrumbs) {
    $breadcrumbs->parent('financial');
    $breadcrumbs->push('Students payment', route('allPayments'));
});

Breadcrumbs::register('addPayment', function($breadcrumbs, $payment) {
    $breadcrumbs->parent('allPayments');
    $breadcrumbs->push('Pay', route('viewEmployee', $payment->id));
});

Breadcrumbs::register('receiptPayment', function($breadcrumbs, $payment) {
    $breadcrumbs->parent('allPayments');
    $breadcrumbs->push('Receipt', route('receiptPayment', $payment->id));
});

//Teachers salary
Breadcrumbs::register('allTSalary', function($breadcrumbs) {
    $breadcrumbs->parent('financial');
    $breadcrumbs->push('Teachers salary', route('allTSalary'));
});

Breadcrumbs::register('addTSalary', function($breadcrumbs, $tSalary) {
    $breadcrumbs->parent('allTSalary');
    $breadcrumbs->push('Pay', route('addTSalary', $tSalary->id));
});

Breadcrumbs::register('receiptTSalary', function($breadcrumbs, $tSalary) {
    $breadcrumbs->parent('allTSalary');
    $breadcrumbs->push('Receipt', route('receiptTSalary', $tSalary->id));
});

//Employees salary
Breadcrumbs::register('allESalary', function($breadcrumbs) {
    $breadcrumbs->parent('financial');
    $breadcrumbs->push('Employees salary', route('allESalary'));
});

Breadcrumbs::register('addESalary', function($breadcrumbs, $eSalary) {
    $breadcrumbs->parent('allESalary');
    $breadcrumbs->push('Pay', route('addESalary', $eSalary->id));
});

Breadcrumbs::register('receiptESalary', function($breadcrumbs, $eSalary) {
    $breadcrumbs->parent('allESalary');
    $breadcrumbs->push('Receipt', route('receiptESalary', $eSalary->id));
});

//Others payment
Breadcrumbs::register('allOthers', function($breadcrumbs) {
    $breadcrumbs->parent('financial');
    $breadcrumbs->push('Others payment', route('allOthers'));
});

Breadcrumbs::register('receiptOther', function($breadcrumbs, $oPayment) {
    $breadcrumbs->parent('allOthers');
    $breadcrumbs->push('Receipt', route('receiptOther', $oPayment->id));
});