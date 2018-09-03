<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countertop extends Model
{
    protected $fillable = [
        'id',
        'order_id',
        'concrete',
        'quartz',
        'formica',
        'granite',
        'marble',
        'tile',
        'paper_Stone',
        'butcher_Block'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}