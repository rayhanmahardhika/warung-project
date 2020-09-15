<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

use Carbon\Carbon;
use App\Booking;
use App\Photo;
use App\Feedback;
use Auth;
use Image;
use Illuminate\Support\Facades\Response;




class AjaxController extends Controller
{
    public function __construct()
    {
        // $this->middleware(function ($request, $next) { Talk::setAuthUserId(Auth::user()->id); return $next($request); });
    }

    // Ngebug
    public function search(Request $request)
    {
        if($request->get('query'))
        {
         $query = $request->get('query');
         $data = Restaurant::where('name', 'LIKE', "%{$query}%")->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
         foreach($data as $row)
         {
          $output .= '
          <li><a href="#">'.$row->name.'</a></li>
          ';
         }
         $output .= '</ul>';
         echo $output;
        }
            
    }
    
    // Kurang valisadi code resto
    public function feedback(Request $request) {
        $user = Auth::user();
        
        $feedback = new Feedback;
        $feedback->traveler_id = $user->id;
        $feedback->resto_id = $request->input('id_resto');
        $feedback->date = Carbon::now()->toDateString();
        $feedback->feedback = $request->input('feed_field');
        $feedback->rate = $request->input('options');
        $feedback->save();

        $jumlahfeed = Feedback::where('resto_id', $request->input('id_resto'))->get()->count();

        $restauran = Restaurant::where('id', $request->input('id_resto'))->first();
        $restauran->rate = ($restauran->rate * ($jumlahfeed-1) + $request->input('options'))/$jumlahfeed;
        $restauran->save();

        return redirect()->back();
    }

    // public function fetchFeedback($id) {
    //     if($request->get('query'))
    //     {
    //      $query = $request->get('query');
    //      $data = Restaurant::where('name', 'LIKE', "%{$query}%")->get();
    //      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //      foreach($data as $row)
    //      {
    //       $output .= '
    //       <li><a href="#">'.$row->name.'</a></li>
    //       ';
    //      }
    //      $output .= '</ul>';
    //      echo $output;
    //     }
    // }

    // public function fetchBookings(Request $request) {
    //     $user = Auth::user();

    //     if($request->ajax()) {
    //         $data = Booking::where('traveler_id', $user->id)->get();
    //         $data_resto = $data->restaurant;
    //     }

    //     echo json_encode($data, $data_resto);
    // }

    // Dirasa cukup baik
    public function addBooking(Request $request) {
        $datetime = $request->date.' '.$request->time.':00';
        $resto = Restaurant::where('id', $request->id_rest)->first();
        $service = explode("/", $resto->timeservice);
        $rbuka = strtotime($service[0]);
        $rtutup = strtotime($service[1]);
        $booktime = strtotime($request->time);


        $alertBuka = null;
        if($booktime >= $rbuka && $booktime <= $rtutup) {
            Booking::where('traveler_id', Auth::user()->id)->where('resto_id', $request->id_rest)
            ->update(['date' => $datetime, 'amount' => $request->amount, 'status' => 2]);
        }else{
            $alertBuka = 'Restoran TUTUP pada waktu tersebut';
        }

        return redirect()->back()->with('alertBuka', $alertBuka);
    }

    // Done
    public function deleteBooking($id) {
        Booking::where('traveler_id', Auth::user()->id)->where('resto_id', $id)->delete();  
        return redirect()->back();
    }

    // Done
    public function loadMoreData(Request $request) {
        if($request->ajax()) {

                    if($request->id > 0) {
                        $data = Restaurant::where('id', '<', $request->id)
                        ->orderBy('id', 'DESC')
                        ->limit(4)->get();
                    }else {
                        $data = Restaurant::orderBy('id', 'DESC')
                        ->limit(4)->get();
                    }
                    
                    $output = '';
                    $last_id = '';
                    
                    if(!$data->isEmpty()) {
                        $output .='
                        <div class="row">
                        ';
                        foreach($data as $row) {
                            $output .= '    
                            <div class="col-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row->name.'</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                        <a href="/restoran/'.$row->id.'" class="btn btn-primary">Kunjungi</a>
                                    </div>
                                </div>
                            </div> 
                            ';
                            $last_id = $row->id;
                        }
                        
                        $output .= '
                        
                        </div>
                        <div class="row m-3">
                            <div class="col text-center">
                                <a id="load_more_button" data-id="'.$last_id.'" type="button"> Tampilkan lebih </a>
                            </div>
                        </div>
                        ';
                        
                    }else {
                        $output .= '
                        
                        </div>
                        <div class="row m-3">
                            <div class="col text-center">
                                <a id="load_more_button" type="button"> Tidak terdapat data </a>
                            </div>
                        </div>
                        ';
                    }
                    
                    echo $output;
            
        }

    }

    // Sorting time masih bug
    public function filterData(Request $request) {
        if($request->ajax()) {
            $data = Restaurant::orderBy('id', 'DESC')->get();
                    $dataReal = array();
                    $dataPush = array();
                    $Tpagi = strtotime('06:00');
                    $Tsiang = strtotime('12:00');
                    $Tsore = strtotime('18:00');
                    $Tmalam = strtotime('23:00');

                    if($request->time == 1) {
                        if($request->price != "" || $request->price != null) {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                
                                if($d->pricerate == $request->price && (strtotime($time[0]) > $Tpagi || strtotime($time[1]) < $Tsiang) ) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }

                        }
                        else {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                if(strtotime($time[0]) > $Tpagi || strtotime($time[1]) < $Tsiang) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }

                        }

                    }else if($request->time == 2) {
                        if($request->price != "" || $request->price != null) {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                if($d->pricerate == $request->price && (strtotime($time[0]) > $Tsiang || strtotime($time[1]) < $Tsore) ) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }
                        }
                        else {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                if(strtotime($time[0]) > $Tsiang || strtotime($time[1]) < $Tsore) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }
                        }
                    }else if($request->time == 3) {
                        if($request->price != "" || $request->price != null) {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                if($d->pricerate == $request->price && (strtotime($time[0]) > $Tsore || strtotime($time[1]) < $Tmalam) ) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }
                        }
                        else {
                            foreach($data as $d) {
                                $time = $d->timeservice;
                                $time = explode("/", $time);
                                if(strtotime($time[0]) > $Tsore || strtotime($time[1]) < $Tmalam) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                                $time = null;
                            }
                        }
                    }else{
                        if($request->price != "" || $request->price != null) {
                            foreach($data as $d) {
                                if($d->pricerate == $request->price) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                                }
                            }
                        }else {
                            foreach($data as $d) {
                                    $dataPush = array(
                                        'id' => $d->id,
                                        'name' => $d->name,
                                    );
                                    array_push( $dataReal, $dataPush);
                            }
                        }
                    }    
                    
                    
                    $output = '';
                    
                    if($dataReal) {
                        $output .='
                        <div class="row">
                        ';
                        foreach($dataReal as $row) {
                            $output .= '    
                            <div class="col-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['name'].'</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                        <a href="/restoran/'.$row['id'].'" class="btn btn-primary">Kunjungi</a>
                                    </div>
                                </div>
                            </div> 
                            ';
                        }

                        echo $output;

                        
                    }
        }
    }

    // NGEBUG
    public function fetch_image($resto_id)
    {
     $photo = Photo::where('status', 1)->where('resto_id', $resto_id)->get();

     $filephoto = Image::make($photo->picture);

     $response = Response::make($filephoto->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }
}
