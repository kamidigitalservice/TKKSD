<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends CI_Controller 
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
		$data['tittle']='publikasi';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('publikasi/publikasi');
		$this->load->view('footer/footer');
	}

	 

}
 