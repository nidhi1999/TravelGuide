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
     
      width:100%;
      z-index:10;
      max-width:100%;
      padding:1%;
      
}
.ml-auto{
    padding-right:20px;
}

.card-img-top{
    opacity:1;
    display:block;
    transition: .5s ease;
    backface-visibility:hidden;
}
.mask{
    transition:.5s ease;
    opacity:0;
    position:absolute;
    background-color:black;
    text-align: center;
    width:100%;
    height:0;
    
}
.contain:hover .card-img-top{
  opacity: 0.3;
}

.contain:hover .mask {
  opacity: 0.7;
  height:100%;
}
.card-text{
    color:white;
    position:center;
}
.card-title{
    color:white;
}
.title{
  color:black;
}
.dropdown:hover .dropdown-content {
    display: block;
}


.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
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

<div class="row">
<div class="col-sm-12" height="100%" width="100%"  >
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
      <img src="{{url('images/img0.jpg')}}" alt="Los Angeles" width="100%" height="750vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img1.jpg')}}" alt="Chicago" width="100%" height="750vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img2.jpeg')}}" width="100%" height="750vh">
       
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img3.jpg')}}" width="100%" height="750vh">
        
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img4.jpg')}}" width="100%" height="750vh">
       
    </div>
    <div class="carousel-item">
      <img src="{{url('images/img5.jpg')}}" width="100%" height="750vh">
      
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

<div class="jumbotron">
<div class="text-center title">
<h1><b><i>Travel Guide India</i></b></h1>
</div>
</div>
<div class="text-center">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishin
</div>


<div class="row">
 <div class=" contain col-sm-4">
 <div class="view overlay hm-blue-light">
  <div class="card rounded-top" style="width:500px">
   
    <img class="card-img-top img-fluid" src="{{url('images/img8.jpg')}}" alt="Card image" >
    <div class="mask">
    <h4 class="card-title">Hurry</h4>
        <p class="card-text text-center">register as a guide today.</p>  
    </div>
    </div>
  </div>
</div>
<div class="col-sm-8">
</div>
</div>
<div class="row">
<div class="col-sm-8">
</div>
<div class="contain col-sm-4">
<div class="view overlay hm-blue-light">
  <div class="card rounded-top" style="width:500px">
   
    <img class="card-img-top img-fluid" src="{{url('images/img7.jpg')}}" alt="Card image" >
    <div class="mask">
    <h4 class="card-title">Hurry</h4>
        <p class="card-text text-center">register as a guide today.</p>  
    </div>
    </div>
  </div>
</div>

</div>
<div class="row">
<div class="contain col-sm-4">
<div class="card" style="width:500px">
  <img class="card-img-top" src="{{url('images/img6.jpg')}}" alt="Card image">
  
    <div class="mask">
        <h4 class="card-title">Hurry</h4>
        <p class="card-text text-center">register as a guide today.</p>
        
  </div>
</div>
</div>
</div>
<div class="col-sm-8">

</div>
</div>
</div>
</body>
</html>
