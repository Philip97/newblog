<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Order, Calculate, Extra, Picture};
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MailController;
use Session;


class MainController extends Controller
{
    private $user;

    private $order;

    public function p1PersonalInfo()
    {
        return view('1_page');
    }

    public function get1PersonalInfo(Request $request)
    {
        $validatedData = $request->validate([
            'inp_email' => 'required|email',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'zip' => 'required|min:4|numeric'
        ]);
        $users = new User;
        $user = $users->check($request['inp_email']);
        $this->user = $user;
        $order = new Order();
        $order->fill(
            $request->all()
        );
        $user->orders()->save($order);
        session(['order_id' => $order->id]);
        return redirect('/your-home');
    }

    public function p2YourHome()
    {
        $pictures = Order::find(session('order_id'))->pictures()->take(8)->get();
        $pictures_url = [];
        $pictures_id = [];
        foreach ($pictures as $key => $value) {
            $pictures_url[] = $value['url'];
            $pictures_id[] = $value['id'];
        }
        $data = 'asd';
        return view('2_page', compact('pictures_url', 'pictures_id'));
    }

    public function get2YourHome(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'streetAddress' => 'required|min:4|string',
            'apt' => 'nullable|numeric',
            'city' => 'required|string',
            'homeSquare' => 'required|numeric',
            'mobPhon' => 'required|string|max:15',
            'frequency' => 'required|string',
            'date' => 'required|string',
            'advertis' => 'required|string',
            'pet' => 'required|string',
            'adult' => 'required|string',
            'children' => 'required|string',
            'dirty' => 'required|numeric',
            'chek' => 'required|numeric',
        ]);
        $order = Order::getFromSession();
        $order->updateHome($request, $order);
        return redirect('/materials');
    }

    public function uploadImg(Request $request)
        {
            $files_array = $request['file'];
            $pictures_count = Order::find(session('order_id'))->pictures()->count();
            $total_available = 8;
            $total_available = $total_available - $pictures_count;
            if ($pictures_count <= 8 ) {
                $validated_data = $request->validate([
                    'file[]' => 'mimes:jpeg,png|max:5170',
                ]);
                $file = Input::file($request['file[]']);
                $files_urls = [];
                $files_id = [];
                $order = Order::getFromSession();
                for ($i=0; $i < $total_available; $i++) {
                    if (isset($file['file'][$i])){
                        $file_url = Storage::url(Storage::put('/', $file['file'][$i]));
                        $picture = new Picture;
                        $picture->url = $file_url;
                        $id = $order->pictures()->save($picture);
                        $files_urls[] = $file_url;
                        $files_id[] = $id['id'];
                        unset($file_url);
                    }
                }
            } else {
                $files_urls = 'it`s load too many pictures';
                $files_id = 'it`s load too many pictures';
            }
            return (
                response()->json([
                    'success' => $files_urls,
                    'successId' => $files_id
                ])
            );
        }

    public function deleteImg(Request $request)
    {
        $image_id = $request['image_id'];
        $picture = Picture::find($image_id);
        $picture_url = explode('/', $picture['url']);
        Storage::delete($picture_url[3]);
        $picture->delete();
        return (
            response()->json([
                'success' => $image_id
            ])
        );
    }

     public function p3Materials()
    {
        return view('3_page');
    }

    public function get3Materials(Request $request)
    {
          $validatedData = $request->validate([
            'flooring' => 'required|array',
            'countertop' => 'required|array',
            'steel' => 'required|numeric',
            'stove' => 'nullable|numeric',
            'door' => 'required|numeric',
            'mildew' => 'required|numeric',
            'attention' => 'nullable|string|max:900',
            'more' => 'nullable|string|max:900'
        ]);
        $order = Order::getFromSession();
        $order->updateMaterials($request, $order);
        return redirect('/extras');
    }

     public function p4Extras()
    {
        $order = Order::getFromSession();
        $get_extras = $order->extras()->get();
        $countertops = $order->countertops()->get();
        $floorings = $order->floorings()->get();
        if ($get_extras[0] ?? false) {
            $extras = $get_extras[0];
            $extras = $get_extras;
            $total = Calculate::init($order)->getTotalPtice();
// dd($total, 'total', $order, 'order', $extras, 'extras');
            return view('4_page', compact('total', 'order', 'extras'));
        }
        $total = Calculate::init($order)->getTotalPtice();
// dd($total, 'total', $order, 'order');
        return view('4_page', compact('total', 'order'));
    }

    public function get4Extras(Request $request)
    {
        $order = Order::getFromSession();
        if ($request['frequency_last']) {
            $order->updateFrequency($request['frequency_last'], $order);
        }
        if ($request['ajaxExtraSave']) {
            $extras = $order->ajaxSave($request['ajaxExtraSave'], $order);
        } elseif ($request['ajaxExtraDelete']) {
            $extras = $order->ajaxExtraDelete($request['ajaxExtraDelete'], $order);
        } else {
            $extras = $order->saveExtras(
                $request['extras'] ?? 'no_data',
                $order
            );
        }
        $order = Order::getFromSession();
        $total = Calculate::init($order)->getTotalPtice();
        $get_extras = $order->extras()->get();
        if ($request->ajax()) {
            return (
                response()->json([
                    'clicked_btn' => $request['frequency_last'],
                    'extras'=> $get_extras,
                    'total' => $total
                ])
            );
        }
        return view('4_page', compact('total', 'order', 'get_extras'));
    }
}
