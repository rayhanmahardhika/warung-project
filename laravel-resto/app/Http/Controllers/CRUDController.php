<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use App\Booking;
use App\Feedback;
use App\Income;
use App\Announcement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{

    // Belum dicek dan belum ada perkembangan
    public function inputIncome(Request $req) {
        // $avg1 = Income::where('resto_id', Session::get('id'))->avg('income');
        $alert = Income::where('resto_id', Session::get('id'))->where('added_on', Carbon::now()->toDateString())->first();
        if($alert) {
            return redirect('/')->with([
                'alertH' => 'Gagal Menambah Data!'
            ]);
        }
        $pemasukan = Income::updateOrCreate([
            'resto_id' => Session::get('id'),
            'added_on' => Carbon::now()->toDateString(),
            'income' => $req->income,
            'transactions' => $req->trans,
        ]);


        // $avg2 = Income::where('resto_id', Session::get('id'))->avg('income');
        // dd($avg2);
        
        // if($avg1 > $avg2) {
        //     $alert = Announcement::where('belong', 3)->first();
        // }

        return redirect()->back();
    }

    public function accBooks($traveler_id) {
        Booking::where('traveler_id', $traveler_id)->where('resto_id', Session::get('id'))
            ->update(['status' => 3]);
        return redirect()->back();
    }

    public function deniBooks($traveler_id) {
        Booking::where('traveler_id', $traveler_id)->where('resto_id', Session::get('id'))
            ->update(['status' => 4]);
        return redirect()->back();
    }
}
