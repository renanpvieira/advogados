<script>
     
     var map;
     var advogados = [];
     
     function centralizar(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position) { 
                map.panTo({lat: position.coords.latitude, lng: position.coords.longitude})
                map.setZoom(12);
            });
        }
     } 
     
    
     function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -21.579911, lng: -43.761514},
          scrollwheel: false,
          zoom: 7
        });
        
        map.addListener('dragend', movimento);
        
        centralizar();
        listarAtivos();
     }
      
      
     function movimento(){
          console.log("ddd");
     }
      
      
     
      
      
      function listarAtivos(){
           $.ajax({
                type: "GET",
                url: Site_Url("/home/listarAtivos"),
                success: function (data) {
                  //console.log(data);
                }
            })
            .done(function(data) {
               var ret = $.parseJSON(data);
               for (i in ret) { 
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(ret[i].Latitude), lng: parseFloat(ret[i].Longitude)},
                        map: map,
                        icon: Base_Url('assets/imagens/adv.png'),
                        title:ret[i].Nome
                    });
                    
                    marker.metadata = {dados: ret[i]};
                    marker.addListener('click', janelaAdvogado);
                    advogados.push(marker);
               }
            })
            .always(function() {
               // select.removeAttr('disabled');
               // selectuf.removeAttr('disabled');
            });
          
      }
      
      function janelaAdvogado(){
          var html = '<div class="janela-adv">';
          var dados = this.metadata.dados;
          
          html = html + '<p class="janela-nome">' + dados.Nome + '</p>';
          if(dados.Descricao.length > 5){ html = html + '<p>' + dados.Descricao + '</p>';  }
          if(dados.OAB.length > 2){ html = html + '<p>OAB: ' + dados.OAB + '</p>'; }
          
          html = html + '<p class="janela-sutitulo">Dados para contato</p>';
          if(dados.Telefone1.length > 2){ html = html + '<p>Telefone: ' + dados.Telefone1 + '</p>'; }
          if(dados.Telefone2.length > 2){ html = html + '<p>Telefone: ' + dados.Telefone2 + '</p>'; }
          if(dados.Whatszap.length > 2){ html = html + '<p>Whatszap: ' + dados.Whatszap + '</p>'; }
          if(dados.Email.length > 2){ html = html + '<p>E-mail: ' + dados.Email + '</p>'; }
          
          html = html + '<p class="janela-sutitulo">Endereço</p>';
          html = html + '<p>Avenida Amaral Peixoto, 355 - Niterói - RJ</p>';
                    
          html = html + '<p class="janela-sutitulo">Áreas de Atuação</p>';
          html = html + '<p>Trabalhista, Cível e Famila</p>';
          html = html + '</div>';
          
          var janela = new google.maps.InfoWindow({ content: html });
          janela.open(map, this);
      }
      
      
      
      
      
      $(document).ready(function () {
   
    
      $("button[name='btn-cadastar']").click(function () {
            var btn = this; 
            btn.disabled = true;// EVITA DOUBLE-CLICK
            var form = $("form[name='cadastro']").serializeArray();
            
            $.ajax({
                type: "POST",
                url: Site_Url("/welcome/cadastro"),
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
        
    });

     
      
      
      
      


    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGwuKbCfmuR1zT9Onwa35bZOyReQMAt20&callback=initMap" async defer></script>


</body>
</html>
