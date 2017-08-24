<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advogado_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
 
   
   public function listarTodos(){
	return $this->db->get('advogado')->result_array();
   }
   
    public function listarTodosAtivos(){
	$this->db->select('usuario.UsuarioId, Latitude, Longitude, Nome,  Descricao, Telefone1, Telefone2, Whatszap, Email, OAB');
        $this->db->from('advogado');
        $this->db->join('usuario', 'advogado.UsuarioId = usuario.UsuarioId');
        $this->db->where('usuario.Estatus', 1);
        return $this->db->get()->result_array();
    }
    
    public function salvar($dados){
       $this->db->insert('advogado', $dados);
       return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
    }
   
 
   
   
}
