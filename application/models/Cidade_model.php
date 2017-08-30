<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
 
   
   public function listarDescricao($descricao, $uf){
        $this->db->select('CidadeId');
        $this->db->from('cidade');
        $this->db->join('uf', 'cidade.UFId = uf.UFId');
        $this->db->where('uf.UFId', $uf);
        $this->db->like('cidade.Descricao', $descricao);
        return $this->db->get()->result_array();
   }
   
   
   
 
   
   
}
