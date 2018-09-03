<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'order_id',
        'inside_fridge',
        'inside_oven',
        'garage_swept',
        'inside_cabinets',
        'laundry_wash_s_dry',
        'bed_sheet_change',
        'blinds_cleaning'
    ];

     public function order()
    {
        return $this->belongsTo('App\Order');
    }

}
