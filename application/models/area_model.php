<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
 
   
   public function listarTodos(){
	return $this->db->get('area')->result_array();
   }
   
   public function salvarBatch($dados){
	$this->db->insert_batch('advogado-area', $dados);
   }
   
   public function deleteAdvogado($id){
	$$this->db->where('AdvogadoId', $id);
        $this->db->delete('advogado-area');
   }
   
    
   
   
   
 
   
   
}
