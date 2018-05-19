<!DOCTYPE html>
<html lang="en">
<head>
<title>Tours and Travels</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

<style>
  
.navbar{
      position:absolute;
      width:100%;
      z-index:10;
      max-width:100%;
}
.container{
    position:relative;
}
</style>
</head>



<body>
<div class="text-center">
<h1><b><i>Your Travel Guide</i></b></h1>
</div>


<div class="row">
<div class="col-sm-12" height="100%" width="100%"  >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="/login">Login</a></li>
      <li><a href="/register">Register</a></li>
     
    </ul>
  </div>
</nav>
<div class="container">
@yield('content');
</div>
</body>
</html>