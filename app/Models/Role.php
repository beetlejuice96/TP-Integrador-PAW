<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'ROLES';

    protected $primaryKey = 'ID_ROLE';

    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, 'USERS_ROLES' , 'ID_ROLE', 'ID_USER');
    }

    public function permisions(){
        return $this->belongsToMany(Permission::class, 'ROLES_PERMISSIONS', 'ID_ROLE', 'ID_PERMISSION');
    }
}
