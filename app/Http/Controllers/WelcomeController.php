<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WelcomeController extends Controller
{
    public function __construct() {
        return $this->middleware('guest');
    }
    
    public function welcome() {
        $hasUser = User::all()->count();
        if($hasUser > 0) {
            return redirect('login');
        }else {
            return redirect('register');
        }
    }
}
