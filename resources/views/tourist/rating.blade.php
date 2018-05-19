<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Guide;
use Auth;
use App\Destinations;
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
  <script type= "text/javascript" src = "{{ asset('js/country.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>
  <script src="//code.jquery.com/jquery.min.js"></script>
  <script src="{{ asset('js/emotion-ratings.js')}}"></script>


  <style>
  .rate_widget {
    border:     1px solid #CCC;
    overflow:   visible;
    padding:    10px;
    position:   relative;
    width:      180px;
    height:     32px;
}
  .ratings_stars {
    background: url('star_empty.png') no-repeat;
    float:      left;
    height:     28px;
    padding:    2px;
    width:      32px;
}
.ratings_vote {
    background: url('star_full.png') no-repeat;
}
.ratings_over {
    background: url('star_highlight.png') no-repeat;
}
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
</body>

<?php
$guide_id=array();
?>
@foreach($bookings as $booking)
<?php

$guide_id[]=$booking->guide_id;
?>
@endforeach
<?php 
$unique_guide=array_unique($guide_id);
$i=0;
foreach($unique_guide as $id)
{

  $guides=Guide::where('guide_id',$id)->get();
  
  ?>
  @foreach($guides as $guide)
 <?php 
$Addr=$guide->destination;
$destinations=Destinations::where('Address',$Addr)->get();
foreach($destinations as $destination)
{
  $images=$destination->destination_images;
  foreach($images as $image)
{
    $url=Storage::url($image->image);
}
} 
?>  
<h1>Your Trips</h1>
<div class="card w-100">
<div class="row ">
<div class="col-sm-3">

<img class="card-img-top text-left" src="<?php echo $url;?>" alt="Card image cap">
</div>
  <div class="col-sm-9">
 
    
    <p><h3><?php echo $Addr;?></h3></p>
    
   
  

<h4><i>Rate This Place...</i></h4>
      <div class= "myRating"></div>
      <script>
      var emotionsArray = {
         angry: "&#x1F620;",
         disappointed: "&#x1F61E;",
         meh: "&#x1F610;",
         happy: "&#x1F60A;",
         smile: "&#x1F603;",
         wink: "&#x1F609;",
         laughing: "&#x1F606;",
         inLove: "&#x1F60D;",
         heart: "&#x2764;",
         crying: "&#x1F622;",
         star: "&#x2B50;",

          };
var emotionsArray = ['angry','disappointed','meh', 'happy', 'inLove'];
$(".myRating").emotionsRating({
  emotions: emotionsArray,
});
$(".myRating").emotionsRating({
  // background emoji
  bgEmotion: "happy",
  // emoji array
  emotionsCollection: ['angry','disappointed','meh', 'happy', 'inLove'],
  // number of emoji
  count: 5,
  // color of emoji
  // gold, red, blue, green, black,
  // brown, pink, purple, orange
  color: "red",
  // size of emoji
  emotionSize: 30,
  // input name
  inputName: "rating",
  // callback
  emotionOnUp:"<a href='https://www.jqueryscript.net/time-clock/'>date</a>: null",
  // initialize the rating number
  initialRating: null
});


</script>

</div>
</div>
<?php
$image=$guide->profile_img;

    $url=Storage::url($guide->profile_img);

?>
<div class="row">
<div class="col-sm-3">
<h1>Guide</h1>
<img class="card-img-top text-left" src="<?php echo $url;?>" alt="Card image cap">
</div>
  <div class="col-sm-9">
 
    
  <a href="{{route('viewTrip',$booking->booking_id)}}" class="btn btn-primary">view your trip</a>
    
   <br>
   <br>
  
   
   <h3><?php echo $guide->name;?>
   <h4><i>Rate  your Guide....</i></h4>
      <div class= "myRating"></div>
      <script>
      var emotionsArray = {
         angry: "&#x1F620;",
         disappointed: "&#x1F61E;",
         meh: "&#x1F610;",
         happy: "&#x1F60A;",
         smile: "&#x1F603;",
         wink: "&#x1F609;",
         laughing: "&#x1F606;",
         inLove: "&#x1F60D;",
         heart: "&#x2764;",
         crying: "&#x1F622;",
         star: "&#x2B50;",

          };
var emotionsArray = ['angry','disappointed','meh', 'happy', 'inLove'];
$(".myRating").emotionsRating({
  emotions: emotionsArray,
});
$(".myRating").emotionsRating({
  // background emoji
  bgEmotion: "happy",
  // emoji array
  emotionsCollection: ['angry','disappointed','meh', 'happy', 'inLove'],
  // number of emoji
  count: 5,
  // color of emoji
  // gold, red, blue, green, black,
  // brown, pink, purple, orange
  color: "red",
  // size of emoji
  emotionSize: 30,
  // input name
  inputName: "rating",
  // callback
  emotionOnUp:"<a href='https://www.jqueryscript.net/time-clock/'>date</a>: null",
  // initialize the rating number
  initialRating: null
});


</script>
<?php $i++;?>

</div>
</div>
</div>
  @endforeach
  <?php
  
}
?>
