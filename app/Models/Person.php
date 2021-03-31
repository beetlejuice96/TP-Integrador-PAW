<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_PERSON';

    protected $guarded = [];

    //public static function getByDni($dni){
    //    return self::where("NRO_DOC", $dni)->get();
    //}

    //public static function getByExactNameAndSurname($nombre, $apellido){
    //    return self::where([["NOMBRE", $nombre], ["APELLIDO", $apellido]])->get();
    //}
    
    public function documentType(){
        return $this->belongsTo(DocumentType::class, "ID_DOCUMENT_TYPE");
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class,'ID_PERSON');
    }

    public function user(){
        return $this->hasOne(User::class,'ID_PERSON');
    }
}
