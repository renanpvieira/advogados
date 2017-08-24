<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/advogado.css'); ?>" >
     
  
    
    <script>
        function GeraSecurityForm(form){
            form[form.length] = { name: "<?php echo $this->security->get_csrf_token_name() ;?>", value: getCookie("<?php echo $this->security->get_csrf_cookie_name() ;?>") };
            return form;
        }

        function Site_Url(url){  return '<?php echo site_url(); ?>' + url; }
        function Base_Url(url){  return '<?php echo base_url(); ?>' + url; }
    </script>
    
    <style>
        
        html, body, #map {
          width: 100%;   height: 100%;
       
         }
         
         
         nav.menu-adv {z-index: 10 !important;}
         
         
         #sidebar-interna {background-color: #f5f5f5; padding: 28px;}
         #sidebar-interna p {color: #000000; font-size: 13px; text-align: justify; margin: 0px;}
         #sidebar-interna p.li-advogado-subtitulo { color: #9b9b9c !important; }
         
         
         .texto-msg {text-align: center; }
         #mapCadastro {min-height: 280px;}
        
    </style>
	
</head>
<body class="fixed-sn black-skin">
    <!--Double navigation-->
    
        <!-- Sidebar navigation -->
        
        <nav id="sidebar">
            <div id="sidebar-interna">
                <div id="dismiss"> <i class="glyphicon glyphicon-arrow-left"></i> </div>
                <p class="li-advogado-subtitulo">nome</p>
                <p id="sidebar-adv-nome">Não informado</p>
                <br />
                <p class="li-advogado-subtitulo">experiência</p>
                <p id="sidebar-adv-descricao">Não informado!</p>
                <br />
                <p class="li-advogado-subtitulo">contatos</p>
                <p>(21) 2628-1743 / (11) 9999-2211</p>
                <p>(11) 9999-2211</p>
                <p>renanvieira@id.uff.br</p>
                <br />
                <p class="li-advogado-subtitulo">endereço</p>
                <p>Estrada da paciência 3355, Maria Paula, São Gonçalo - RJ</p>
                <br />
                <p class="li-advogado-subtitulo">registro na OAB</p>
                <p id="sidebar-adv-oab">Não informado</p>
                <br />
                <p class="li-advogado-subtitulo">áreas de atuação</p>
                <p id="sidebar-adv-area">Trabalho; Cívil; Criminal.</p>
            </div>
        </nav>
        
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark menu-adv">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Sou advogado, quero me cadastrar!</button>
                </li>
               
                
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Ex.: Trabalhista, São Paula" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </div>
         </nav>
        
       
        
        
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="form-control-label">Nome</label>
                      <input type="text" class="form-control" id="recipient-name" placeholder="Digite o seu nome" >
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="form-control-label">Senha</label>
                      <input type="password" name="Senha" class="form-control" id="recipient-name" placeholder="Digite sua senha">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" name="btn-cadastar" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
       </div>
  




        

         
        
        
        
        
        
   