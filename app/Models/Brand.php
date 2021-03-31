<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_BRAND';

    protected $table = 'BRANDS';

    protected $guarded = [];

    public function models(){
        return $this->hasMany(ModelV::class, "ID_BRAND");
    }
        
}
