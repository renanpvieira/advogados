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
               $this->load->model('usuario_model', 'usuario');
               $this->load->model('uf_model', 'uf');
               
               $scripts = Array('cadastro.js');
               $this->SetScript($scripts);
        }
        
    
	
	public function index()
	{
           $this->displaySite('home');
        }
        
        
        public function chave($chave)
	{
//            
//            $res = $this->usuario->buscarId(1);
//            
//            var_dump($res);
//            
//            if($res == null){
//               echo 'foi'; 
//            }
//            
//            
//            exit();
            
            /*
            date_default_timezone_set('America/Sao_Paulo'); 
            
            $this->load->library('email');
            
            
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mail.medefende.com.br';
            $config['smtp_user'] = 'atendimento@medefende.com.br';
            $config['smtp_port'] = '587';
            $config['smtp_pass'] = 'z9d3n7s9';
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            

            $this->email->initialize($config);

            $this->email->from('atendimento@medefende.com.br', 'me defende');
            $this->email->to('renanvieira@id.uff.br');
            

            $this->email->subject('Ei');
            $this->email->message('cccc testando');

            $res = $this->email->send();
            var_dump($res);
            
            
            exit();
            
             * 
             */
            
            $this->deslogar();
            
            $res = $this->chave->buscarChave($chave);
            if(is_array($res)){
               
               $usu = $this->usuario->buscarId($res['UsuarioId']);
               if($res != null){
                  $this->setUsuario($usu);
               }
               
               $this->editar();
            }else{
               $this->setDados('msg', 'Usuário não encontrado!');
               $this->displaySite('tela-mensagem');
            }
        }
        
        
        public function editar(){
           $mareas = array();
           $tela = 'form-usuario';
           
           /* Para carregar o array e nao fazer os ifs no form  */
           $this->setDados('advogado', $this->advogado->inicializa()); 
           
           if($this->estaLogado()){
              if($this->getUsuarioEstatus()){
                  $res = $this->advogado->buscarUsuarioId($this->getUsuarioId());
                  $mareas = $this->area->listarAdvogadoId($this->getUsuarioId()); 
                  $this->setDados('advogado', $res);
              }else{
                 $this->setDados('msg', 'Seu usuário está inativado!');
                 $tela = 'tela-mensagem';
              } 
           } 
            
            
           $areas = $this->area->listarTodos();
           $ufs = $this->uf->listarTodos();
           
           /* Carregando os checados Areas */
           if(count($mareas) > 0){
               for($i = 0; $i < count($areas); $i++){
                   for($j = 0; $j < count($mareas); $j++){
                       if($areas[$i]['AreaId'] == $mareas[$j]['AreaId']){
                          $areas[$i]['Checado'] = 'checked';
                       }
                   }
               }
           }
           
           /* Carregando os checados UF */
           if($res['UFId'] != 0){
               for($i = 0; $i < count($ufs); $i++){
                    if($res['UFId'] == $ufs[$i]['UFId']){
                          $ufs[$i]['Checado'] = 'selected';
                    }
               }
           }
           
           
           $tamanho = ceil(count($areas) / 3);
           $final = count($areas) - ($tamanho * 2);

           $this->setDados('areas1', array_slice($areas, 0, $tamanho));  
           $this->setDados('areas2', array_slice($areas, $tamanho, $tamanho));  
           $this->setDados('areas3', array_slice($areas, ($tamanho + $tamanho), ($tamanho + $tamanho + $final)));  
           $this->setDados('ufs', $ufs);
           
           //$this->displayDados();
           
           $this->displaySite($tela);
            
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
                
                if(!$this->estaLogado()){
                    $this->postResult(False, '<p>Houve um erro ao fazer o cadastro, tente mais tarde por favor!</p>');
                    exit();
                }
                
                $post['UsuarioId'] = $this->getUsuarioId();
                $areas = $post['areas'];
                unset($post['areas']); /* Removendo do POST */
                
                /* Removendo com o null para o where  */
                if(strlen($post['Latitude']) < 3){ $post['Latitude'] = null;   }
                if(strlen($post['Longitude']) < 3){ $post['Longitude'] = null;   }
                
                $res = $this->cidade->listarDescricao($post['Cidade'], $post['uf']);
                unset($post['Cidade']); /* Removendo do POST */
                unset($post['uf']);
                
                $post['CidadeId'] = 1;     /* Padrao caso nao ache a cidade */
                $post['AcheiCidade'] = 0;  /* Padra nao achou a cidade */
                
                if(count($res) >= 1){  /* se achou 1 ou mais cidades coloca a primeira  */
                   $post['CidadeId'] =  $res[0]['CidadeId']; 
                }
                
                if(count($res) == 1){ /* Caso uma cidade apenas na busca entao cachou a cidade*/
                   $post['AcheiCidade'] = 1;  /* Melhor dos Mundos */ 
                }
                
                unset($res);
                $res = $this->advogado->salvar($post);
                if($res > 1){
                    $dados = array();
                    foreach ($areas as $area){
                      array_push($dados, array('AdvogadoId' => $res, 'AreaId' =>  $area));
                    }
                    $this->area->deleteAdvogado($res);
                    $this->area->salvarBatch($dados);
                }
                
                $this->chave->inativaChave($ChaveId);
                $this->postResult(True, '<p>Seus dados foram salvos com sucesso!</p>');
                
            }else{
              $msg =  validation_errors();
              if(!array_key_exists("areas", $post)){
                  $msg =  $msg . '<p>Selecione pelo menos 1 área de atuação!</p>'; 
              }
              $this->postResult(False, $msg);
            }
        }
        
      
        
        
        
}

