<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingAppointment extends Model
{
    use HasFactory;

    protected $table = 'PENDING_APPOINTMENTS';

    protected $primaryKey = 'ID_PENDING_APPOINTMENTS';

    protected $guarded = [];

    public function preferredSchedules(){
        return $this->hasMany(PreferredSchedule::class,'ID_PENDING_APPOINTMENT');
    }

    public function confirmedAppointment(){
        return $this->hasOne(ConfirmedAppointment::class,'ID_PENDING_APPOINTMENT');
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'ID_VEHICLE');
    }

    public function user(){
        return $this->belongsTo(User::class,'ID_USER');
    }

    public function services(){
        return $this->belongsToMany(Services::class, 'APPOINTMENTS_SERVICES', 'ID_PENDING_APPOINTMENT', 'ID_SERVICE')->withTimestamps();
    }
}
