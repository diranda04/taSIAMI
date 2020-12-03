<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'name','username', 'email', 'password', 'role_id'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function lecturer(){
        return $this->hasOne(Lecturer::class, 'id_lecturer', 'id');
    }

    public function auditor(){
        return $this->hasOne(Auditor::class, 'id_auditor', 'id');
    }

    public function auditee(){
        return $this->hasMany(Auditee::class,'user_id', 'id');
    }

    public function dean(){
        return $this->hasMany(Dean::class, 'user_id', 'id');
    }

}
