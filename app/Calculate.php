<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;;

class Calculate extends Model
{
    private $_order;
    private $_constants;

    function __construct(Order $order)
    {
        $this->_constants = Config::get("constants");
        $this->_order = $order;
    }

    public static function init(Order $order)
    {
        return new Calculate($order);
    }

    private function getExtrasPrise($extras)
    {
        $extras_sum = [];
        foreach ($extras as $key => $value) {
            if($key == 'attributes') {
                foreach ($value as $k => $v){
                    if ($v) {
                        $extra = ($this->_constants['extras'][$k] ?? 0);
                        $extras_sum[] = $extra;
                    }
                }
            }
        }
        $extras_sum = array_sum($extras_sum);
        return $extras_sum;
    }

    private function getCountertopsPrise($countertops)
    {
        $countertops_sum = [];
        foreach ($countertops as $key => $value) {
            if($key == 'attributes') {
                foreach ($value as $k => $v){
                    if ($v) {
                        $countertop = ($this->_constants['countertops'][$k] ?? 0);
                        $countertops_sum[] = $countertop;
                    }
                }
            }
         
        }
        $countertops_sum = array_sum($countertops_sum);
        return $countertops_sum;
    }

    private function getFlooringsPrise($floorings)
    {
        $floorings_sum = [];
        foreach ($floorings as $key => $value) {
            if($key == 'attributes') {
                foreach ($value as $k => $v){
                    if ($v) {
                        $flooring = ($this->_constants['floorings'][$k] ?? 0);
                        $countertops_sum[] = $flooring;
                    }
                }
            }
        }
        $countertops_sum = array_sum($countertops_sum);
        return $countertops_sum;
    }

    public function getTotalPtice()
    {
        $extras = ($this->_order->extras()->get() ?? false);
        if($extras[0] ?? false){
            $extras_price = $this->getExtrasPrise($extras[0]);
        } else {
            $extras_price = 0;
        }
        $countertops = $this->_order->countertops()->get();
        $floorings = $this->_order->floorings()->get();
        $countertops_price = $this->getCountertopsPrise($countertops[0]);
        $floorings_price = $this->getFlooringsPrise($floorings[0]);
        $bedrooms = $this->_constants['bedrooms'][$this->_order['bedrooms']];
        $bathrooms = $this->_constants['bathrooms'][$this->_order['bathrooms']];
        $frequency = $this->_constants['frequency'][$this->_order['frequency']];
        $pet = $this->_constants['pet'][$this->_order['pet']];
        $adult = $this->_constants['adult'][$this->_order['adult']];
        $children = $this->_constants['children'][$this->_order['children']];
        $chek = $this->_constants['chek'][$this->_order['chek']];
        $steel = $this->_constants['steel'][$this->_order['steel']];
        $stove = $this->_constants['stove'][$this->_order['stove']];
        $door = $this->_constants['door'][$this->_order['door']];
        $mildew = $this->_constants['mildew'][$this->_order['mildew']];
        $homeSquare1 = $this->_constants['homeSquare'][1];
        $homeSquare2 = $this->_constants['homeSquare'][2];
        $hom_sq_price = $this->_order['homeSquare'] / $homeSquare1 * $homeSquare2;
        $hom_sq_price = round($hom_sq_price, 1);
        $dirty1 = $this->_constants['dirty'][1];
        $dirty2 = $this->_constants['dirty'][2];
        $dirty_price = $this->_order['dirty'] / $dirty1 * $dirty2;
        $dirty_price = round($dirty_price, 1);
        $total = array_sum([
             $extras_price,
             $countertops_price,
             $floorings_price,
             $bedrooms,
             $bathrooms,
             $pet,
             $adult,
             $children,
             $chek,
             $steel,
             $stove,
             $door,
             $mildew,
             $hom_sq_price,
             $dirty_price
         ]);
        $total = round($total);
        // dd($total);
        $weekly = $total + $this->_constants['frequency']['weekly'];
        $biweekly = $total + $this->_constants['frequency']['biweekly'];
        $monthly = $total + $this->_constants['frequency']['monthly'];
        $once = $total + $this->_constants['frequency']['once'];
        $total_curent = $total + $frequency;
        // dd($total_curent);
        $stripe = str_replace('.', '', $total_curent);
        $stripe = $stripe . '00';
        $frequency = $this->_order['frequency'];
        $total = [$total_curent, $once, $weekly, $biweekly, $monthly, $stripe, $frequency];
        // dd($total);
        return ($total);
    }
}