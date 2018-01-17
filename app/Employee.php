<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function roleM()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
    
    public function salaryM() {
        return $this->hasOne('App\ESalary');
    }
}
