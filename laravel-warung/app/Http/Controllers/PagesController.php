<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Restaurant;
use App\Feedback;
use App\Booking;
use App\Photo;


class PagesController extends Controller
{   
    // Belum ada perkembangan
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

    // Belum ada perkemangan namun sudah dapat berjalan
    public function restoran($id) {
        // Get Data Resto Raw
        $restoran = Restaurant::where('id',$id)->first();

        $feedbacks = [];
        $jumlahfeed = 0;

        // Get data feedback mentah
        if(Feedback::where('resto_id', $id)->first() == null) {
            $feedbacks = [];
        }else {
            $feedbacks = Feedback::where('resto_id', $id)->get();
        }

        // Get data jumlah feedback
        if(Feedback::where('resto_id', $id)->first() == null) {
            $jumlahfeed = 0;
        }else {
            $jumlahfeed = Feedback::where('resto_id', $id)->get()->count();
        }

        // Memforeach data feedback menjadi satu array asosiasi yang lengkap
        $feedbacksData = array();
        foreach($feedbacks as $feed) {
            // Get rate to string
            $rateStr = null;
            if($feed->rate == 1) {
                $rate = 'Wisatawan Sedih';
            }else if($feed->rate == 2) {
                $rate = 'Wisatawan Kecewa';
            }else if($feed->rate == 3) {
                $rate = 'Wisatawan Biasa Saja';
            }else if($feed->rate == 4) {
                $rate = 'Wisatawan Senang';
            }else if($feed->rate == 5) {    
                $rate = 'Wisatawan Puas';
            } 

            // Memasukan data
            $datapush = array(
                'id' => $feed->id,
                'name' => $feed->traveler->name,
                'avatar' => $feed->traveler->avatar,
                'feel' => $rateStr,
                'feed' => $feed->feedback,
                'date' => Carbon::createFromFormat('Y-m-d', $feed->date)->format('d M Y'),
            );

            // Push data ke data utama
            array_push($feedbacksData, $datapush);
        }


        // Alert untuk mengetahui booking dan apakah user sudah daftar
        $alertbook = null;
        if(Auth::user()) {
            $user = Auth::user();
            $bookcheck = Booking::where('resto_id',$id)->where('traveler_id', $user->id)->first();
            if($bookcheck != null) {
                $alertbook = 'Anda sudah melakukan reservasi terhadap resto ini';
            }
        }else {
            $alertbook = 'Anda harus masuk agar dapat melakukan reservasi!';
        }


        // Data Resto 
            // Get Pricing
            $pricing = null;
            if($restoran->pricerate == 1) {
                $pricing = "Murah";
            }else if($restoran->pricerate == 2) {
                $pricing = "Terjangkau";
            }else if($restoran->pricerate == 3) {
                $pricing = "Standar";
            }else if($restoran->pricerate == 4) {
                $pricing = "Mahal";
            }

        $restoData = array(); //data untuk return
        $time = explode("/", $restoran->timeservice); //pembagian waktu
        $waktubuka = $time[0]; //hasil waktu buka
        $waktututup = $time[1]; //hasil waktu tutup
        
        // inisialisasi ini data untuk return
        $restoData = array(
            'id' => $restoran->id,
            'name' => $restoran->name,
            'deskripsi' => $restoran->description,
            'rating' => $restoran->rate,
            'jumlahrate' => $jumlahfeed,
            'alamat' => $restoran->address,
            'open' => $waktubuka,
            'close' => $waktututup,
            'code' => $restoran->code,
            'price' => $pricing,
        );
        

        // Return All usable data
        return view('restoran')->with('restoran', $restoData)->with('feedbacks', $feedbacksData)
        ->with('alertBook', $alertbook);
    }

    // Data yang keluar sudah bagus, namun masih kurang terasa experience nya (optional: ditambah waktuan ketika menunggu konfirm dan sesudah jatuh waktu tempo otomatis booking terhapus)
    public function booking() {
        $user = Auth::user();
        $bookings = Booking::where('traveler_id', $user->id)->get();

        // Memasak booking
        $bookingFix = array();
        foreach($bookings as $b){
            // Menentukan status
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

            // Get coordinate
            $resto = Restaurant::where('id', $b->resto_id)->first();
            $coor = explode("/", $resto->XYcoor); 
            $xcoor = $coor[0];
            $ycoor = $coor[1];

            $datapush = array(
                'resto_id' => $b->resto_id,
                'resto_name' => $b->restaurant->name,
                'Tanggal' => $tanggal,
                'jumlah' => $jumlah,
                'status' => $statusStr,
                'statusInt' => $b->status,
                'xcoor' => $xcoor,
                'ycoor' => $ycoor,
            );
            array_push($bookingFix, $datapush);
        }
        // dd($bookings[0]->restaurant->name);

        return view('book')->with('bookings', $bookingFix);
    }
}
