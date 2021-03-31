<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_DOCUMENT_TYPE';

    public function personas(){
        return $this->hasMany(Person::class,'ID_DOCUMENT_TYPE');
    }
}
