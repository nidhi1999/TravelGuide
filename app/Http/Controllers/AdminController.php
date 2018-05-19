<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use App\Tourists;
use App\Destinations;
class AdminController extends Controller
{  
   
    public function index()
    {
        return view('admin.home');
    }
   


    


    public function removeGuide()
    {
        $guides=Guide::where('status','<>','2')
                       ->where('status','<>','1')->get();
        return view('remove.guide',compact('guides'));
    }

    public function removeTourist()
    {
        $tourists=Tourists::where('status','<>','2')->get();
        return view('remove.tourist',compact('tourists'));
    }
    
    public function dashboard(){
        return view('admin.home');
    }    


    public function suggestions()
    {   
        $destinations=Destinations::where('status',0)->get();
        return view('destination.suggestions',compact('destinations'));
    }

}
