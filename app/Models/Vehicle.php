<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'ID_VEHICLE';

    protected $guarded = [];

    //public static function getByPatente($patente){
    //    return self::where("PATENTE", $patente)->get();
    //}
    
    //public static function setPersona($vehiculo, $idPersona){
    //    $vehiculo->ID_PERSONA = $idPersona;
    //    $vehiculo->save();
    //}

    public function model(){
        return $this->belongsTo(CarModel::class,'ID_MODEL');
    }

    public function person(){
        return $this->belongsTo(Person::class,'ID_PERSON');
    }

    public function pendingAppointments(){
        return $this->hasMany(PendingAppointment::class,'ID_VEHICLE');
    }

    public function jobs(){
        return $this->hasMany(Job::class,'ID_VEHICLE');
    }

    public function estimation(){
        return $this->hasOne(Estimation::class,'ID_VEHICLE');
    }
}
