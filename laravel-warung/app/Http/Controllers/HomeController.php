<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Tag;
use Carbon\Carbon;
use App\Booking;
use App\Feedback;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Lumayan cuman belum ada perkembangan
    public function index()
    {

        $restaurants = Restaurant::orderBy('rate', 'DESC')->get();
        $dataReal = array();
        foreach($restaurants as $r) {
            $now = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
            $open = Carbon::createFromFormat('Y-m-d', $r->opendate);
            $hari = $now->diffInDays($open);
            if($hari > 30 && $hari < 365) {
                $hasil = floor($hari/7)." Weeks";
            }else if($hari > 365 && $hari < 1095) {
                $hasil = floor($hari/30)." Months"; 
            }else if($hari > 1095) {
                $hasil = floor($hari/365)." Years"; 
            }

            if($hari < 90) {
                $dataPush = array(
                    'id' => $r->id,
                    'name' => $r->name,
                    'deskripsi' => $r->description,
                    'usia' => $hasil,
                    'days' => $hari,
                );
                array_push( $dataReal, $dataPush);
            }
        }
        $sortday = array_column($dataReal, 'days');
        array_multisort($sortday, SORT_ASC, $dataReal);

        if($dataReal == null) {

            foreach($restaurants as $r) {
                $now = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
                $open = Carbon::createFromFormat('Y-m-d', $r->opendate);
                $hari = $now->diffInDays($open);
                if($hari > 30 && $hari < 365) {
                    $hasil = floor($hari/7)." Weeks";
                }else if($hari > 365 && $hari < 1095) {
                    $hasil = floor($hari/30)." Months"; 
                }else if($hari > 1095) {
                    $hasil = floor($hari/365)." Years"; 
                }

                $dataPush = array(
                    'id' => $r->id,
                    'name' => $r->name,
                    'deskripsi' => $r->description,
                    'usia' => $hasil,
                    'days' => $hari,
                );
                array_push( $dataReal, $dataPush);
            }
            $sortday = array_column($dataReal, 'days');
            array_multisort($sortday, SORT_ASC, $dataReal);

            $dataFix = array();
            if(count($dataReal) > 5) {
                for($i=0;$i<5;$i++) {
                    array_push( $dataFix, $dataReal[$i]);
                }
                $dataReal = array();
                for($i=0;$i<5;$i++) {
                    array_push( $dataReal, $dataFix[$i]);
                }
            }else {
                for($i=0;$i<count($dataReal);$i++) {
                    array_push( $dataFix, $dataReal[$i]);
                }
                $dataReal = array();
                for($i=0;$i<count($dataFix);$i++) {
                    array_push( $dataReal, $dataFix[$i]);
                }
            }
        }

        return view('home')->with([
            'restoRekomen' => $dataReal,
        ]);
    }

    // public function ajaxResponse(Request $request){
    //     if ($request->ajax()) {
            
    //         $products = Product::query();
    //         if ($cat_id != null) {
    //             $products->whereHas("categories", function ($query) use ($cat_id) {
    //                 $query->whereIn('category_id', explode(',', $cat_id));
    //             })->get();
    //         }
    //         if ($mat_id != null) {
    //              $products->whereHas("productMaterial", function ($query) use ($mat_id) {
    //                 $query->whereIn('product_material_id', explode(',', $mat_id));
    //             })->get();
    //         }
    //         if ($met_id != null) {
    //             $products->whereHas("productionMethod", function ($query) use ($met_id) {
    //                 $query->whereIn('production_method_id', explode(',', $met_id));
    //             })->get();
    //         }

    //     }
    //     return response()->json(['restaurants' => $restaurants]);
    // }

    // public function loadData(Request $request)
    // {
    //     if ($request->has('q')) {
    //         $cari = $request->q;
    //         $data = DB::table('users')->select('id', 'email')->where('email', 'LIKE', '%$cari%')->get();
    //         return response()->json($data);
    //     }
    // }
}
