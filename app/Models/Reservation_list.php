<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_list extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['charger_id', 'user_id', 'start_time', 'end_time'];
}
