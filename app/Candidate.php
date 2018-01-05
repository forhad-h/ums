<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function subjectfM() {
        return $this->belongsTo('App\Subject', 'subject_first', 'subject_code');
    }
    
    public function subjectsM() {
        return $this->belongsTo('App\Subject', 'subject_second', 'subject_code');
    }
    
    public function subjecttM() {
        return $this->belongsTo('App\Subject', 'subject_third', 'subject_code');
    }
    
    public function qualificationM() {
        return $this->hasOne('App\Qualification');
    }
}
