<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mallfunctions_List extends Model
{
    protected $table = 'malfunctions';

    protected $fillable = [
        'charger_id', 'reported_time', 'description', 'user'
    ];
}
