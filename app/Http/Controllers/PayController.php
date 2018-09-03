<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Order, Calculate};
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\User;
use App\Http\Controllers\MailController;
use Session;
use Illuminate\Support\Facades\Redirect;

class PayController extends Controller
{
    public function pay(Request $request)
    {
       try {
            $order = Order::getFromSession();
            $total = Calculate::init($order)->getTotalPtice();
            if ($total[6] == 'once') {
                Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                ));
                $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => $total[5],
                    'currency' => 'usd'
                ));
            } elseif ($total[6] == 'biweekly') {
                $subscribe = $this->subscribeBiweekly($order->user_id, $total[6], $request, $total[5]);
            } else {
                return "once";
                $subscribe = $this->subscribeFrequency($order->user_id, $total[6], $request, $total[5]);
            }
            if(MailController::send()){
                Session::flash('message', 'Please, ckeck your email.');
                Session::flash('alert-class', 'alert-dark'); 
                return Redirect::to('extras');
            } else {
                Session::flash('message', 'Oops, it looks like something went wrong');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::to('extras');
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribeBiweekly($id, $frequency, $request, $amount)
    {
        try {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $user = User::find($id);
        $plan = \Stripe\Plan::create(array(
            "amount" => $amount,
            "interval" => "week",
            "interval_count" => 2,
            "product" => array(
                "name" => "random"
            ),
            "currency" => "usd",
        ));
        $user->newSubscription('first_prod', $plan['id'])->create($request->stripeToken);
        if(MailController::send()){
            Session::flash('message', 'Please, ckeck your email.');
            Session::flash('alert-class', 'alert-dark');
            return Redirect::to('extras');
        } else {
            Session::flash('message', 'Oops, it looks like something went wrong');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('extras');
        }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribeFrequency($id, $frequency, $request, $amount)  // weekly, monthly
    {
        switch ($frequency) {
            case 'weekly':
                $frequency = 'week';
                break;
            case 'monthly':
                $frequency = 'month';
        }
        try {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $user = User::find($id);
        $plan = \Stripe\Plan::create(array(
            "amount" => $amount,
            "interval" => "week",
            "product" => array(
                "name" => "cleaning"
            ),
            "currency" => "usd",
        ));
        $user->newSubscription('first_prod', $plan['id'])->create($request->stripeToken);
        if(MailController::send()){
            Session::flash('message', 'Please, ckeck your email.');
            Session::flash('alert-class', 'alert-dark');
            return Redirect::to('extras');
        } else {
            Session::flash('message', 'Oops, it looks like something went wrong');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('extras');
        }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
