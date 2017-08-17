<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller  extends CI_Controller {
    
       private $dados = Array();
    
       public function __construct()
       {
            parent::__construct();
       }
        
       public function postResult($formValidate, $msg, $url = NULL)
       {
         echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'url' => $url));
       }
        
       public function setDados($key, $d)
       {
          $this->dados[$key] = $d;
       }
       
       public function displaySite($view)
       {
            $this->load->view('topo', $this->dados);
            $this->load->view($view);
            $this->load->view('base');
            $this->dados = Array(); /* Forçando a Limpeza */
       }
	
	
        
        
        
}
