<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'EMPLOYEES';

    protected $primaryKey = 'ID_EMPLOYEE';

    protected $guarded = [];

    public function jobs(){
        return $this->hasMany(Job::class, 'ID_EMPLOYEE');
    }
}
