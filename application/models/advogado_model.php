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
   
 
   
   
}
