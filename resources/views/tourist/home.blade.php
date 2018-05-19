<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Destinations;
use Auth;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Tours and Travels</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
  <link rel="stylesheet" href="{{ asset('css/tourist/home.css')}}">
  <style>


</style>
</head>


<body>

<div class="header">

       <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
       <a class="navbar-brand" href="#">Logo</a>
       <ul class="navbar-nav">
       <li class="nav-item">
       @if(!Auth::check())
       <a class="nav-link" href="/login">Login</a>
       </li>
       @endif

       @if(!Auth::check())
       <li class="nav-item">
       <li class="dropdown">
       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Register
       <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/guide/register">Register as Guide</a></li>
          <li><a href="/tourist/register">Register as Tourist</a></li>
        </ul>
       </li>
      @endif

      @if(Auth::check())
      
  
    <li class="nav-item">
      <a class="nav-link" href="/experience/share">View Past Trips</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/logout">Logout</a>
      </li>
    </ul>
    @endif
    @if(Auth::check())
    
    <span class="navbar-text ml-auto">
    Welcome {{ Auth::user()->name}}
  </span>
    
    @endif
    </nav>
<div class="img_container">

<img class="background" src="{{ url('images/background.jpg')}}"></img>


 
<div class="search">
	<form method="POST" action="/guide/destination/view/" enctype="multipart/form-data">
    {{ csrf_field() }}
		<div class="form-group">
            <label><h1> Search Any City</h1></label>
            <input type="text" name="city" placeholder="City" class="form-control" value="{{ old('city') }}" id="city">
        </div>
        <div class="form-group">
            
            <input type="submit" name="submit"  id="submit" class="btn btn-primary">
        </div>
	</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		function initialize() {
		    var options = {
		        types: ['(cities)'],
		       
		    };
		    var input = document.getElementById('city');
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
            document.getElementById("submit").addEventListener("click", function(){
            var place =autocomplete.getPlace();
            var address=place.formatted_address;
    
            });
            
          

		}
		google.maps.event.addDomListener(window, 'load', initialize);
        var place =autocomplete.getPlace();
            var address=place.formatted_address;
            alert(address);
	</script>
</div>
</div>
@php($i=[])
    @php($k=1)
    @php($id=array_unique($id))
    @foreach($id as $id)
    
      @php($i[$k]=$id)
       @php($k++)
    @endforeach
<h1>Popular Destinations For You</h1>
<div class="row">
<?php
for($t=1;$t<$k;$t++)
{
  $l=$i[$t];
  
  $m=1;
  if($m<=3)
  {
  $destinations=Destinations::where('id',$l)->get();
  foreach($destinations as $destination)
  {
    $photos=$destination->destination_images;
    foreach($photos as $photo)
    {
      $url=Storage::url($photo->image);
    }
    //dd($url);
    ?>
    <div class="col-4">
    <a href="{{ route('viewDestination', $destination->id)}}" class="card-block clearfix">
    <div class="card">
    <img class="card-img-top row1" src="<?php echo $url;?>" alt="Card image">
    <div class="card-body">
    <p class="card-text"><?php echo $destination->name;?></p>
  </div>
    </div>
  </div>
   </a>
<?php
  }
  }
  $m++;
}
?>
 </div>
 </div>
</body>
</html>
