<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
//use Carbon\Carbon;
use App\User;
use App\Tourists;
use App\Guide;
use App\Guidebooking;
use App\Mail\Congrats;
use App\experience;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable ;
use App\RoleUser;
use App\destinationRatngs;
use App\Destinations;
class TouristsController extends Controller
{    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
        $this->middleware('role:tourist',['except' => ['create', 'store']]);

    }
    public function index()
    {   
        $count=destinationRatngs::count();
        $destinations=Destinations::all();
        $count2=Destinations::count();
        foreach($destinations as $destination)
        {
            $count1=$destination->id;
        }
        if($count2<=3)
        {
            $ratings=destinationRatngs::get();
            foreach($ratings as $rating)
            {
                $category=$ratings->destinations->category;
                if($category=="sightseeing")
                {
                $id[]=$rating->destination_id;
                }
            

            }
            $id=array_unique($id);
            
            return view('tourist.home',compact('id'));
        }
        else{
          
        $sum=[];
        for($i=1;$i<=$count1;$i++)
        {  $sum[$i]=0;
          $ratings=destinationRatngs::where('destination_id',$i)->get();
          //dd($ratings);
          
          if(empty($ratings))
          {
              $sum[$i]=0;
              
          } 
          else{
              foreach($ratings as $rating)
              {
                  $category=$rating->destinations->category;
                  if($category!="sightseeing")
                  {
                      $sum[$i]=-1;
                  }
                  else{
                  $sum[$i]=$sum[$i]+$rating->ratings;
                  }
              }
              
          }
        }
        
        $id=[];
        
        for($k=1;$k<=3;$k++)
        {
            $i=1;
            $max=$sum[$i];
            $pos=$i;
            
            for($j=$i+1;$j<=$count1;$j++)
            {
                if($sum[$j]>=$max)
                {
                    $max=$sum[$j];
                    $pos=$j;
                }
              
              

            }
            $sum[$pos]=0;
            $id[]=$pos;
            
           
            
        }
      
    }
    //dd($id);
     return view('tourist.home',compact('id'));
    }
    protected function create()
    {
        return view('auth.registertourists');
    }
    protected function searchGuide()
    {
        return view ('tourist.searchGuide');
    }

    protected function selectGuide(request $request)
    {  
        $country=$request->input('country');
        $state=$request->input('state');
        $city=$request['city'];
        $start_time=$request['start_time'];
        $start_date=$request['start_date'];
        $end_date=$request['end_date'];
        $end_time=$request['end_time'];
        $matchthese=['country'=>$country, 'state'=>$state,'city'=>$city];
        $guides=Guide::where($matchthese)->get();
                        
       
        foreach($guides as $guide )
        {
        $id=$guide->guide_id;
        $bookings=Guidebooking::where('guide_id',$id)->get();
        $guides1=DB::table('guides')
                     ->join('guidebookings','guides.guide_id','!=','guidebookings.guide_id')
                     ->get();
        foreach($guides1 as $guidess)
        {
            echo $guidess->guide_id;
        }
        if($bookings!=NULL)
        {
        
        $bookings1=Guidebooking::where([ ['guide_id','=',$id], ['start_date','<', $start_date],
                               ['ending_date','<',$start_date]])
                               ->orwhere([ ['guide_id','=',$id],
                               ['ending_date','<', $start_date]])
                               ->orwhere([['guide_id','=',$id],
                               ['start_date','=','ending_date'],
                              ['starting_time','>', $start_time],
                               ['ending_time','<',$start_time]])
                               ->get();
      
                               
        //return view ('tourist.selectGuide',compact('bookings1'),compact('guides1'));
        
       
          
        }
        }

    }

    protected function bookGuide($id,$id1)
    {
        $guide_id=$id;
        $dest_id=$id1;
        return view('tourist.bookGuide',compact(['guide_id','dest_id']));
    }

    protected function booking(request $request)
    {
        $startdate=$request['startdate'];
        $enddate=$request['enddate'];
        $guide_id=$request['guide_id'];
        $destination_id=$request['dest_id'];
        
     
       //dd($destination);
     
        $bookings=Guidebooking::where('guide_id',$guide_id)->get();
        $i=0;
        echo "hello";
        ?>
        <script>window.alert("hi");</script>
        <?php
        
        if($bookings->isempty())
        {
            $i++;
        }
        foreach($bookings as $booking)
        {   
            
            if($startdate<$booking->start_date&&$enddate<$booking->ending_date)
            {
                $i++;
            }
            if($startdate>$booking->ending_date)
            {
                $i++;
            }
              
           
       
          
        }
    
    
    
        if($i==0)
        {     
            return redirect()->back()->withErrors(['sorry ...guide is booked..Try for some other day...']);
           
        }
        else
        {   
            
            $booking=Guidebooking::create([
                'tourist_id'=>Auth::user()->id,
                'guide_id' => $request['guide_id'],
                'destination_id'=>$destination_id,
                'start_date' => $request['start_date'],
                'ending_date' => $request['end_date'],
                'status'=> "0",
               
               
            ]);
                $guide_id=$booking->guide_id;
                $guide=User::find($guide_id);
                \Mail::to($guide)->send(new Congrats);
                return redirect('/tourist');
          
        }
    
        
        
    
}
    

     protected function store(request $request)
    {   
         $country=$request->input('country');
         $state=$request->input('state');
         $this-> Validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Logincredentials',
            'password' => 'required|string|min:6|confirmed',
            'contact' =>'required',
            'area' =>'required|string',
            'city'=>'required|string',
            
            
        ]);

       $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            //'position' =>"Tourist",
        ]);

        $id=$user->id;

       $tourist= Tourists::create([
            'tourist_id'=>$id,
            'contactno' => $request['contact'],
            'area' => $request['area'],
            'city' => $request['city'],
            'country' => $country,
            'state'=> $state,
           
        ]);
       // $user=new User;
    

    RoleUser::create([
    'user_id'=>$tourist->tourist_id,
    'role_id'=>"2",
    
    ]);
    Auth::attempt(array('email'=>$request['email'],'password'=>$request['password']));
    
    if(Auth::check()){
    return redirect('/tourist');

    }
   }
        
   public function view($id,$addr)
   {
       $addr=$addr;
       $guides=Guide::where('guide_id',$id)->get();
       return  view('view.guide',compact(['guides','addr']));
   }  
   
   protected function checkAvailability($id)
   {
       $bookings=Guidebooking::where('guide_id',$id)->get();
       return view('guide.availability',compact('bookings'));
   }
   
   public function check(request $request)
   {
    $startdate=$request->input('startdate');
    $enddate=$request->input('enddate');
    $guide_id=$request->input('guide_id');
   
 
    $bookings=Guidebooking::where('guide_id',$guide_id)->get();
    $i=0;
    echo "hello";
    console.log($bookings);
    ?>
    <script>window.alert("hi");</script>
    <?php
    if(!empty($bookings))
    {
    foreach($bookings as $booking)
    {   
        
        
        if($startdate<$booking->start_date&&$enddate<$booking->ending_date)
        {
            $i++;
        }
        if($startdate>$booking->ending_date)
        {
            $i++;
        }
        if($startdate==$booking->start_date&&$enddate==$booking->ending_date)
        {
            $i++;
        }
        
      
    }
}
else{
    $i=1;
}


    if($i==0)
    {   
        echo json_encode("busy");
    }
    else
    {
        echo json_encode("not_busy");
    }
    exit();
   }


   public function share()
   {
       $tourist_id=Auth::user()->id;
       $date=date('Y-m-d');
       $bookings=Guidebooking::where('tourist_id',$tourist_id)
                               ->where('ending_date','<',$date)->get();

       return view('tourist.rating', compact('bookings'));
   }

   public function storeExp(request $request)
   {
       
       $booking_id=$request['booking_id'];
       experience::create([
           'booking_id'=>$booking_id,

           'experience'=>$request['experience'],
       ]);
       return redirect()->back();
   }
   public function viewtrip($id)
   {
       $booking_id=$id;
       $bookings=Guidebooking::where('booking_id',$id)->get();
       return view('tourist.viewTrip',compact('bookings'));
   } 
}
