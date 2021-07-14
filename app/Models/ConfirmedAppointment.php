<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedAppointment extends Model
{
    use HasFactory;

    protected $table = 'CONFIRMED_APPOINTMENTS';

    protected $primaryKey = 'ID_CONFIRMED_APPOINTMENT';

    protected $guarded = [];

    public function pendingAppointment(){
        return $this->belongsTo(PendingAppointment::class,'ID_PENDING_APPOINTMENT');
    }
}
