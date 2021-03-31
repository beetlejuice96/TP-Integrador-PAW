<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_MODELO';

    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(Brand::class,'ID_BRAND');
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class,'ID_MODEL');
    }
}
