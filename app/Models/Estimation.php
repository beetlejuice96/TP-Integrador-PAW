<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;

    protected $table = 'ESTIMATIONS';

    protected $primaryKey = 'ID_ESTIMATION';

    protected $guarded = [];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'ID_VEHICLE');
    }
}
