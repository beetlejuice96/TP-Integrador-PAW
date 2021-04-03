<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ID_USER';

    protected $table = 'USERS';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PASSWORD',
        'EMAIL',
        'ACTIVE'
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
        return DB::table('USERS')
            ->where('EMAIL',$credentials['email'])->exists();
    }

    public function person(){
        return $this->belongsTo(Person::class,'ID_PERSON');
    }
    static public function getUserAuthCode($code){
        return DB::table('users')->where('confirmation_code',$code)->first();
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'USERS_ROLES', 'ID_USER', 'ID_ROLE');
    }

    public function pendingAppointments(){
        return $this->hasMany(PendingAppointment::class,'ID_USER')->orderBy('REQUEST_DATE','DESC');
    }
}
