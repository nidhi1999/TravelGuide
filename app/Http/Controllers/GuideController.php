<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Guide;
use App\RoleUser;
use App\Guidebooking;
use Carbon\Carbon;
//use App\HASH;
use App\Mail\Congrats;
use App\Mail\booking\approve;

use Illuminate\Support\Facades\Hash;
class GuideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store','sendMail']]);
        $this->middleware('role:guide',['except' => ['create', 'store','sendMail']]);
    }
 
    public function index()
    {
        return view('guide.home');
    }
    protected function create()
    {
       return view('auth.registerguides');

    }
    protected function store(request $request)
    {
      
   
      $this-> Validate(request(), [
      'name' => 'required|string|max:255',
      'experience'=>'required|string',
      'about'=>'required|string',
      'fees'=>'required|string',
      'email' => 'required|string|email|max:255|unique:Logincredentials',
      'password' => 'required|string|min:6|confirmed',
      'contact' =>'required',
     
      'city'=>'required|string',
      //'image'=>'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        
    ]);

   $password=HASH::make($request['password']);

   $user= User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => $password,
        //'psition' =>'Guide',
    ]);

$id=$user->id;
//$path= time().'.'.request()->image->getClientOriginalExtension();
//request()->image->move(public_path('images/guides'), $id.'.jpg');

   //$name = $path->getClientOriginalName();
    //$path->move('/assets/images/',$name);
    $request1=app('App\Http\Requests\imageRequest');
    foreach ($request1->image as $photo) 
    {
      $filename = $photo->store('public/guides'); 
     
    }


    
      
    $guide= Guide::create([
        'guide_id'=>$id,
        'contactno' => $request['contact'],
        //'area' => $request['area'],
       
       // 'country' => $request['country']
        'name'=> $request['name'],
        'experience'=>$request['experience'],
        'fees'=>$request['fees'],
        'about'=>$request['about'],
        'profile_img'=>$filename,
        'destination'=>$request['city'],
        
        
    ]);
    
    RoleUser::create([
    'user_id'=>$guide->guide_id,
    'role_id'=>"1",
    
    ]);
    Auth::attempt(array('email'=>$request['email'],'password'=>$request['password'])); 
    
    if(Auth::check())
    {
    return redirect('/guide');
    }
   }

   public function upcomingTrips()
   {
       $guide_id=Auth::user()->id;
       $date=date('y-m-d');
       $guide=Guidebooking::where('guide_id',$guide_id)
                           ->where('ending_date','>', $date)
                           ->where('status', "0")->get();
       //dd($guide);
      return view('guide.upcomingtrip',compact('guide'));
   }

  public function checkAvailabilty($id)
  {
      $bookings=Guidebooking::where('guide_id',$id)->get();
      return view('guide.availability',compact('bookings'));
  }

  public function update(request $request)
  {   
      $booking_id=$request->input('bookingId');
      $check=$request->input('check');
      $booking=Guidebooking::where('booking_id',$booking_id)->update(['status'=>$check]);
      $bookings=Guidebooking::where('booking_id',$booking_id)->get();
      foreach($bookings as $booking)
      {
      $tourist_id=$booking->tourist_id;
      }
      if($check==1)
      {
       
        $tourist=User::find($tourist_id);
        \Mail::to($tourist)->send(new approve);
       
      }
      else{
       $tourist=User::find($tourist_id);
        \Mail::to($tourist)->send(new cancel);
       
      }

  }
  public function pastTrips()
  {
    $guide_id=Auth::user()->id;
    $date=date('y-m-d');
    //dd($date);
    $guide=Guidebooking::where('guide_id',$guide_id)
                          ->where('ending_date','<', $date)
                          ->where('status', "1")->get();
                      
   // dd($guide);
   return view('guide.upcomingtrip',compact('guide'));
  }
}
   
