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
@foreach($destinations as $destination)

<div class="card w-100">
<div class="row ">
<div class="col-sm-3">
<h1>{{$destination->name}}</h1>
<?php
$images=$destination->destination_images;
foreach($images as $image)
{
    $url=Storage::url($image->image);
}
?>
<img class="card-img-top text-left" src="<?php echo $url;?>" alt="Card image cap">
</div>
  <div class="col-sm-9">
 
    
    <p>With supporting text below as a natural lead-in to additional content.</p>
    
    <a href="{{ route('viewDestination',$destination->id) }}" class="btn btn-primary">Button</a>
  </div>
</div>
</div>
@endforeach
</div>