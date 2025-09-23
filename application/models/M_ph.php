<?php 
/**
 * 
 */
class M_ph extends CI_Model
{
    public function getallph(){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_file_publikasi a JOIN tb_kategori_file b ON a.kategori_file_pub=b.id_kat_file  ")->result_array();
		return $data;
	}
	
	public function getfile($where){
		return $this->db->get_where('tb_file_publikasi',$where)->row_array();
	}
	
	public function getnp($where){
		return $this->db->query("SELECT * FROM tb_kategori_file where id_kat_file=$where ")->row_array();
	}
	
	 public function getfilter($where){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_file_publikasi a JOIN tb_kategori_file b ON a.kategori_file_pub=b.id_kat_file where a.kategori_file_pub=$where  ")->result_array();
		return $data;
	}
	
	
}