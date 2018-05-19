<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Http\Request;
use App\Guide;
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
  <style>
  

<style>

*{
  box-sizing:border-box;
}

/*.navbar{
     
      width:100%;
      z-index:-10;
      max-width:100%;
      padding:1%;

}*/






.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
  
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
img
{
  height:75vh;
}
.img_container {
  height:100vh;
  width:100%;
}
.background {
  height:100vh;
  width:100vw;
}
.table-responsive
{
  
  margin-top:80px;
  padding: 15px;

}
h1 
{
  text-align:center;
}
.available 
{
  margin:auto;
  border: 3px solid green;

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



@foreach($guides as $guide)

<?php $url = Storage::url($guide->profile_img); //acquire URL
//echo $url;
?>
<div class="img_container">

<img class="background" src="<?php echo $url;?>"></img>
</div>
</div>

<div class="row">
<div class="about col-4">
<h1>About</h1>
<br>

<p>{{$guide->about}}</p>

</div>
<div class="table-responsive col-4">

<table class="table">
<tbody>
<tr>
<td><b>Name:</b></td>
<td>{{$guide->users->name}}</td>
</tr>
<tr>
<td><b>Contact no:</b></td>
<td>{{$guide->contactno}}</td>
</tr>
<tr>
<td><b>Experience</b></td>
<td>{{$guide->experience}}</td>
</tr>
<tr>
<td><b>Fees/Tour</b></td>
<td>{{$guide->fees}}</td>
</tr>
</tbody>
</table>
</div>
<div class=" rating col-4">
<h1>Rating</h1>

<div class="reviews">
<?php $ratings=$guide->ratings;
$rating1=0;
foreach($ratings as $rating)
{
  $rating1=$rating1+$rating->rating;
}
if($rating1==0)
{
  echo "<i>"."Not Rated Yet"."</i>";
}
else
{
  echo "<h1>".$rating1."</h1>";
}
?>
<br>
<br>
<h1>Reviews</h1>
<?php $reviews= $guide->reviews;
$dest=$guide->destination;
$destinations=Destinations::where('Address',$dest)->get();

foreach($destinations as $destination)
{
  $id=$destination->id;
}

foreach($reviews as $review)
{
  
 
  echo "<br>";
  echo "<h6>"."<i>"."*".$review->review."</i>"."</h6>";
  echo "<h4>"."<i>"."by  ".$review->tourists->users->name."</i>"."</h1>";
  
}

?>
</div>
</div>
</div>
<hr>


<div class="row">
<form action="{{ route('availability',$guide->guide_id) }}" method="POST">
{{csrf_field()}}
<button type="submit" class="available btn btn-primary" >Check Availability</button>
</form>
<form action="{{ route( 'bookGuide', [$guide->guide_id , $id]) }}" method="post">
{{csrf_field()}}
<button type="submit" class="btn btn-primary">Make Your Booking</button>
</form>
@endforeach
</body>
</html>
