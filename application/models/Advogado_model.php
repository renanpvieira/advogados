<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advogado_model extends CI_Model {

	
   public function __construct()
   {
         parent::__construct();
                // Your own constructor code
   }
   
   public function inicializa(){
       return array('Nome' => '', 'Descricao' => '', 'OAB' => '', 'Telefone1' => '', 'Telefone2' => '', 'Whatszap' => '', 'Email' => '', 'Latitude' => '', 'Longitude' => '', 'Logradouro' => '', 'Numero' => '', 'Bairro' => '', 'Cidade' => '', 'UFId' => '0');
   }
 
   
   public function listarTodos(){
	return $this->db->get('advogado')->result_array();
   }
   
    public function listarTodosAtivos(){
        /*
	$this->db->select('usuario.UsuarioId, Latitude, Longitude, Nome,  advogado.Descricao, Telefone1, Telefone2, Whatszap, Email, OAB, Logradouro, Numero, Bairro, cidade.Descricao as Cidade, Sigla');
        $this->db->from('advogado');
        $this->db->join('usuario', 'advogado.UsuarioId = usuario.UsuarioId');
        $this->db->join('cidade', 'advogado.CidadeId = cidade.CidadeId');
        $this->db->join('uf', 'cidade.UFId = uf.UFId');
        $this->db->where('usuario.Estatus', 1);
         * 
         */
        return $this->db->query("select A.AdvogadoId, U.UsuarioId, Latitude, Longitude, Nome,  A.Descricao, Telefone1, Telefone2, Whatszap, Email, OAB, Logradouro, Numero, Bairro, C.Descricao as Cidade, Sigla, GROUP_CONCAT(R.Descricao SEPARATOR ', ') as Areas
                                from advogado A
                                inner join usuario U on A.UsuarioId = U.UsuarioId
                                inner join cidade C on A.CidadeId = C.CidadeId
                                inner join uf F on C.UFId = F.UFId  
                                left join advogado_area AA on AA.AdvogadoId = A.AdvogadoId
                                left join area  R on R.AreaId = AA.AreaId
                                where U.Estatus = 1 and A.Latitude is not null and A.Longitude is not null
                                GROUP BY A.AdvogadoId
                                order by  A.AdvogadoId Desc")->result_array();
    }
    
    public function salvar($dados){
       $this->db->insert('advogado', $dados);
       return (($this->db->affected_rows() > 0) ? $this->db->insert_id() : 0);
    }
    
    public function buscarUsuarioId($id){
        $this->db->select('Nome, advogado.Descricao, OAB, Telefone1, Telefone2, Whatszap, Email, Latitude, Longitude, Logradouro, Numero, Bairro, uf.UFId, cidade.Descricao as Cidade');
        $this->db->from('advogado');
        $this->db->join('cidade', 'advogado.CidadeId = cidade.CidadeId');
        $this->db->join('uf', 'cidade.UFId = uf.UFId');
        $this->db->where('advogado.UsuarioId', $id);
        return $this->db->get()->row_array();
    }
   
 
   
   
}
