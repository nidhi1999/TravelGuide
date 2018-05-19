<head>
<title>Tours and Travels</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
  <style>
  



.navbar{
     
      width:100%;
      z-index:10;
      max-width:100%;
      padding:1%;
      position:relative;
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
      <a class="nav-link" href="/guide/destination/suggest">Suggest New Destinations</a>
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

<div class="container">
<table class="table table-stripped">
<thead>
<tr>
<th>Name</th>
<th>Contact</th>
<th>Email</th>
<th>from</th>
<th>to</th>

</tr>
</thead>
<tbody>
<?php

if(count($guide)==0)
{
?>
<tr>
<td>
<h1>No Trips To Show</h1>
<td>
</tr>
<?php
}
?>
@foreach($guide as $guide)
<tr>

<td>{{$guide->tourists->users->name}}</td>

<td>{{$guide->tourists->contactno}}</td>
<td>{{$guide->tourists->users->email}}</td>
<td>{{$guide->start_date}}</td>
<td>{{$guide->ending_date}}</td>
<td>{{$guide->starting_time}}</td>
<td>{{$guide->ending_time}}</td>
<input type="hidden" value="{{$guide->booking_id}}" name="bookingId" id="bookingId">
<td><button type="button" name="cancel" class="btn btn-danger" id="cancel" onclick="return cancel()">cancel</button></td>
<td><button type="approve" name="approve" class="btn btn-success" id="delete" onclick="return approve()">Approve</button></td>
</tr>

@endforeach
</tbody>
</table>
</div>