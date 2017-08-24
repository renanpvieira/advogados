<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {
    
    
        public function __construct()
        {
               parent::__construct();
               $this->load->model('advogado_model', 'advogado');
               $this->load->model('usuario_model', 'usuario');
               $this->load->model('chave_model', 'chave');
               $this->load->model('area_model', 'area');
               $this->load->model('cidade_model', 'cidade');
               
               $scripts = Array('cadastro.js');
               $this->SetScript($scripts);
        }
        
    
	
	public function index()
	{
           $this->displaySite('home');
        }
        
        
        public function chave($chave)
	{
            $res = $this->chave->buscarChave($chave);
            if(is_array($res)){
                
               $areas = $this->area->listarTodos();
               $tamanho = ceil(count($areas) / 3);
               $final = count($areas) - ($tamanho * 2);
            
               $this->setDados('areas1', array_slice($areas, 0, $tamanho));  
               $this->setDados('areas2', array_slice($areas, $tamanho, $tamanho));  
               $this->setDados('areas3', array_slice($areas, ($tamanho + $tamanho), ($tamanho + $tamanho + $final)));  
               $this->setDados('chave', $res['Chave']);  
               $this->displaySite('form-usuario');
            }else{
               $this->setDados('msg', 'Usuário não encontrado!');
               $this->displaySite('tela-mensagem');
            }
            
        }
        
        public function salvar()
        {
            $post = $this->input->post();
            
            $this->form_validation->set_rules('Nome', 'Nome', 'trim|required|min_length[2]|max_length[60]');
            $this->form_validation->set_rules('Descricao', 'Descrição', 'trim|max_length[3000]');
            
            $this->form_validation->set_rules('Telefone1', 'Telefone', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('Telefone2', 'Telefone', 'trim|max_length[15]');
            $this->form_validation->set_rules('Whatszap', 'Whatszap', 'trim|max_length[15]');
            $this->form_validation->set_rules('Email', 'E-mail', 'trim|required|min_length[6]|max_length[255]|valid_email');
            $this->form_validation->set_rules('OAB', 'OAB', 'trim|max_length[15]');
            
            $this->form_validation->set_rules('Logradouro', 'Logradouro', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('Numero', 'Número', 'trim|max_length[12]');
            $this->form_validation->set_rules('Bairro', 'Bairro', 'trim|required|max_length[70]');
            $this->form_validation->set_rules('Cidade', 'Cidade', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('uf', 'UF', 'trim|required|max_length[2]');
            
            if (($this->form_validation->run()) && (array_key_exists("areas", $post)))
            {
                $areas = $post['areas'];
                unset($post['areas']); /* Removendo do POST */
                
                /* Removendo com o null para o where  */
                if(strlen($post['Latitude']) < 3){ $post['Latitude'] = null;   }
                if(strlen($post['Longitude']) < 3){ $post['Longitude'] = null;   }
                
                $res = $this->cidade->listarDescricao($post['Cidade'], $post['uf']);
                unset($post['Cidade']); /* Removendo do POST */
                unset($post['uf']);
                
                $post['CidadeId'] = 1;
                $post['AcheiCidade'] = 0;
                
                if(count($res) >= 1){
                   $post['CidadeId'] =  $res[0]['CidadeId']; 
                }
                
                if(count($res) == 1){
                   $post['AcheiCidade'] = 1;  /* Melhor dos Mundos */ 
                }
                
                unset($res);
                //$res = $this->advogado->salvar($post);
                $res = 5;
                if($res > 1){
                    $dados = array();
                    foreach ($areas as $area){
                      array_push($dados, array('AdvogadoId' => $res, 'AreaId' =>  $area));
                    }
                    $this->area->deleteAdvogado($res);
                    $this->area->salvarBatch($dados);
                }
                
                echo json_encode($dados);
                
                
            }else{
              $msg =  validation_errors();
              if(!array_key_exists("areas", $post)){
                  $msg =  $msg . '<p>Selecione pelo menos 1 área de atuação!</p>'; 
              }
              $this->postResult(False, $msg);
            }
          
            
            
            
            //$this->postResult(False, "<p>ggg</p>");
            
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
