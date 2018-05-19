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

.container 
{
    position:absolute ;
    top:10%;
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
<?php $i=1;?>
<div class="container row">
<div class="table-responsive col-12">
<table class="table">
<thead>
<tr>
<th>Sno.</th>
<th>Booking Start date</th>
<th>Booking End Date</th>
</tr>
</thead>
<tbody>
@foreach($bookings as $booking)



<tr>
<td>{{$i}}</td>
<td>{{$booking->start_date}}</td>
<td>{{$booking->ending_date}}</td>
</tr>

<?php $i+=1;?>
@endforeach
</tbody>
</table>
</div>
</body>
</html>