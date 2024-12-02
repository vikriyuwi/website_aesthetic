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
        $credentials = $request->only('email', 'password');

        if (Auth::guard('MasterUser')->attempt($credentials)) {
            $user = Auth::guard('MasterUser')->user();

            // Load related models
            $buyer = $user->Buyers()->first();
            $artist = $user->Artist()->first();

            // Determine the role
            $role;
            if ($buyer) $role = 'BUYER';
            if ($artist) $role = 'ARTIST';

            // Store roles and related data in the session
            session([
                'ROLE' => $role,
                'BUYER_DATA' => $buyer,
                'ARTIST_SATA' => $artist,
            ]);

            return redirect()->route('landing');
        } else {
            return back()->with('fail','Wrong Email or Password');
        }
    }

    public function logout()
    {
        if (Auth::guard('MasterUser')->check()) {
            Auth::guard('MasterUser')->logout();
        }

        if (Auth::guard('BuyerUser')->check()) {
            Auth::guard('BuyerUser')->logout();
        }
        
        if (Auth::guard('ArtistUser')->check()) {
            Auth::guard('ArtistUser')->logout();
        }
        
        return redirect()->route('landing');
    }
}
