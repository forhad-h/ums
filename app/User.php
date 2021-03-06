<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roleM()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
    
    public function educationM()
    {
        return $this->hasOne('App\Education');
    }
    
    public function salaryM() {
        return $this->hasOne('App\TSalary');
    }
}
