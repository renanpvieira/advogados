<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {
    
    
        public function __construct()
        {
               parent::__construct();
               $this->load->model('advogado_model', 'advogado');
               $this->load->model('usuario_model', 'usuario');
               $this->load->model('chave_model', 'chave');
        }
        
    
	
	public function index()
	{
           $this->displaySite('home');
        }
        
        
        public function chave($chave)
	{
            $res = $this->chave->buscarChave($chave);
            if(is_array($res)){
               $this->setDados('chave', $res['Chave']);  
               $this->displaySite('form-usuario');
            }else{
               $this->setDados('msg', 'Usuário não encontrado!');
               $this->displaySite('tela-mensagem');
            }
        }
        
        /*
        public function listarAtivos()
        {
            echo json_encode($this->advogado->listarTodosAtivos());
        }
        
        public function cadastro()
        {
            $post = $this->input->post();
            $this->form_validation->set_rules('Login', 'E-mail', 'trim|required|min_length[6]|max_length[255]|valid_email|is_unique[usuario.Login]');
            $this->form_validation->set_rules('Senha', 'Senha', 'trim|required|min_length[4]|max_length[10]');
            if ($this->form_validation->run())
            {
                $post['Senha'] = $this->encryption->encrypt($post['Senha']);
                $ret = $this->usuario->salvar($post);
                if($ret == 0){
                   $this->postResult(False, "Não foi possível cadastar esse usuário, tente mais tarde!");
                }else{
                   date_default_timezone_set('America/Sao_Paulo'); 
                   $chave = $ret . md5(uniqid(rand(), true)) . date("YmdHisu"); 
                   $dados = array('UsuarioId' => $ret, 'Chave' => $chave);
                   $ret = $this->chave->salvar($dados);
                   if($ret == 0){
                       $this->usuario->deletar($dados['UsuarioId']);
                       $this->postResult(False, "Não foi possível cadastar esse usuário, tente mais tarde!");
                   }else{
                       $this->postResult(True, "Cadastro realizado com sucesso! Em instantes você vai receber um E-mail de confirmação!"); 
                   }
                }
            }else{
              $this->postResult(False, validation_errors());
            }
        }
         * 
         */
        
        
        
}
