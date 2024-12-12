<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterUser;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function show()
    {
        $user = null;

        if (Auth::user() != null)
        {
            $user = Auth::User();
        }

        $orders = $user->Orders;

        return view('layouts.checkout', compact('orders'));
    }

    public function placeOrder()
    {
        $user = null;

        if (Auth::user() != null)
        {
            $user = Auth::User();
        }

        // dd($user->Carts->first());

        $carts = $user->Carts;

        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $user->Orders()->create([
                    'ART_ID' => $cart->ART_ID,
                    'QUANTITY' => $cart->QUANTITY,
                    'PRICE_PER_ITEM' => $cart->Art->PRICE,
                ]);

                $cart->delete();
            }
        }

        return redirect()->route('order.my');
    }
    
}
