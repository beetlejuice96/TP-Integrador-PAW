<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferredSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'ID_PREFERRED_SCHEDULE';

    public function pendingAppointment(){
        return $this->belongsTo(PendingAppointment::class,'ID_PENDING_APPOINTMENT');
    }
}
}
