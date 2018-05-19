<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Destinations;
use App\DestinationPhotos;
use App\Guide;
use App\Http\Requests\imageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class DestinationsController extends Controller
{
    
    public function search($loc)
    {    
        
        return view('destination.search',compact('loc'));
    }
    public function show($path, request $request)
    {   
        if($path=="sightseeing"||$path=="restaurant"||$path=="sport"||$path=="shopping")
        {   
            $country=$request->input('country');
            $state=$request->input('state');
            $city=$request['city'];
            $matchthese=['country'=>$country, 'state'=>$state,'city'=>$city,'category'=>$path];

            $destinations=Destinations::where($matchthese)->get();
            return view('destination.sightseeing',compact('destinations'));
        }

       

        if($path=="hotels")
        {   
            $country=$request->input('country');
            $state=$request->input('state');
            $city=$request['city'];
            $matchthese=['country'=>$country, 'state'=>$state,'city'=>$city,'category'=>"hotel"];

            $destinations=Destinations::where($matchthese)->get();
            return view('destination.hotel',compact('destinations'));
        }

       

    }


    public function describe($id)
    {
        $destination=Destinations::where('id',$id)->first();
        return view('destination.describe', compact('destination'));
    }


    public function suggest()
    {
        return view('destination.suggest');
    }
    
    public function suggest1()
    {
        return view('destination.add');
    }

    public function add()
    {
        $destination=Destinations::create([
    
            'name' => $request['name'],
           
            'Address' => $request['city'],
            'category' => $request['category'],
            'open' => "00:00:00",
            'close' => "00:00:00",
            'description' =>$request['description'],
            'status'=>0,
          ]);
    
          //echo $destination;
          $request1=app('App\Http\Requests\imageRequest');
          foreach ($request1->image as $photo) 
          {
            $filename = $photo->store('public'); 
           
    
    
    
           $photos= DestinationPhotos::create([
                'destination_id' => $destination->id,
                'image' => $filename
            ]);
           // echo $photos;
    
        
           }
    
    
        }
    
     

    public function store(request $request)
    {
      
        

      
      

      
   
      $destination=Destinations::create([
    
        'name' => $request['name'],
       
        'Address' => $request['city'],
        'category' => $request['category'],
        'open' => "00:00:00",
        'close' => "00:00:00",
        'description' => $request['description'],
        'status'=>0,
      ]);

      //echo $destination;
      $request1=app('App\Http\Requests\imageRequest');
      foreach ($request1->image as $photo) 
      {
        $filename = $photo->store('public'); 
       



       $photos= DestinationPhotos::create([
            'destination_id' => $destination->id,
            'image' => $filename
        ]);
       // echo $photos;

    
       }
    return redirect('/guide');

    }

  public function view(request $request)
   {
    
    $address=$request['city'];
    $guides=Guide::where('destination',$address)
                 ->where('status', 1)->get();
    $destinations=Destinations::where('Address',$address)->get();
   
    $id=array();
    foreach($destinations as $destination)
     {
        $id[]=$destination->id;
     }
  // dd($id);
    $i=array_rand($id);
   // dd($i);
    if($i==0)
    {
        $i++;
    }
    $destination_image=DestinationPhotos::where('destination_id',$i)->get();
    //dd($destination_image);            
   // dd($guides);
    return view('Destination.view',compact(['destinations','guides','destination_image']));
   }

   public function view1($id)
   {
       $destinations=Destinations::where('id',$id)->get();
       return view('destination.view1',compact('destinations'));
   }

   public function viewAll($address,$category)
   {
       $destinations=Destinations::where('Address',$address)
                                   ->where('category',$category)->get();
       return view('destination.viewAll',compact('destinations'));
   }
 
}

