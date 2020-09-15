<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Booking;
use App\Feedback;
use App\Income;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $resto = Restaurant::where('email',$email)->first();
        if($resto) {
            if(Hash::check($password, $resto->password)) {
                Session::put('name',$resto->name);
                Session::put('email',$resto->email);
                Session::put('id',$resto->id);
                Session::put('login',TRUE);
                return redirect('/');
            }
            else {
                return redirect('/auth')->with('alert','Password atau Email salah!');
            }
        }else {
            return redirect('/auth')->with('alert','Email belum terdaftar!');
        }
    }

    public function logout() {
        Session::flush();
        return redirect()->back();
    }
}
