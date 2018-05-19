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
  .navbar{
     
     width:100%;
     z-index:10;
     max-width:100%;
     padding:1%;
     background-color:blue;
}
  .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
</style>
  </head>

  <body> 

  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top" style="background-color: #333; border-color: #333;">
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
      <a class="nav-link" href="/logout">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/book">Book Your Guide</a>
    </li>
    </ul>
    @endif
    @if(Auth::check())
    
    <span class="navbar-text ml-auto">
    Welcome {{ Auth::user()->name}}
  </span>
    
    @endif
    </nav>  
  @if($bookings1!=NULL)
  @foreach($bookings1 as $booking1)
  <div class="container">
  <div class="row">
 <div class="card text-center w-50 card-inverse" height="500vh">
 <img class="card-img-top" src="/images/guides/<?php echo $booking1->guides->profile_img?>.jpg" alt="img-card">
 <div class="card-block">
 <h4 class="card-title">{{$booking1->guides->name}}</h4>
 <h6 class="card-title">fees/tour:{{$booking1->guides->fees}}</h6>
 <p class="card-text" >{{$booking1->guides->about}}</p>
 <a href="/guide/book/{{ $booking1->guide_id }}" class="btn btn-primary">book now</a>
 </div>

</div>
</div>
<hr>
 </div> 
 
   

    @endforeach
    @endif

 
   

    

    
  @foreach($guides1 as $guide)
  <div class="container">
  <div class="row">
 <div class="card text-center w-50 card-inverse" height="500vh">
 <img class="card-img-top" src="/images/guides/<?php echo $guide->profile_img?>.jpg" alt="img-card">
 <div class="card-block">
 <h4 class="card-title">{{$guide->name}}</h4>
 <h6 class="card-title">fees/tour:{{$guide->fees}}</h6>
 <p class="card-text" >{{$guide->about}}</p>
 <a href="/guide/book/{{ $guide->guide_id }}" class="btn btn-primary">book now</a>
 </div>

</div>
</div>
<hr>
 </div> 
 
   

    @endforeach
  
</body>
</html>