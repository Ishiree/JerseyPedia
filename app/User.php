<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nohp', 'alamat', 'role'
    ];
   

    public function pesanans(){
        return $this -> hasMany(Pesanan::class, 'user_id','id');
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
    
    public function hasPermission($permission) {
        return $this->role->permissions()->where('name', $permission)->first() ?: false;
    }
}
