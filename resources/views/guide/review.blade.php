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
  * {
    box-sizing: border-box;
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
  width:100%;
  height:auto;

}
.text-box{
  position:absolute;
  top:50%
}

  </style>
  </head>
  <body>




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
      <a class="nav-link" href="/UpcomingTrips">View Upcoming Trips</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/PastTrips">View Past Trips</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/logout">Logout</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/guide/destination/suggest">Suggest New Destinations</a>
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
khjgjhjk
<div class="row">
<?php $url = Storage::url($guide->profile_img);?>
<img class="col-6" src="<?php echo $url;?>" >
<form action="/review/store" method="post">
{{ csrf_field() }}

<div class="col-6 text-box">
<h1>Give your Reviews</h1>
<input type="hidden" value="<?php echo $guide->guide_id;?>" name="guide_id" >
<input type="text-box" class="col-6" name="review" id="review">
<input type="submit" class="btn btn-primary">
</form>
</div>
@endforeach
</body>
</html>