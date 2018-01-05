<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});


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

Breadcrumbs::register('students', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Students', route('allStudents'));
});

Breadcrumbs::register('settings', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Settings', route('personalSettings'));
});

Breadcrumbs::register('admissionForm', function ($breadcrumbs) {
    $breadcrumbs->push('Admission form', route('admissionForm'));
});
