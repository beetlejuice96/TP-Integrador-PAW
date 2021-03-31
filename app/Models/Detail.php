<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_DETAIL';

    public function job(){
        return $this->belongsTo(Job::class,'ID_JOB');
    }
}
