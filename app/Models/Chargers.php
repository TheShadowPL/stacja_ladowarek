<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Chargers extends Model

{
    protected $table = 'ladowarki';
    protected $fillable = [
        'city', 'street', 'number', 'comment', 'status', 'closestTerm_time', 'closestTerm_date',
        'standard', 'power', 'price', 'locked'
    ];

    public function fullAddress()
    {
        return $this->street . ' ' . $this->number . ', ' . $this->city;
    }
}
