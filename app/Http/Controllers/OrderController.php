<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUser;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $user = null;

        if (Auth::user() != null)
        {
            $user = Auth::User();
        }

        // $order = Order::where('USER_ID',$user->USER_ID)->latest('created_at')->first();
        $carts = $user->Carts;
        $activeAddress = Address::where('USER_ID',$user->USER_ID)->where('IS_ACTIVE',1)->first();

        return view('layouts.checkout', compact('carts','activeAddress'));
    }

    public function checkout()
    {
        $user = null;

        if (Auth::user() != null)
        {
            $user = Auth::User();
        }

        // dd($user->Carts->first());
        $activeAddress = Address::where('USER_ID',$user->USER_ID)->where('IS_ACTIVE',1)->first();

        if($activeAddress == null) {
            return redirect()->back()->withErrors(['message'=>'no active address']);
        }

        $carts = $user->Carts;
        $order = Order::where('USER_ID', $user->USER_ID)->orderBy('created_at', 'DESC')->first();

        if($order == null) {
            $order = $user->Orders()->create([
                'FULLNAME' => $activeAddress->FULLNAME,
                'PHONE' => $activeAddress->PHONE,
                'ADDRESS' => $activeAddress->ADDRESS,
                'PROVINCE' => $activeAddress->PROVINCE,
                'CITY' => $activeAddress->CITY,
                'POSTAL_CODE' => $activeAddress->POSTAL_CODE,
                'STATUS' => 2
            ]);
        } else {
            if ($order->STATUS != 1) {
                $order = $user->Orders()->create([
                    'FULLNAME' => $activeAddress->FULLNAME,
                    'PHONE' => $activeAddress->PHONE,
                    'ADDRESS' => $activeAddress->ADDRESS,
                    'PROVINCE' => $activeAddress->PROVINCE,
                    'CITY' => $activeAddress->CITY,
                    'POSTAL_CODE' => $activeAddress->POSTAL_CODE,
                ]);
            }
        }

        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $order->OrderItems()->create([
                    'ART_ID' => $cart->ART_ID,
                    'QUANTITY' => $cart->QUANTITY,
                    'PRICE_PER_ITEM' => $cart->Art->PRICE,
                ]);

                $cart->delete();
            }
        }

        return redirect()->route('order.summary',['id'=>$order->id]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $order = Order::find($id);

        if($order == null) {
            return redirect()->route('landing')->withErrors(['message'=>'Order not found']);
        }

        if($order->USER_ID != $user->USER_ID) {
            return redirect()->route('landing')->withErrors(['message'=>'Order not belonge to you']);
        }

        return view('layouts.order-summary', compact('order'));
    }

    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('USER_ID',$user->USER_ID)->orderBy('created_at','DESC')->get();

        return view('profile.order-history', compact('user','orders'));
    }
}