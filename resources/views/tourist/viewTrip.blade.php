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




.text-center {
    text-align:center;
}

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
.background 
{
  width:100vw;
  height:100vh;
}
.img_container 
{
    height:100vh;
    width:100%;
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



@foreach($bookings as $booking)
<?php
$destination_id=$booking->destination_id;
$destinations=Destinations::where('id', $destination_id)->get();
foreach($destinations as $destination)
{
    $images=$destination->destination_images;
    foreach($images as $image)
    {
        $url=Storage::url($image->image);
    }

?>



<div class="img_container">

<img class="background" src="<?php echo $url;?>"></img>
</div>
</div>
<div class="row text-center">


<p><h1>{{$destination->Address}}</h1></p>

</div>
<?php
}
?>
<div class="table-responsive col-6">

<table class="table">
<tbody>
<tr>
<td><b>from:</b></td>
<td>{{$booking->start_date}}</td>
</tr>
<tr>
<td><b>To:</b></td>
<td>{{$booking->ending_date}}</td>
</tr>
</tbody>
</table>
<br><br>
<i><b>Share Your Experience With Us....</b></i>
<form action="{{route('storeExp')}}" method="post">
{{ csrf_field() }}

<textarea id="experience" name="experience"  class="form-control" rows=10></textarea>
<input type="hidden" value="{{$booking->booking_id}}" name="booking_id">
<button type="submit" class="btn btn-primary">submit</button>
</form>
</div>
<br>

<div class=" rating col-6">
<h4><i> Review Your Guide.....</i></h4>
<h1>Your Guide</h1>

<div class="guide">

<?php $id= $booking->guide_id;
$guides=Guide::where('guide_id',$id)->get();
foreach($guides as $guide)
{   
    $name=$guide->users->name;
    ?>
  
    <?php
    $url=Storage::url($guide->profile_img);
}
?>
<div class="card">
    <img class="card-img-top row1" src="<?php echo $url;?>" width=100% height=20px alt="Card image">
    <div class="card-body">
    <p class="card-text"><?php echo $name;?></p>
  </div>
  Give Review:
<form action="{{route('guideReview')}}" method="post">
{{csrf_field()}}
<textarea id="review" name="review" class="form-control"></textarea>
<input type="hidden" value="{{$guide->guide_id}}" name="guide_id">
<button type="submit" class="btn btn-primary">submit</button>

</form>
@endforeach
</body>
</html>
