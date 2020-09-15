<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
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

        $gov = User::where('email',$email)->first();
        if($gov && $gov->role == 'dinas') {
            if(Hash::check($password, $resto->password)) {
                Session::put('name',$gov->name);
                Session::put('email',$gov->email);
                Session::put('id',$gov->id);
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
}
