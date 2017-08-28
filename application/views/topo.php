<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
         
         
         nav.menu-adv {z-index: 10 !important; background-color: #4D6A79 !important;}
         
         
         #sidebar-interna {background-color: #f5f5f5; padding: 28px;}
         #sidebar-interna p {color: #000000; font-size: 13px; text-align: justify; margin: 0px;}
         #sidebar-interna p.li-advogado-subtitulo { color: #9b9b9c !important; }
         #sidebar-adv-endereco, #sidebar-adv-area {text-align:left !important;}
         
         
         .texto-msg {text-align: center; }
         #mapCadastro {min-height: 280px;}
         .form-usuario-label-titulo {color: #343a40; font-size: 20px; width: 100%; border-bottom: solid 1px #343a40; padding-bottom:  6px;}
         
         
         #form-cadasto-map-msg p {font-size: 13px; margin: 0px; padding: 0px; }
         div.erro p { color: red !important; }
         div.sucesso p { color: #007bff !important; }
         
         
         .right {text-align: right;}
         
         #sidebar-topo {background-color: #4D6A79 !important; width: 100%; height: 70px;}
         #dismiss {margin-top: 9px; background-color: #4D6A79 !important; }
         
         #cadastro-msg {text-align: left !important; width: 100% !important;}
         #cadastro-msg p {font-size: 13px; text-align: left !important; margin: 0px !important; padding: 0px !important; margin-bottom: 5px !important;}
         
         
         .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;  /* Preferred icon size */
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;

            /* Support for all WebKit browsers. */
            -webkit-font-smoothing: antialiased;
            /* Support for Safari and Chrome. */
            text-rendering: optimizeLegibility;

            /* Support for Firefox. */
            -moz-osx-font-smoothing: grayscale;

            /* Support for IE. */
            font-feature-settings: 'liga';
          }
          
          .material-icons.md-18 { font-size: 18px; }
.material-icons.md-24 { font-size: 24px; }
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }
        
    </style>
	
</head>
<body class="fixed-sn black-skin">
    <!--Double navigation-->
    
        <!-- Sidebar navigation -->
        
        <nav id="sidebar">
            <div id="sidebar-topo">
                <div id="dismiss"> <i class="material-icons md-36">chevron_left</i></div>
            </div>
            
            <div id="sidebar-interna">
                <p class="li-advogado-subtitulo">nome</p>
                
                <p id="sidebar-adv-nome">Não informado</p>
                <br />
                <p class="li-advogado-subtitulo">experiência</p>
                <p id="sidebar-adv-descricao">Não informado!</p>
                <br />
                <p class="li-advogado-subtitulo">contatos</p>
                <p id="sidebar-adv-tel">**</p>
                <p id="sidebar-adv-zap">**</p>
                <p id="sidebar-adv-email">Não informado!</p>
                <br />
                <p class="li-advogado-subtitulo">endereço</p>
                <p id="sidebar-adv-endereco">**</p>
                <br />
                <p class="li-advogado-subtitulo">registro na OAB</p>
                <p id="sidebar-adv-oab">Não informado</p>
                <br />
                <p class="li-advogado-subtitulo">áreas de atuação</p>
                <p id="sidebar-adv-area">**</p>
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
                  <form name="cadastro" >
                    <div class="form-group">
                      <label for="recipient-name" class="form-control-label">E-mail</label>
                      <input type="text" name="Login" class="form-control" id="recipient-name" placeholder="Digite o seu e-mail" maxlength="255">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="form-control-label">Senha</label>
                      <input type="password" name="Senha" class="form-control" id="recipient-name" placeholder="Digite sua senha" maxlength="10">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <div id="cadastro-msg"></div>  
                  <button type="button" name="btn-cadastar" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </div>
       </div>
  




        

         
        
        
        
        
        
   