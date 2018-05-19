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
   
    <li class="nav-item">
    <a class="nav-link" href="destination/add">Add new Destinations</a>
      </li>
     
   
  
    <li class="nav-item">
      <a class="nav-link" href="/remove/guide">Remove Guide</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/remove/tourist">Remove Tourist</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/view/suggestions">View Suggested Destinations</a>
    </li>
    
    
    </ul>

   
</nav>

 

<div class="jumbotron">
<div class="text-center title">
<h1><b><i>Welcome Admin</i></b></h1>
</div>
</div>

</body>
</html>
