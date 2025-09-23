<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_hukum extends CI_Controller 
{
	function __construct(){

            parent::__construct();

            $this->load->model('m_berita');

      }

 	public function index()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='ph';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->model('m_ph');
		$data['allph']=$this->m_ph->getallph();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('produk_hukum/ph');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	public function detail_ph()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $where['id_file_publikasi'] = $this->uri->segment(3);
		
		$this->load->model('m_ph');
		$data['file']=$this->m_ph->getfile($where);
		
		$this->load->view('produk_hukum/detail_ph', $data);
		
	}
	
	public function filter()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $where = $this->uri->segment(3);
		$data['tittle']='ph';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->model('m_ph');
		$data['file']=$this->m_ph->getfilter($where);
		$data['np']=$this->m_ph->getnp($where);
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('produk_hukum/filter');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	 

}
 