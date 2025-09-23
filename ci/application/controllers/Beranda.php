<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='beranda';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data); 
		$this->load->view('beranda/index');
		$this->load->view('footer/footer');
	}

	
}
 