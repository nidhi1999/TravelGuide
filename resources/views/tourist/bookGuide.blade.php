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
   
    <form  method="POST" action="/booking/store">
    {{ csrf_field() }}
    <div class="container">
    <h1><b>Enter your Details</b></h1>
   
  
    <input type="hidden" name="guide_id" value="{{$guide_id}}" class="form-control" id="guide_id">
    <input type="hidden" name="dest_id" value="{{$dest_id}}" class="form-control" id="destination">
    <div class="form-group">
    <label for="date">Booking start date:</label>
    <input type="text" id="start_date" name="start_date" class="form-control" ></select>
    </div>
    <div class="form-group">
    <label for="end_date">Booking Ending Date:</label>
    <input type="text" id="end_date" name="end_date" class="form-control">
   
     </div>

              @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
       
        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="book">
                                    Book now
                                </button>
                            </div>
                        </div>
                        </form>
</div>