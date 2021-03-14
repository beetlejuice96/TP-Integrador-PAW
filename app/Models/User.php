<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //verifico que el user exista en la bd.
    static public function verifierCredentials($credentials): bool
    {
        $user= DB::table('users')
            ->where('email',$credentials['email'])
            ->first();
        if ($user!== null){
            return true;
        }
        return false;
    }

    public function getUser(String $username ){
        //return User::where('name',$username)->first;
    }

    public function loginUser(){

    }


}
