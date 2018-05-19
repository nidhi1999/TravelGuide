<?php

namespace App\Http\Controllers;
use Auth;
use App\Guidebooking;

use Illuminate\Http\Request;

class RatingsController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:tourist');
    }
    public function view()
    {
        $tourist_id=Auth::user()->id;
        $date = date('Y-m-d');
        echo $date;
        $bookings=Guidebooking::where('tourist_id',$tourist_id)
                               ->where('ending_date','<', $date)
                                ->get();
        return view('tourist.rating',compact('bookings'));

    }
    protected function store(request $request)
    {
        //dd($request);
        $count=$request->input('count');
        //console.log($count);
    }
}
