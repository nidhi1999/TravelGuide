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
  <script type= "text/javascript" src = "{{ asset('js/country.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>
  <style>
  .navbar{
     
     width:100%;
     z-index:10;
     max-width:100%;
     padding:1%;
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



    <br>
    <br>
    <br>
    @if($loc=='sightseeing')
    <?php $path="/destination/sightseeing";?>
     @endif
     @if($loc=='restaurants')
    <?php $path="/destination/restaurant";?>
     @endif

     @if($loc=='hotels')
    <?php $path="/destination/hotels";?>
     @endif

     @if($loc=='sportshub')
    <?php $path="/destination/sport";?>
     @endif


     @if($loc=='shopping')
    <?php $path="/destination/shopping";?>
     @endif
     
    <form  method="POST" action="{{$path}}" onsubmit="return (sendData3('country','state') && validateCity())">
    {{ csrf_field() }}
    <div class="container">
    <h1><b>Select Your Destination</b></h1>
    <div class="form-group">
    <label for="country">Country:</label>
    <select id="country" name="country" onchange="populateStates('country','state')" class="form-control"></select>
    </div>
    <div class="form-group">
    <label for="state">State:</label>
    <select name="state" id="state" class="form-control" ></select>
    </div>
    <div class="form-group">
    <label for="city">City:</label>
    <input type="text" id="city" name="city" onblur="validateCity()" class="form-control" placeholder="enter city">
    <span class="error" id="err_city"></span>
     </div>
       
        <script language="javascript">
        
            populateCountries("country");

           
        </script>
    
        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                        </form>
</div>
