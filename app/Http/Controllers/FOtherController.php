<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FOther;

class FOtherController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $select = DB::table('f_others')
                ->where('f_others.status', '=', 1)
                ->get();
        
        return view('admin.financial.other.all', compact('select'));
    }
    
    public function add($id) {
        $select = FOther::findOrFail($id);
        return view('admin.financial.other.add', compact('select'));
    }
    
    public function insert(Request $request) {
        $validate = $request->validate([
                    'payment_type' => 'required',
                    'payment_des' => 'required',
                    'payment_method' => 'required',
                    'pamount_taka' => 'required',
                    'pamount_words' => 'required',
                    'payment_date' => 'required',
                ], [
                    'pamount_taka.required' => 'Payment amount in taka is required.',
                    'pamount_words.required' => 'Payment amount in words is required.',
                    'payment_des.required' => 'Payment description is required.',
                ]);
        $insert = FOther::insertGetId([
             'payment_type' => $request->payment_type,
             'payment_des' => $request->payment_des,
             'payment_method' => $request->payment_method,
             'pamount_taka' => $request->pamount_taka,
             'pamount_words' => $request->pamount_words,
             'payment_date' => $request->payment_date,
        ]);
        
        if($insert > 0) {
            return redirect('f-others');
        }
    }
    
    public function receipt($id) {
        $select = FOther::findOrFail($id);
        return view('admin.financial.other.receipt', compact('select'));
    }
}
