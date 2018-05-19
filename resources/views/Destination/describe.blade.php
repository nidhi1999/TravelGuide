
<?php use Carbon\Carbon;?>
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
  <script src=""
  <style>
  


.navbar{
     
      width:100%;
      z-index:10;
      max-width:100%;
      padding:1%;
      position:relative;
}


.card-img-top {
    width: 100%;
    height: 700vh;
    height: 15vw;
    object-fit: cover;
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
          <li><a href="/destination/suggest">Suggest some places</a></li>
         
        </ul>
      </li>
     
    @endif
    @if(Auth::check())
    <li class="nav-item">
      <a class="nav-link" href="/logout">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/search">Book Your Guide</a>
    </li>
    </ul>
    @endif
    @if(Auth::check())
    
    <span class="navbar-text ml-auto">
    Welcome {{ Auth::user()->name}}
  </span>
    
    @endif
  
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<img src="/images/sightseeing/<?php echo $destination->image;?>" alt="card image cap">
<p>{{$destination->description}}</p>
</div>
</div>
</div>