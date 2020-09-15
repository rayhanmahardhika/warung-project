<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Booking;
use App\Feedback;
use App\Income;
use Carbon\Carbon;
use App\User;
use App\Announcement;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    // Kurang booking
    public function dashboard() {
            $alertIncome = null;

            // data raw resto
            $restaurant = Restaurant::where('id', Session::get('id'))->first();
            // Data raw booking
            $booking = Booking::where('resto_id', Session::get('id'))->whereIn('status', [2, 3, 4])->get();
            // $announce = Announcement::where()

            // Memasak data booking
            $bookingfix = array();
            foreach($booking as $b) {
                // Cek status dari nomer ke string
                $statusStr = null;
                $tanggal = null;
                $jumlah = null;
                if($b->status == 1) {
                    $statusStr = 'Belum Reservasi';
                    $tanggal = 'Belum ditetapkan';
                    $jumlah = 'Belum ditetapkan';
                }else if($b->status == 2) {
                    $statusStr = 'Menunggu Konfirmasi';
                    $tanggal = $b->date;
                    $jumlah = $b->amount;
                }else if($b->status == 3) {
                    $statusStr = 'Reservasi Berhasil';
                    $tanggal = $b->date;
                    $jumlah = $b->amount;
                }else if($b->status == 4) {
                    $statusStr = 'Reservasi Gagal';
                    $tanggal = 'Gagal Reservasi';
                    $jumlah = 'Gagal Reservasi';
                }

                // Get nama wisatawan
                $traveler = User::where('id', $b->traveler_id)->first();
                $dataPush = array(
                    'traveler_id' => $b->traveler_id,
                    'traveler_name' => $traveler->name,
                    'Tanggal' => $tanggal,
                    'jumlah' => $jumlah,
                    'status' => $statusStr,
                    'statusInt' => $b->status,
                );
                array_push($bookingfix, $dataPush);
            }

            // Memberikan alert pada pemasukan income
            $alert = Income::where('resto_id', Session::get('id'))->where('added_on', Carbon::now()->toDateString())->first();
            
            // masukan alert
            if($alert) {
                $alertIncome = 'Anda telah memasukan data pemasukan hari ini';
            }


            // Return data yang utama
            return view('dashboardresto')->with([
                'restaurant' => $restaurant,
                'dateNow'    => Carbon::now()->toDateString(),
                'alertIncome' => $alertIncome,
                'bookings' => $bookingfix,
                // 'pengumuman' => $pengumuman    
            ]);
    }

    public function loginView() {
        return view('auth.login');
    }
}
