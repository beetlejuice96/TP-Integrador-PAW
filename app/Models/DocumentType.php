<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $table = 'DOCUMENT_TYPES';

    protected $primaryKey = 'ID_DOCUMENT_TYPE';

    protected $guarded = [];

    public function personas(){
        return $this->hasMany(Person::class,'ID_DOCUMENT_TYPE');
    }
}
