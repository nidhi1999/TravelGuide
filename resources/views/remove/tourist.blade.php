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
<th>City</th>
<th>State</th>

<?php $i=1;?>
</tr>
</thead>
<tbody>
<?php
if(count($tourists)==0)
{
  ?>
  <tr>
  <td>No Tourists To Show</td>
  <?php
}
?>
@foreach($tourists as $tourist)
<tr>
<td>{{$i}}</td>
<td>{{$tourist->users->name}}</td>

<td>{{$tourist->contactno}}</td>
<td>{{$tourist->city}}</td>
<td>{{$tourist->state}}</td>
<?php $i++;?>


<input type="hidden" value="{{$tourist->tourist_id}}" name="touristId" id="touristId">
<td><button type="button" name="remove" class="btn btn-danger" id="remove" onclick="return removeTourist()">remove</button></td>

</tr>

@endforeach
</tbody>
</table>
</div>