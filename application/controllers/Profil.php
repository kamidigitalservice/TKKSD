<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller 
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
		$data['tittle']='profil';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/selayang');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	public function tkksd()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $this->load->model('m_profil');
        $data['tittle']='profil';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['profil']=$this->m_profil->show_tkksd();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/selayang');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	
    public function organisasi()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $this->load->model('m_profil');
        $data['tittle']='profil';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['profil']=$this->m_profil->show_organisasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/tugas');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    public function tupoksi()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $this->load->model('m_profil');
        $data['tittle']='profil';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['profil']=$this->m_profil->show_tupoksi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/sumber');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    public function prestasi()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
        $data['tittle']='profil';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/prestasi');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}
	
	public function visi_misi()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
        $data['tittle']='profil';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/visi');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    

}
 