<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Guide;
use App\Reviews;
class ReviewsController extends Controller
{
    public function view(request $request)
    {  
        $guide_id=$request['guide_id'];
        
        $guides=Guide::where('guide_id',$guide_id)->get();
        return view('guide.review', compact('guides'));
    }
    protected function store(request $request)
    {
        
        $reviews= Reviews::create([
            'guide_id'=>$request['guide_id'],
            'tourist_id' => Auth::user()->id,
            'review'=>$request['review'],
            //'area' => $request['area'],
           
           // 'country' => $request['country']
           ]);
    }
}
