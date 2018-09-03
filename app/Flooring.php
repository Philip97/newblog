<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flooring extends Model
{
    protected $fillable = [
        'order_id',
        'hardwood',
        'cork',
        'vinyl',
        'concrete',
        'carpet',
        'natural_stone',
        'tile',
        'laminate'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}