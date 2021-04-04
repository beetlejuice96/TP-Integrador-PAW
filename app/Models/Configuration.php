<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_CONFIGURATION';

    protected $table = 'CONFIGURATIONS';

    protected $guarded = [];
}
