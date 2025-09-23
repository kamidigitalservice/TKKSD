<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_hukum extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='ph';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('produk_hukum/ph');
		$this->load->view('footer/footer');
	}

	 

}
 