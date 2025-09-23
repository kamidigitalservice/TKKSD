<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='berita';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('berita/berita');
		$this->load->view('footer/footer');
	}
	public function detail()
	{
		$id=$this->uri->segment(3);
		echo($id);
	}

	 

}
 