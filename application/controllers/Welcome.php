<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
        public function __construct()
        {
               parent::__construct();
               $this->load->model('advogado_model', 'advogado');
               $this->load->model('usuario_model', 'usuario');
        }
        
         public function postResult($formValidate, $msg, $url = NULL){
           echo json_encode(array('formValidate' => $formValidate, 'msg' => $msg, 'url' => $url));
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
        
        public function cadastro()
        {
           // print_r(json_encode($this->advogado->listarTodosAtivos()));
            
            $post = $this->input->post();
            $this->form_validation->set_rules('Login', 'E-mail', 'trim|required|min_length[6]|max_length[255]|valid_email|is_unique[usuario.Login]');
            $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[4]|max_length[10]');
            if ($this->form_validation->run())
            {
                $post['Senha'] = $this->encryption->encrypt($post['Senha']);
                $ret = $this->usuario->salvar($post);
                if($ret == 0){
                   $this->postResult(False, "não foi possível cadastar esse usuário, tente mais tarde!");
                }else{
                   $this->postResult(True, "Cadastra realizado com sucesso! Em instantes você vai receber um E-mail de confirmação!"); 
                }
            }else{
              $this->postResult(False, validation_errors());
            }
            
            
        }
        
        
        
}
