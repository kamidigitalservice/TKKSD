<?php 
/**
 * 
 */
class M_kerjasama extends CI_Model
{
    public function get_all_dalam(){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_tkksd a JOIN tb_kategori_tkksd b ON a.kategori_tkksd=b.id_kat_tkksd where a.kategori_tkksd=9 or a.kategori_tkksd=8 or a.kategori_tkksd=7 or a.kategori_tkksd=6 order by a.jangka_wktu_awal DESC ")->result_array();
		return $data;
	}
	
	public function get_file_dalam($where){
		return $this->db->get_where('tb_tkksd',$where)->row_array();
	}
	
	public function get_np_dalam($where){
		return $this->db->query("SELECT * FROM tb_kategori_tkksd where id_kat_tkksd=$where ")->row_array();
	}
	
	 public function get_filter_dalam($where){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_tkksd a JOIN tb_kategori_tkksd b ON a.kategori_tkksd=b.id_kat_tkksd where a.kategori_tkksd=$where order by a.jangka_wktu_awal DESC  ")->result_array();
		return $data;
	}
	
	
	public function get_all_luar(){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_tkksd a JOIN tb_kategori_tkksd b ON a.kategori_tkksd=b.id_kat_tkksd where a.kategori_tkksd=3 or a.kategori_tkksd=4 or a.kategori_tkksd=5  order by a.jangka_wktu_awal DESC ")->result_array();
		return $data;
	}
	
	public function get_file_luar($where){
		return $this->db->get_where('tb_tkksd',$where)->row_array();
	}
	
	public function get_np_luar($where){
		return $this->db->query("SELECT * FROM tb_kategori_tkksd where id_kat_tkksd=$where ")->row_array();
	}
	
	 public function get_filter_luar($where){
		
		$data=$this->db->query("SELECT a.*, b.* FROM tb_tkksd a JOIN tb_kategori_tkksd b ON a.kategori_tkksd=b.id_kat_tkksd where a.kategori_tkksd=$where order by a.jangka_wktu_awal DESC ")->result_array();
		return $data;
	}
	
}