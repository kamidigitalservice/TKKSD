<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan extends CI_Controller 
{
	function __construct(){

            parent::__construct();

            $this->load->model('m_berita');

      }

 	public function index()
	{
		$data['tittle']='kelembagaan';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/urusan');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	public function urusan_pemerintah_daerah()
	{
        $data['tittle']='kelembagaan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/urusan');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	public function tata_pemerintahan()
	{
        $data['tittle']='kelembagaan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/tata');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    
    public function kerjasama_daerah()
	{
        $data['tittle']='kelembagaan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('kelembagaan/kerjasama');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
   

}
 