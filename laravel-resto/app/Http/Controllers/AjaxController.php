<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Booking;
use App\Feedback;
use App\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    // Sudah berjalan namun belum ada perkembangan
    public function getIncome() {
        $income = Income::where('resto_id', Session::get('id'))->pluck('income');
        $incomeDays = array();

        $incomeDays = array(
            'income' => $income,
            'date' => $this->getIncomeDaysWeek(),
        );

        return $incomeDays;
    }

    // Sudah berjalan namun belum ada perkembangan
    public function getIncomeDaysWeek() {
        $month_array = array();
        $income_days = Income::where('resto_id', Session::get('id'))->pluck('added_on');
        $income_days = json_decode( $income_days );
        $i = 0;
        foreach($income_days as $date) {
            $date_name = Carbon::createFromFormat('Y-m-d', $date)->format('d M Y');
            $month_array[$i] = $date_name;
            $i++;

        }
        return $month_array;
    }

    // Belum dilanjutkan
    public function getRate() {
        $rate = Feedback::where('resto_id', Session::get('id'))->pluck('rate');
        $rateDays = array();

        $rateDays = array(
            'income' => $rate,
            'date' => $this->getRateDaysWeek(),
        );

        return $rateDays;
    }

    // Belum dilanjutkan
    public function getRateDaysWeek() {
        $month_array = array();
        $rate_days = Feedback::where('resto_id', Session::get('id'))->pluck('date');
        $rate_days = json_decode( $rate_days );
        $i = 0;
        foreach($rate_days as $date) {
            $date_name = Carbon::createFromFormat('Y-m-d', $date)->format('d M Y');
            $month_array[$i] = $date_name;
            $i++;

        }
        return $month_array;
    }


}
