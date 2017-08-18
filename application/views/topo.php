<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
        
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
         li.li-advogado {background-color: #f5f5f5; padding: 28px;}
         li.li-advogado p {color: #000000; font-size: 13px; text-align: justify; margin: 0px;}
         p.li-advogado-subtitulo { color: #9b9b9c !important; }
        
    </style>
	
</head>
<body class="fixed-sn black-skin">
    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed custom-scrollbar">
            <li class="li-advogado">
                <p class="li-advogado-subtitulo">nome</p>
                <p>Luiz Fernando Freire Vieira</p>
                <br />
                <p class="li-advogado-subtitulo">experiência</p>
                <p>LoremIpsum360 ° é um gerador on-line falso texto livre. Ele oferece um simulador de texto completo para gerar texto de substituição ou texto alternativo para seus modelos. Possui textos aleatórios diferentes em latim e cirílico para gerar exemplos de textos em diferentes línguas.</p>
                <br />
                <p class="li-advogado-subtitulo">telefones</p>
                <p>(21) 2628-1743 / (11) 9999-2211</p>
                
                
                
            </li>
            
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Material Design for Bootstrap</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#cadastro" ><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Sou advogado, quero me cadastar!</span></a>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
        
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
                      <input type="text" name="Login" class="form-control" id="recipient-name" placeholder="Digite seu e-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" name="Senha" class="form-control" id="recipient-name" placeholder="Digite sua senha">
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
        
        
    </header>
    <!--/.Double navigation-->