<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\Booking;

class UserController extends Controller
{
	// Belum ada perkembangan
    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

	}
	
	// Sudah berjalan dan belum ada perkembangan
	public function book(Request $request, $id) {
		$user = Auth::user();
		$booking = Booking::updateOrCreate(
            [
                'traveler_id' => $user->id,
                'resto_id' => $id,
                'amount' => 0,
            ]
		);
		
		return redirect()->back();
	}

}
