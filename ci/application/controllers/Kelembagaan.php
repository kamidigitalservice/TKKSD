<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='kelembagaan';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/urusan');
		$this->load->view('footer/footer');
	}

	public function urusan_pemerintah_daerah()
	{
        $data['tittle']='kelembagaan';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/urusan');
		$this->load->view('footer/footer');
	}

	public function tata_pemerintahan()
	{
        $data['tittle']='kelembagaan';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/tata');
		$this->load->view('footer/footer');
    }
    
    public function kerjasama_daerah()
	{
        $data['tittle']='kelembagaan';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/kerjasama');
		$this->load->view('footer/footer');
    }
   

}
 