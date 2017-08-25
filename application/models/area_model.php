<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
 
   
   public function listarTodos(){
	return $this->db->select(" *, '' AS Checado")->get('area')->result_array();
   }
   
   public function listarAdvogadoId($id){
	$this->db->select("Area.AreaId, Descricao");
        $this->db->from('advogado_area');
        $this->db->join('area', 'area.AreaId = advogado_area.AreaId');
        $this->db->where('advogado_area.AdvogadoId', $id);
        return $this->db->get()->result_array();
   }
   
   public function salvarBatch($dados){
	$this->db->insert_batch('advogado_area', $dados);
   }
   
   public function deleteAdvogado($id){
	$this->db->where('AdvogadoId', $id);
        $this->db->delete('advogado_area');
   }
   
   
}
