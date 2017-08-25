<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller  extends CI_Controller {
    
       private $dados = Array();
       private $chave = 'adv_pro';
    
       public function __construct()
       {
            parent::__construct();
       }
       
       /* Usado para teste */
       public function displayDados(){
           var_dump($this->dados);
           $this->dados = Array();
       }
        
       public function postResult($formValidate, $msg, $url = NULL)
       {
         echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'url' => $url));
       }
        
       public function setDados($key, $d)
       {
          $this->dados[$key] = $d;
       }
       
       public function SetScript($s){
        $this->dados['scriptsJs'] = $s;
      }

       
       public function displaySite($view)
       {
            $this->load->view('topo', $this->dados);
            $this->load->view($view);
            $this->load->view('base');
            $this->dados = Array(); /* Forçando a Limpeza */
       }
       
        public function setUsuario($dados){
            $this->session->set_userdata($this->chave, $this->encryption->encrypt(json_encode($dados)));
        }
       
       
        public function estaLogado(){
          return $this->session->has_userdata($this->chave);
        }
        
        public function deslogar(){
          $this->session->unset_userdata($this->chave);
        }
       
        public function getUsuarioId(){
            $url = site_url('home');
            if(!$this->session->has_userdata($this->chave)){
                redirect($url);
            }else{
                $sessao = json_decode($this->encryption->decrypt($this->session->userdata($this->chave)), True);
                return $sessao['UsuarioId'];
            }
        }
        
        public function getUsuarioLogin(){
            $url = site_url('home');
            if(!$this->session->has_userdata($this->chave)){
                redirect($url);
            }else{
                $sessao = json_decode($this->encryption->decrypt($this->session->userdata($this->chave)), True);
                return $sessao['Login'];
            }
        }
        
        public function getUsuarioEstatus(){
            $url = site_url('home');
            if(!$this->session->has_userdata($this->chave)){
                redirect($url);
            }else{
                $sessao = json_decode($this->encryption->decrypt($this->session->userdata($this->chave)), True);
                return $sessao['Estatus'] == 1;
            }
        }
	
	
        
        
}
