<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        if (Auth::guard('MasterUser')->check()) {
            return redirect()->route('landing');
        }

        return view('register');
    }

    public function registerPost(Request $request)
    {
        $MasterUser = new MasterUser();
        $Buyer = new Buyer();

        $MasterUser->USERNAME = $request->userName;
        $MasterUser->PASSWORD = Hash::make($request->password);
        $MasterUser->EMAIL = $request->email;
        $MasterUser->USER_LEVEL = 1;
        $MasterUser->save();

        $Buyer->USER_ID = $MasterUser->USER_ID;
        $Buyer->FULLNAME = $request->firstName.' '.$request->lastName;
        $Buyer->PHONE_NUMBER = $request->phone;
        $Buyer->ADDRESS = "Dummy";
        $Buyer->ACCOUNT_CREATION_DATE = date('Y-m-d');
        $Buyer->save();

        return redirect()->route('login');
    }

    public function login()
    {
        if (Auth::guard('MasterUser')->check()) {
            return redirect()->route('landing');
        }
        else{
            return view('login');
        }
    }

    public function loginPost(Request $request)
    {
        // Use the correct guard and pass the correct password field
        if (Auth::guard('MasterUser')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('landing');
        } else {
            return back()->with('fail','Wrong Email or Password');
        }
    }
}
