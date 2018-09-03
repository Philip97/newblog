<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Input, Storage};
use App\{Picture, Flooring, Countertop};

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'bedrooms',
        'bathrooms',
        'zip',
        'firstName',
        'lastName',
        'streetAddress',
        'apt',
        'city',
        'homeSquare',
        'mobPhon',
        'frequency',
        'date',
        'source',
        'pet',
        'adult',
        'children',
        'dirty',
        'chek',
        'steel',
        'stove',
        'door',
        'mildew',
        'attention',
        'more'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function extras()
    {
        return $this->hasMany('App\Extra');
    }

    public function floorings()
    {
        return $this->hasMany('App\Flooring');
    }

    public function countertops()
    {
        return $this->hasMany('App\Countertop');
    }

    public static function getFromSession()
    {
        return (
            Order::find(session('order_id'))
        );
    }

    public function updateHome($request, Order $order)
    {
        $order->fill(
             $request->all()
        );
        $order->save();
        if (Input::hasFile('logo')) {
            $order = new Order;
            $order->uploadImg($request['logo']);
        }
    }

    public function updateMaterials($request, Order $order)
    {
        $order->fill(
            $request->all()
        );
        $order->save();
        $flooring = new Flooring;
        $request['flooring'] = array_flip($request['flooring']);
        $data = $flooring::where('order_id', $order->id);
        $data = $flooring::updateOrCreate(
            ['id' => $order->id],
            [
                'order_id' => $order->id,
                'hardwood' => (isset($request['flooring']['hardwood']) ? 1 : 0),
                'cork' => (isset($request['flooring']['cork']) ? 1 : 0),
                'vinyl' => (isset($request['flooring']['vinyl']) ? 1 : 0),
                'concrete' => (isset($request['flooring']['concrete']) ? 1 : 0),
                'carpet' => (isset($request['flooring']['carpet']) ? 1 : 0),
                'natural_stone' => (isset($request['flooring']['natural_stone']) ? 1 : 0),
                'tile' => (isset($request['flooring']['tile']) ? 1 : 0),
                'laminate' => (isset($request['flooring']['laminate']) ? 1 : 0),
            ]
        );
        $countertop = new Countertop;
        $request['countertop'] = array_flip($request['countertop']);
        $data2 = $countertop::where('order_id', $order->id);
        $data2 = $countertop::updateOrCreate(
            ['id' => $order->id],
            [
                'order_id' => $order->id,
                'concrete' => (isset($request['countertop']['concrete']) ? 1 : 0),
                'quartz' => (isset($request['countertop']['quartz']) ? 1 : 0),
                'formica' => (isset($request['countertop']['formica']) ? 1 : 0),
                'granite' => (isset($request['countertop']['granite']) ? 1 : 0),
                'marble' => (isset($request['countertop']['marble']) ? 1 : 0),
                'tile' => (isset($request['countertop']['tile']) ? 1 : 0),
                'paper_Stone' => (isset($request['countertop']['paper_Stone']) ? 1 : 0),
                'butcher_Block' => (isset($request['countertop']['butcher_Block']) ? 1 : 0),
            ]
        );
        return true;
    }

    public function updateFrequency($frequency, Order $order)
    {
         $order->frequency = $frequency;
         $order->save();
    }

    public function saveExtras($request, Order $order)
    {
        $extras = new Extra;
        if ($request !== 'no_data') {
            $request['extras'] = array_flip($request);
            $data = $extras::updateOrCreate(
                ['id' => $order->id],
                [
                    'order_id' => $order->id,
                    'inside_fridge' => (isset($request['extras']['inside_fridge']) ? 1 : 0),
                    'inside_oven' => (isset($request['extras']['inside_oven']) ? 1 : 0),
                    'garage_swept' => (isset($request['extras']['garage_swept']) ? 1 : 0),
                    'inside_cabinets' => (isset($request['extras']['inside_cabinets']) ? 1 : 0),
                    'laundry_wash_s_dry' => (isset($request['extras']['laundry_wash_s_dry']) ? 1 : 0),
                    'bed_sheet_change' => (isset($request['extras']['bed_sheet_change']) ? 1 : 0),
                    'blinds_cleaning' => (isset($request['extras']['blinds_cleaning']) ? 1 : 0)
                ]
            );
             isset($request['extras']['inside_fridge']) ? $request['extras']['inside_fridge'] = 1 : false;
        } else {
            $del = $extras::find($order->id);
            if ( $del) $del->delete();
        }
        return $request['extras'] ?? null;
    }

    public function ajaxSave($ajax, $order)
    {
        $extras = new Extra;
        $data = $extras::where('order_id', $order->id);
        $data = $extras::updateOrCreate(
            ['id' => $order->id],
            [
                'order_id' => $order->id,
                $ajax => 1
            ]
        );
        $is_checked = [];
        foreach ($data->attributes as $key => $value) {
            if($value){
                $is_checked[$key] = $value;
            }
        }
        return $is_checked;
    }

    public function ajaxExtraDelete($ajax, $order)
    {
        $extras = new Extra;
        $data = $extras::where('order_id', $order->id);
        $data = $extras::updateOrCreate(
            ['id' => $order->id],
            [
                'order_id' => $order->id,
                $ajax => 0
            ]
        );
        $is_checked = [];
        foreach ($data->attributes as $key => $value) {
            if($value){
                $is_checked[$key] = $value;
            }
        }
        return $is_checked;
    }

}
