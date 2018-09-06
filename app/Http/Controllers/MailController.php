<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;
use App\{Order, Extra, Countertop, Flooring, Calculate, User};


class MailController extends Controller
{
    static public function send()
    {
        $order = Order::getFromSession();
        $user =  User::find($order->user_id);
        $extras = Extra::where('order_id', $order->id)->get();
        $countertops = Countertop::where('order_id', $order->id)->get();
        $floorings = Flooring::where('order_id', $order->id)->get();
        $calculate = Calculate::init($order)->getTotalPtice(
            $extras[0],
            $countertops[0],
            $floorings[0]
        );
        Mail::to(["pr97110@gmial.com", "orherMail@mail.ru"])->send(new DemoEmail($order, $extras[0], $countertops[0], $floorings[0], $calculate));
        return true;
    }
}
