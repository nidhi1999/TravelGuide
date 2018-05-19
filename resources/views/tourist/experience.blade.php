<?php 
namespace App\Http\Controllers;
use App\Guide;
?>
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
  </head>
  </style>
  <body>
  @foreach($bookings as $booking)
  {{$booking->guides->name}}
  {{$booking->guides->destination}}
  {{$booking->start_date}}
  {{$booking->ending_date}}
<form action="/experience/store" method="post">
{{csrf_field()}}
<input type="hidden" value="<?php echo $booking->booking_id ;?>" id="booking_id" name="booking_id">
<input type="text-box" name="experience" id="experience">
<button type="submit" class="btn btn-primary">submit</button>
</form>
  @endforeach