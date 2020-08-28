@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html>

<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
</head>

<body>

<div class="w3-content w3-section" style="max-width:1000px">
  <img class="mySlides" src="beranda/1.jpg" style="width:1000px" height="400px" >
  <img class="mySlides" src="beranda/2.jpg" style="width:1000px" height="400px">
  <img class="mySlides" src="beranda/3.jpg" style="width:1000px" height="400px">
</div>
<br>
<center><h1>Struktur Organisasi</h1></center>
<br>
<br>
<br>
<img src="SusunanKepengurusan.png" width="900px" height="500px"/>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 10000); // Change image every 2 seconds
}
</script>

</body>
</html>


@endsection

