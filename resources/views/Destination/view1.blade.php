<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Http\Request;
use App\Guide;
use App\destinationRatngs;
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
.table-responsive
{
  
  border: 3px solid #73AD21;
  padding: 10px;

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


@foreach($destinations as $destination)

<?php 
$images=$destination->destination_images;
foreach($images as $image)
{
$url = Storage::url($image->image);
} //acquire URL
//echo $url;
?>

<div class="row">
<img class="col-12" src="<?php echo $url;?>"></img>
</div>


<div class="row">
<div class="about col-9">
<h1>About</h1>
<br>

<p>{{$destination->description}}</p>
</div>
<div class="col-3">
<h1>Rating</h1>
<br>
<?php
  
    
    $ratings=destinationRatngs::where('destination_id',$destination->id)->get();
    //dd($ratings);
    $i=0;
    $sum=0;
    if(count($ratings)==0)
    {
        $sum=0;
       $rate=$sum;  
    } 
    else{
        $k=1;
        foreach($ratings as $rating)
        {
           
           
            $sum=$sum+$rating->ratings;
            $k++;
            
        }
        $rate= $sum/($k-1);
        }
   if($sum==0)
   {
    ?>
    <h4><i>Not Rated Yet..</i></h1>
    <?php
   }
  
   else
   {
     ?>
     <h1><?php echo $rate;?></h1>
     <?php
   }
   ?>
</div>
<h1> Some More Images</h1>

<div class="row">

<?php
$images=$destination->destination_images;
$m=1;
foreach($images as $image)
{
$url = Storage::url($image->image);
if($m<=3)
{
?>

<img class="col-4" src="<?php echo $url;?>"></img>
<?php
}
$m++;

}
?>
</div>
@endforeach
