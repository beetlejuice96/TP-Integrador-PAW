<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_JOB';

    public function service(){
        return $this->belongsTo(Service::class,'ID_SERVICE');
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'ID_VEHICLE');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'ID_EMPLEADO');
    }

    public function details(){
        return $this->hasMany(Detail::class,'ID_JOB');
    }
}
