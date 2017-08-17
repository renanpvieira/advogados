<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/advogado.css'); ?>" >
    
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>  
    <script src="<?php echo base_url('assets/js/script-base.js'); ?>" ></script>  
    
    <script>
        function GeraSecurityForm(form){
            form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
            return form;
        }


        function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }
        function Base_Url(url){  return '<?php echo base_url(); ?>' + url; }
    </script>
	
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