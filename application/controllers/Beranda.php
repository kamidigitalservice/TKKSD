<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller 
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
	    $data['slide']=$this->m_index->get_slide();
	    $data['pintas']=$this->m_index->get_pintas();
		$data['data']=$this->m_berita->show_berita();
		$data['hasil']=$this->m_berita->show_hasil();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['api']=$this->m_berita->show_api();
		
// 		$data['api1']=file_get_contents('$api');
// 		var_dump($data['api1']);
// 		die;
		
		$data['tittle']='beranda';
		$this->load->view('header/head', $data);
		$this->load->view('header/menu'); 
		$this->load->view('beranda/index');
		$this->load->view('footer/footer');
	}

	
}
 