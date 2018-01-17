<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function subjectM()
    {
        return $this->belongsTo('App\Subject', 'subject', 'subject_code');
    }
    
    public function paymentM()
    {
        return $this->hasOne('App\Payment');
    }
}
