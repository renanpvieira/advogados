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


    

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>    
    
<script>
    
     function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }
     function Base_Url(url){  return '<?php echo base_url(); ?>' + url; }
    
     var map;
     var advogados = [];
    
      function initMap() {
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -20.089610, lng: -44.015908},
          scrollwheel: false,
          zoom: 10
        });
        
        centralizar()
        listarAtivos();
      }
      
      
      
      
      function centralizar(){
         navigator.geolocation.getCurrentPosition(function(position) { 
            map.panTo({lat: position.coords.latitude, lng: position.coords.longitude})
         });
      }
      
      function listarAtivos(){
           $.ajax({
                type: "GET",
                url: Site_Url("/welcome/listarAtivos"),
                success: function (data) {
                  //console.log(data);
                }
            })
            .done(function(data) {
               var ret = $.parseJSON(data);
               for (i in ret) { 
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(ret[i].Latitude), lng: parseFloat(ret[i].Longitude)},
                        //label: ret[i].Nome,
                        map: map,
                        icon: Base_Url('assets/imagens/adv.png')
                       
                    });
                    advogados.push(marker);
               }
            })
            .always(function() {
               // select.removeAttr('disabled');
               // selectuf.removeAttr('disabled');
            });
          
      }
      
     
      
      
      
      


    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwuKbCfmuR1zT9Onwa35bZOyReQMAt20&callback=initMap" async defer></script>


</body>
</html>