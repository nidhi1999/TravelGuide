<head>
<title>Tours and Travels</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/remove.js') }}"></script>
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
<div class="container">
<table class="table table-stripped">
<thead>
<tr>
<th>Sno.</th>
<th>Name</th>
<th>Contact</th>
<th>Email</th>
<th>fees</th>
<th>Experience</th>

</tr>
</thead>
<tbody>
<?php $i=1;?>
<?php
if(count($guides)==0)
{
  ?>
  <tr>
  <td><h1>No Guides To Show</h1></td>
  </tr>
  <?php
}
?>
@foreach($guides as $guide)
<tr>
<td>{{$i}}
<td>{{$guide->name}}</td>

<td>{{$guide->contactno}}</td>
<td>{{$guide->users->email}}</td>
<td>{{$guide->fees}}</td>
<td>{{$guide->experience}}</td>
<?php $i++;?>

<input type="hidden" value="{{$guide->guide_id}}" name="guideId" id="guideId">
<button type="button" name="remove" class="btn btn-danger" id="remove" onclick=" removeGuide()">remove</button>
<button type="approve" name="view" class="btn btn-success" id="view" onclick=" view()">view</button>
</tr>

@endforeach
</tbody>
</table>
</div>