<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DB;
use App\Storage;

class Picture extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'url',
        'updated_at',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
