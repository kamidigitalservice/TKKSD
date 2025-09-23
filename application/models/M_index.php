<?php

class M_index extends CI_Model{

      public function get_slide(){
		
		$data=$this->db->query("SELECT * FROM tb_slider ")->result_array();
		return $data;
	}
	
	public function get_des(){
		
		$data=$this->db->query("SELECT * FROM tb_deskripsi_web where id_des_web=1")->row_array();
		return $data;
	}
	
	public function get_pintas(){
		
		$data=$this->db->query("SELECT * FROM tb_menu_pintas ")->result_array();
		return $data;
	}
	public function get_sosmed(){
		
		$data=$this->db->query("SELECT * FROM tb_sosmed ")->result_array();
		return $data;
	}

}