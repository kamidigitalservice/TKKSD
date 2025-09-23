<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='publikasi';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('publikasi/publikasi');
		$this->load->view('footer/footer');
	}

	 

}
 