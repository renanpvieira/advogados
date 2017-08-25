<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
 
   /*
    public function listarTodos(){
       return $this->db->get('usuario')->result_array();
    }
    * 
    */
 
   
    public function salvar($dados){
       $this->db->insert('usuario', $dados);
       if($this->db->affected_rows() == 1){
         return $this->db->insert_id();
       }else{
         return 0; 
       }
    }
    
    public function deletar($id){
       $this->db->delete('usuario', array('UsuarioId' => $id));
       return $this->db->affected_rows(); 
    }
    
    public function buscarId($id){
        return $this->db->get_where('usuario', array('UsuarioId' => $id))->row_array();
    }
   
 
   
   
}
