<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function __construct() {
        //
    }
    
    public function admission_form() {
        return view('admission.form');
    }
}
