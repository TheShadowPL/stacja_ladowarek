<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mallfunctions_List extends Model
{
    protected $table = 'malfunctions';

    protected $fillable = [
        'charger_id', 'user_id', 'reported_time', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function charger()
    {
        return $this->belongsTo(Chargers::class, 'charger_id');
    }
}
