<?php 
/**
 * 
 */
class Publikasi_model extends CI_Model
{
	//berita
	public function countberita(){
		$where['kategori_publikasi'] = 1;
		return $this->db->get_where('tb_publikasi',$where)->num_rows();
	}
	public function getallberita($limit,$start){
		$where['kategori_publikasi'] = 1;
		return $this->db->get_where('tb_publikasi',$where,$limit,$start)->result_array();
	}
	public function getnewberita($limit){
		$where['kategori_publikasi'] = 1;
		return $this->db->get_where('tb_publikasi',$where,$limit)->result_array();
	}
	public function getsingleberita($where){
		return $this->db->get_where('tb_publikasi',$where)->row_array();
	}

	//galery
	public function getgalery($limit,$start){
		return $this->db->get('tb_grup_galeri',$limit,$start)->result_array();
	}
	public function countgalery(){
		return $this->db->get('tb_grup_galeri')->num_rows();
	}
	public function getsinglegalery($where){
		$query = "SELECT * FROM `tb_galeri_kegiatan` a JOIN `tb_grup_galeri` b ON a.`grup_galeri` = b.`id_grup_kategori` WHERE a.`grup_galeri` = ".$where;
		return $this->db->query($query)->result_array();
	}
}