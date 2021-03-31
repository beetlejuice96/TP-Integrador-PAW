<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedAppointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'ID_CONFIRMED_APPOINTMENT';

    public function pendingAppointment(){
        return $this->belongsTo(PendingAppointment::class,'ID_PENDING_APPOINTMENT');
    }
}
