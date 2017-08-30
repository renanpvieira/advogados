<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chave_model extends CI_Model {

	
    public function __construct()
    {
         parent::__construct();
                // Your own constructor code
    }
 
   
 
   
    public function salvar($dados){
       $this->db->insert('chave', $dados);
       if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }
    
    
    public function buscarChave($chave){
        return $this->db->get_where('chave', array('Chave' => $chave, 'Estatus' => 0))->row_array();;
    }
    
    public function inativaChave($id){
        $this->db->where('ChaveId', $id)->update('chave', array('Estatus' => 1));
        return $this->db->affected_rows();
    }
    
    
   
 
   
   
}
