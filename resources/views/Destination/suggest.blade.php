<!DOCTYPE html>
<html lang="en">
<head>
<title>Tours and Travels</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
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
      <a class="nav-link" href="/UpcomingTrips">View Upcoming Trips</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/PastTrips">View Past Trips</a>
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
   
     
    <form  method="POST" action="{{ '/guide/destination/store' }}" enctype="multipart/form-data" onsubmit="return validateCity())" >
    {{ csrf_field() }}
    <div class="container">
    <h1><b>Suggest Us Some Places</b></h1>
    <div class="form-group">
    <label for="country">Name:</label>
    <input type="text" name="name" id="name" class="form-control"></select>
    </div>
   
    
    <div class="form-group">
    <label for="city">City:</label>
    <input type="text" id="city" name="city" onblur="validateCity()" class="form-control" placeholder="enter city">
    <span class="error" id="err_city"></span>
     </div>
       
       
<div class="form-group">
    <label for="category">Category:</label>
    <select name="category" id="category" class="category1" >
    <option value="hotel">Hotel</option>
    <option value="sport">Sports Club</option>
    <option value="restaurant">Restaurant</option>
    <option value="shopping">Shopping Hubs</option>
    <option value="sightseeing">Sightseeing</option>
    </select>
</div>

<div class="category">
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                      
                        <div class="col-md-6">
                        <div class="image">
                        <label for="image" class="col-md-4 control-label form-group">image</label>
                        <input type="file" name="image[]" multiple>
                        </div>
                        @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
    <label for="Description">Description:</label>
    <textarea id="description" name="description"  class="form-control" placeholder="tell something about the destination"></textarea>
    <span class="error" id="err_description"></span>
     </div>
   
        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                        </form>
</div>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		function initialize() {
		    var options = {
		        types: ['(cities)'],
		       
		    };
		    var input = document.getElementById('city');
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
            document.getElementById("submit").addEventListener("click", function(){
            var place =autocomplete.getPlace();
            var address=place.formatted_address;
            
       
            });
            
          

		}
		google.maps.event.addDomListener(window, 'load', initialize);
        
	</script>
    </body>
    </html>