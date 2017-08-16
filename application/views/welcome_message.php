<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>  

    <style>
        
    body {
        /* min-height: 75rem;*/
        padding-top: 3.4rem;
    }
        
    html, body, #map {
        width: 100%;   height: 100%;
        
    }
    .btn-no-border { border: none; }
    .modal-form-msg {width: 100%; }
    .modal-form-msg p {padding: 0px; margin: 0px; margin-bottom: 3px; font-size: 13px; }
    
    
    .janela-adv p {margin: 4px; padding: 0px;}
    .janela-nome {color: #464a4e; font-size: 16px; font-weight: bold; }
    .janela-sutitulo {padding-top: 10px !important; font-weight: bold; }

    
    
    </style>
        

	
</head>
<body>
    
  
     <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastro" >Sou advogado, quero me cadastar!</button>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Ex: São Paulo, Trabalhista">
          <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button">Buscar</button>
          <button class="btn btn-outline-success my-2 my-sm-0 btn-no-border"  type="button" data-toggle="modal" data-target="#buscar" >Buscar Avançada</button>
        </form>
      </div>
    </nav>
        
    <div id="map"></div>
   
    <div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="cadastro">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Digite seu e-mail</label>
                <input type="text" name="Login" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Digite sua senha</label>
                <input type="password" name="Senha" class="form-control" id="recipient-name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
              <div id="cadastro-msg" class="modal-form-msg"></div>
              <button type="button" name="btn-cadastar" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="modal fade" id="buscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Busca Avançada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Digite seu e-mail</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Digite sua senha</label>
                <input type="password" class="form-control" id="recipient-name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>


    


    
<script>
    
      function displayFormMsg(valid, div, msg) {

            if(valid){
                $(div).css('color', '#d9edf7');
            }else{
                $(div).css('color', '#c82333');
            }

            $(div).html('');
            $(div).append(msg);

            $(div).delay(1500).fadeOut(2000, function () {
                $(div).css('background-color', 'white');
                $(div).html('');
                $(div).fadeIn(1);
            });

      }
    
      function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
          return "";
      }
    
     function GeraSecurityForm(form){
        form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
        return form;
     }
   
    
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
        
        map.addListener('dragend', movimento);
        
        centralizar()
        listarAtivos();
      }
      
      
      function movimento(){
          console.log("ddd");
          
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
