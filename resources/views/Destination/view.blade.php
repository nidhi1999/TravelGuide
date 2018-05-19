<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Destinations;
use Illuminate\Http\Request;
use App\experience;
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
  
  <style>
  

  .row::after {
      content: "";
      clear: both;
      display: table;
      margin:0;
      
  }
  [class*="col-"] {
      float: left;
      padding: 20px;
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

  @media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
        
    }
}
.container{
     height: 80vh;
    
}
.img_container {
  height:100vh;
  width:100%;
}

.navbar{
     
      width:100%;
      z-index:10;
      max-width:100%;
      padding:1%;
}
.ml-auto{
    padding-right:20px;
}


.title{
  color:black;
}

.background 
{
  width:100vw;
  height:100vh;
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
<?php 

foreach($destination_image as $image)
{

$url=Storage::url($image->image);
//dd($url);

}
?>
<div class="img_container">
<img  class="background" src="<?php echo $url;?>">
</div> 

</div>


<div class="jumbotron">
<div class="text-center title">
@foreach($destinations as $destination)
<?php $address=$destination->Address ; $city=explode(',',$address)?>
@endforeach 

<h1><b><i>{{$city[0]}}</i></b></h1>
<br>
<h3><i>{{$city[1]}},{{$city[2]}}</i></h3>
</div>
</div>

<div class="row">
<div class="col-3">
<h1> Experiences</h1>
<?php
$experiences=experience::get();
//dd($experiences);
$i=1;
foreach($experiences as $experience)
{ 
  if($i<=2)
  {
  $add=$experience->bookings->destinations;
  $user=$experience->bookings->tourists->users;
  $name=$user->name;
  if($address==$destination->Address);
    
    echo "<i>"."*".$experience->experience."</i>";
    echo "<h3>"."by";
    echo " ".$name."</h3>"."<br>";
  }
  $i++;
}
?>

</div>
<div class="col-9">
<h1>Tour Guides For You</h1>
<hr>
<div class="row">
<?php
if(count($guides)==0)
{
  echo "<h2>"."<i>"."No Guides Available yet"."</i>"."</h2>";
}
?>
@foreach($guides as $guide)
<?php
$url=Storage::url($guide->profile_img);
//dd($url);
?>
<div class="col-3">

<a href="{{ route('viewGuide', [$guide->guide_id, $city[0]]) }}" class="card-block clearfix">
<div class="card-deck mt-4">
 <div class="card">
 <div class="view overlay hm-blue-light">
  <div class="card rounded-top">
   
    <img class="card-img-top img-fluid" src='<?php echo $url;?>' alt="Card image" >
    <div class="mask">
    <h4 class="card-title">Hurry</h4>
        <p class="card-text text-center">register as a guide today.</p>  
    
    </div>
  </div>
</div>
</div>
</div>
</a>
</div>

@endforeach
</div>

<hr>
<?php $category=array();
$uniques=array();
foreach($destinations as $destination)
{
  $category[]=$destination->category;
}
$unique=array_unique($category);
//dd($unique);
?>

<?php 
 $i=0;
$count=count($unique);
?>

@while($count)

<h1>{{$unique[$i]}}</h1>
<hr>
<div class="row">
@foreach($destinations as $destination)
<?php
$images=$destination->destination_images;
foreach($images as $image)
{
  $url=Storage::url($image->image);
}
?>
@if($destination->category==$unique[$i])

<div class="col-3">
<a href="{{ route('viewDestination', $destination->id) }}" class="card-block clearfix">
<div class="card-deck ">
<div class="card">
<div class="view overlay hm-blue-light">
 <div class="card rounded-top">
  
   <img class="card-img-top img-fluid" src="<?php echo $url;?>" alt="Card image" >
   
 </div>
</div>
</div>
</div>
</a>
</div>
<?php
$address=$destination->Address;
$category=$destination->category;
?>
@endif
@endforeach

<a href="{{ route('viewAll', [ $address, $category]) }}">View All</a>
<?php $i++; $count--;?>
</div>
@endwhile
</div>
</div>

</body>
</html>

