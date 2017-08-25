   
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
         
        if ($("#mapCadastro").length == 0){ return; }
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
           
            var valido = true;
            var msg = "";
            
            var endereco = "";
            var logradouro = $.trim($("input[name='Logradouro']").val());
            var bairro = $.trim($("input[name='Bairro']").val());
            var cidade = $.trim($("input[name='Cidade']").val());
            var numero = $.trim($("input[name='Numero']").val());
            
            if (logradouro.length < 3) {
                valido = false;
                msg = '<p>O Logradouro precisa ser preenchido!</p>';
            }
            
            if (bairro.length < 3) {
                valido = false;
                msg = msg + '<p>O Bairro precisa ser preenchido!</p>';
            }
            
            if (cidade.length < 3) {
                valido = false;
                msg = msg + '<p>A Cidade precisa ser preenchida!</p>';
            }
            
            if(!valido){
                displayFormMsg(false, '#form-cadasto-map-msg', msg);
                return;
            }
            
            
            if (typeof marker != 'undefined'){
               marker.setMap(null);  
            }
            
                       
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
                  /*Enviar esse erro posteriormente para um log via ajax*/
                   console.log('Geocode was not successful for the following reason: ' + status);
                  
                  
                }
            });
            
            
            //console.log(endereco);   
            
        });
        
        /*
         $("button[name='btn-cadastro-usuario']").click(function () {
             
             //alert($('input:checkbox:checked').length);
             //console.log();
         });
        */
       
       
        $("form[name='cadastro-usuario']").submit(function(e) {
            e.preventDefault();
            
//            if($('input:checkbox:checked').length == 0){
//               displayFormMsg(false, '#form-cadasto-msg', '<p>Selecione pelo menos 1 área de atuação!</p>'); 
//            }
            
            var form = $(this).serializeArray();
            
            
            
            form[0].value = '22.222222';
            form[1].value = '34.23232';
            //form[2].value = 'aaaa';
            form[3].value = 'Nome teste Y';
            form[4].value = 'Descricao Terste';
            form[5].value = 'tel 1 teste';
            form[6].value = 'Tel 2 teste';
            form[7].value = 'ZAPZAP teste';
            form[8].value = 'testey1@teste.com.br';
            form[9].value = 'oab teste';
            form[10].value = 'logradouro teste';
            form[11].value = 'numero teste';
            form[12].value = 'bairro teste';
            form[13].value = 'cidade teste';
            form[14].value = '19';
            
            
            /* PODE SER QUE O USUARIO NAO TENHA CLICADO NO BOTAO */
//            if (form[0].value.length < 3 || form[1].value.length < 3) {
//                var endereco = "";
//                var logradouro = $.trim($("input[name='Logradouro']").val());
//                var bairro = $.trim($("input[name='Bairro']").val());
//                var cidade = $.trim($("input[name='Cidade']").val());
//                var numero = $.trim($("input[name='Numero']").val());
//                
//                endereco = logradouro;
//                if(numero.length > 1){ endereco = endereco + ", " + numero; }
//                if(bairro.length > 2){ endereco = endereco + ", " + bairro; }
//                if(cidade.length > 2){ endereco = endereco + ", " + cidade; }
//                
//                
//                if(endereco.length > 5){
//                    var geocoder = new google.maps.Geocoder();
//                    geocoder.geocode({'address': endereco}, function(results, status) {
//                        if (status === 'OK') {
//                          form[0].value = results[0].geometry.location.lat();
//                          form[1].value = results[0].geometry.location.lng();
//                        } else {
//                          /*Enviar esse erro posteriormente para um log via ajax*/
//                           console.log('Geocode was not successful for the following reason: ' + status);
//                        }
//                    });
//                }
//            }
            

            $.ajax({
                type: "POST",
                url: Site_Url("/usuario/salvar"),
                data: GeraSecurityForm(form),
                success: function (data) {
                    //var ret = $.parseJSON(data);
                    //displayFormMsg(ret.formValidate, "#form-cadasto-msg", ret.msg);
                    console.log(data);
                    
                   
                }
            });
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