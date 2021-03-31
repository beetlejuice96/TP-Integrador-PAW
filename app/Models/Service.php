<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_SERVICE';

    public function pendingAppointments(){
        return $this->belongsToMany(PendingAppointment::class, 'APPOINTMENTS_SERVICES', 'ID_SERVICE', 'ID_PENDING_APPOINTMENT');
    }

    public function jobs(){
        return $this->hasMany(Job::class,'ID_SERVICE');
    }
}
