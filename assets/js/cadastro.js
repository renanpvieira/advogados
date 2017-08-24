   
     var map;
     var marker;
     
     function centralizar(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position) { 
                map.panTo({lat: position.coords.latitude, lng: position.coords.longitude})
                map.setZoom(12);
            });
        }
     } 
     
    
     function iniciaMapa() {
        map = new google.maps.Map(document.getElementById('mapCadastro'), {
          center: {lat: -21.579911, lng: -43.761514},
          scrollwheel: false,
          zoom: 7
        });
        //map.addListener('click', clickMapa);
        
        centralizar();
     }
      
      
    $(document).ready(function () {
        /*
        $("input[name='Logradouro']" ).blur(function() {
           buscaPosicao();
        });
        
        $("input[name='Bairro']" ).blur(function() {
           buscaPosicao();
        });
        
        $("input[name='Cidade']" ).blur(function() {
           buscaPosicao();
        });
        */
        
        $("button[name='btn-busca-mapa']").click(function () {
            
            
            if (typeof marker != 'undefined'){
               marker.setMap(null);  
            }
            
            var endereco = "";
            var logradouro = $.trim($("input[name='Logradouro']").val());
            var bairro = $.trim($("input[name='Bairro']").val());
            var cidade = $.trim($("input[name='Cidade']").val());
            var numero = $.trim($("input[name='Numero']").val());
                       
            endereco = logradouro;
            if(numero.length > 1){ endereco = endereco + ", " + numero; }
            if(bairro.length > 2){ endereco = endereco + ", " + bairro; }
            if(cidade.length > 2){ endereco = endereco + ", " + cidade; }
            
            
            
            var geocoder = new google.maps.Geocoder();
            
            geocoder.geocode({'address': endereco}, function(results, status) {
                if (status === 'OK') {
                  $("input[name='Latitude']").val(results[0].geometry.location.lat());
                  $("input[name='Longitude']").val(results[0].geometry.location.lng());
                  
                  map.setCenter(results[0].geometry.location);
                  marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                  });
                  
                } else {
                  console.log('Geocode was not successful for the following reason: ' + status);
                }
            });
            
            
            //console.log(endereco);   
            
        });
        
        
     
        /*
        $("button[name='btn-cadastar']").click(function () {
                  var btn = this; 
                  btn.disabled = true;// EVITA DOUBLE-CLICK
                  var form = $("form[name='cadastro']").serializeArray();

                  $.ajax({
                      type: "POST",
                      url: Site_Url("/home/cadastro"),
                      data: GeraSecurityForm(form),
                      success: function (data) {
                         btn.disabled = true;
                      }
                  })
                  .done(function(data) {
                      var ret = $.parseJSON(data);
                      displayFormMsg(ret.formValidate, "#cadastro-msg", ret.msg);
                  })
                  .always(function() {
                      btn.disabled = false;
                  });
         });
         */
   });