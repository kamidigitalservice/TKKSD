<?php

class M_allberita extends CI_Model{

	public function hitungberita()
	{
		$where['kategori_publikasi']=1;
		return $this->db->get_where('tb_publikasi', $where)->num_rows();
	} 
	
    public function show_allberita($limit,$start){

        $where['kategori_publikasi']=1;
		// return $this->db->query("SELECT * FROM tb_publikasi where kategori_publikasi=1  ORDER BY created_at desc",$limit, $start)->result_array();

		// return $this->db->get_where('tb_publikasi',$where, $limit, $start)->result_array();

		 
		// $query = $this->db->order_by('created_at', 'DESC')->get_where($this->'tb_publikasi', $where $limit, $start);

		 // $this->db->order_by('created_at', 'DESC');
		 // return $this->db->get_where('tb_publikasi',order_by('created_at','desc'),$where, $limit, $start)->result_array();

		$query = $this->db->order_by('created_at', 'DESC')->get_where('tb_publikasi',$where, $limit, $start);
		return $query->result_array();

      }  
      
      
      public function hitunghasil()
      {
          
		$where['kategori_publikasi']=3;
		return $this->db->get_where('tb_publikasi', $where)->num_rows();
	} 
	
    public function show_allhasil($limit,$start){

        $where['kategori_publikasi']=3;
		// return $this->db->query("SELECT * FROM tb_publikasi where kategori_publikasi=1  ORDER BY created_at desc",$limit, $start)->result_array();

		// return $this->db->get_where('tb_publikasi',$where, $limit, $start)->result_array();

		 
		// $query = $this->db->order_by('created_at', 'DESC')->get_where($this->'tb_publikasi', $where $limit, $start);

		 // $this->db->order_by('created_at', 'DESC');
		 // return $this->db->get_where('tb_publikasi',order_by('created_at','desc'),$where, $limit, $start)->result_array();

		$query = $this->db->order_by('created_at', 'DESC')->get_where('tb_publikasi',$where, $limit, $start);
		return $query->result_array();

      }  
      

}