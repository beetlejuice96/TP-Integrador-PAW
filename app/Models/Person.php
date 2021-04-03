<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory;

    protected $table = 'PERSONS';

    protected $primaryKey = 'ID_PERSON';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['NAME','SURNAME', 'DOCUMENT_NUMBER','EMAIL'];
    //public static function getByDni($dni){
    //    return self::where("NRO_DOC", $dni)->get();
    //}

    //public static function getByExactNameAndSurname($nombre, $apellido){
    //    return self::where([["NOMBRE", $nombre], ["APELLIDO", $apellido]])->get();
    //}

    public static function getPerson($dates){
        return  DB::table('PERSONS')
            ->where('NAME',$dates['NAME'])
            ->where('SURNAME',$dates['SURNAME'])
            ->where('EMAIL',$dates['EMAIL'])->first();
    }

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
