<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'userName' => 'required|unique:MASTER_USER,USERNAME|max:255',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email:rfc,dns|unique:MASTER_USER,EMAIL',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

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
            $buyer = $user->Buyer;
            $artist = $user->Artist;

            // Determine the role
            $role;
            if ($user->USER_LEVEL == 1) $role = 'BUYER';
            if ($user->USER_LEVEL == 2) $role = 'ARTIST';

            // Store roles and related data in the session
            session([
                'ROLE' => $role,
                'BUYER_DATA' => $buyer,
                'ARTIST_SATA' => $artist,
            ]);

            if($user->USER_LEVEL == 3) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('landing');
            }
        } else {
            return redirect()->back()->withErrors([
                'authorization' => 'Account not authorized!'
            ]);
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
