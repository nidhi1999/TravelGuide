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
.carousel-inner > .carousal-item > img,
  .carousel-inner > .carousal-item > a > img {
      width: 100vw;
      height:100vh;
      margin-top:auto;
      margin-left:0%;
      margin-right:0%;
      background-size:cover;
      background-position: center center;
  }
.container{
     height: 80vh;
    
}
.navbar{
      position:absolute;
      width:100%;
      z-index:10;
      max-width:100%;
}

</style>
</head>



<body>
<div class="text-center">
<h1><b><i>Your Travel Guide</i></b></h1>
</div>


<div class="row">
<div class="col-sm-12" height="100%" width="100%"  >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
    @if(!Auth::check())
      <a class="nav-link" href="/login">Login</a>
    </li>
    @endif
    @if(!Auth::check())
    <li class="nav-item">
      <a class="nav-link" href="/register">Register</a>
    </li>
    @endif
    @if(Auth::check())
    <li class="nav-item">
      <a class="nav-link" href="/logout">Logout</a>
    </li>
    @endif
  </ul>
</nav>

 

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
  </ul>
  <div class="carousel-inner ">
    <div class="carousel-item active">
      <img src="{{url('images/img0.jpg')}}" alt="Los Angeles" width="100%" height="500vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img1.jpg')}}" alt="Chicago" width="100%" height="500vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img2.jpg')}}" width="100%" height="500vh">
       
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img3.jpg')}}" width="100%" height="500vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img4.jpg')}}" width="100%" height="500vh">
       
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img5.jpg')}}" width="100%" height="500vh">
      
    </div>
    
  
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>