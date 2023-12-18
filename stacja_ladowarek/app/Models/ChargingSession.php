<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargingSession extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time', 'energy_charged', 'cost', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
