<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends CI_Controller 
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
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$this->load->model('m_kerjasama');
		$data['all_kerjasama']=$this->m_kerjasama->get_all_dalam();
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/dalam');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	
	public function detail_dalam()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$where['id_tkksd'] = $this->uri->segment(3);
		$this->load->model('m_kerjasama');
		$data['get_file_dalam']=$this->m_kerjasama->get_file_dalam($where);
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/detail_dalam');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	
	public function filter_dalam()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$where = $this->uri->segment(3);
		$this->load->model('m_kerjasama');
		$data['get_filter_dalam']=$this->m_kerjasama->get_filter_dalam($where);
		$data['np']=$this->m_kerjasama->get_np_dalam($where);
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/filter_dalam');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
    public function luar()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$this->load->model('m_kerjasama');
		$data['all_kerjasama']=$this->m_kerjasama->get_all_luar();
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/luar');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	public function filter_luar()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$where = $this->uri->segment(3);
		$this->load->model('m_kerjasama');
		$data['get_filter_luar']=$this->m_kerjasama->get_filter_dalam($where);
		$data['np']=$this->m_kerjasama->get_np_luar($where);
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/filter_luar');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	public function detail_luar()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
		$data['tittle']='kerjasama';
		
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$where['id_tkksd'] = $this->uri->segment(3);
		$this->load->model('m_kerjasama');
		$data['get_file_luar']=$this->m_kerjasama->get_file_luar($where);
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kerjasama/detail_luar');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	 

}
 