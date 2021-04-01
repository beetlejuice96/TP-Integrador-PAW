<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferredSchedule extends Model
{
    use HasFactory;

    protected $table = 'PREFERRED_SCHEDULES';

    protected $primaryKey = 'ID_PREFERRED_SCHEDULES';

    protected $guarded = [];

    public function pendingAppointment(){
        return $this->belongsTo(PendingAppointment::class,'ID_PENDING_APPOINTMENT');
    }
}
}
