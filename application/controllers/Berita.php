<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller 
{

 	public function index()
	{
		$this->load->library('pagination');
		$this->load->model('m_allberita');
		$config['base_url']=base_url('berita/index');
		$config['total_rows']=$this->m_allberita->hitungberita();
		$config['per_page']=6;
		$config['full_tag_open']= '<ul class="styled-pagination mb-30" style="margin-top: 10px;">';
		$config['full_tag_close']= '</ul>';
		$config['num_tag_open']='<li>';
		$config['num_tag_close']='</li>';
		
		$config['first_tag_open']='<li>';
        $config['first_tag_close']='</li>';
        $config['first_link']='&laquo';
        
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['last_link']='&raquo';

		$config['next_link']='<span class="fas fa-angle-right"></span>';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';

		$config['prev_link']='<span class="fas fa-angle-left"></span>';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';

		$config['cur_tag_open']= '<li> <a class="active" href="#">';
		$config['cur_tag_close']= '</a></li>';

		// $config['attributes'] = array('class' => 'active');

		$this->pagination->initialize($config);
		if ($this->uri->segment(4)) {
			$data['start']=0;
		}
		else{
			$data['start']=$this->uri->segment(3);
		}
		$data['berita']=$this->m_allberita->show_allberita($config['per_page'], $data['start']);
		
		$this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();

		$data['tittle']='berita';
		$data['total_berita']=$this->m_allberita->hitungberita();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('berita/berita');
		$this->load->view('footer/footer');
	}
	public function detail()
	{
// 		$id=$this->uri->segment(3);
// 		echo($id);
// 		$data['isi']=$this->db->query("SELECT * FROM tb_publikasi where id_publikasi=$id  ");
// 		return $data;
// 		var_dum('$data');
// 		echo ($isi['deskripsi_publikasi']);
// 		echo($data);


        $where['id_publikasi'] = $this->uri->segment(3);
		$this->load->model('Publikasi_model');
		$data['berita'] = $this->Publikasi_model->getsingleberita($where);
// 		$data['recent']	= $this->Publikasi_model->getnewberita(3);

		 $this->load->model('m_berita');
        $data['tittle']='berita';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('berita/detail');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
        
        	
	    
	}

	 

}
 