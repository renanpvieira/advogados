<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <style>
        
    body {
        /* min-height: 75rem;*/
        padding-top: 3.5rem;
    }
        
    html, body, #map {
        width: 100%;   height: 100%;
        
    }
    
    
    </style>
        

	
</head>
<body>
    
  
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div id="map"></div>


    

<script>
     var map;
    
      function initMap() {
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -20.089610, lng: -44.015908},
          scrollwheel: false,
          zoom: 10
        });
        
        centralizar()
        addMarker();
      }
      
      
      function addMarker() {
         var marker = new google.maps.Marker({
           position: {lat: -22.892932, lng: -43.104665},
           label: "teste",
           map: map
         });
      }
      
      function centralizar(){
         navigator.geolocation.getCurrentPosition(function(position) { 
            map.panTo({lat: position.coords.latitude, lng: position.coords.longitude})
         });
      }
      
      
      
      


    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwuKbCfmuR1zT9Onwa35bZOyReQMAt20&callback=initMap" async defer></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"><\/script>')</script>
<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>

</body>
</html>