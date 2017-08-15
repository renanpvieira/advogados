<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
        public function __construct()
        {
               parent::__construct();
               $this->load->model('advogado_model', 'advogado');
        }

	
	public function index()
	{
            $dados['advs'] = $this->advogado->listarTodos();
            
            $this->load->view('welcome_message', $dados);
	}
        
        public function listarAtivos()
        {
           // print_r(json_encode($this->advogado->listarTodosAtivos()));
            
            echo json_encode($this->advogado->listarTodosAtivos());
        }
        
        
        
}
