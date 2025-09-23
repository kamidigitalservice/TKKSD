<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller 
{

 	public function index()
	{
		$data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/selayang');
		$this->load->view('footer/footer');
	}

	public function selayang_pandang()
	{
        $data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/selayang');
		$this->load->view('footer/footer');
	}

	public function visi_misi()
	{
        $data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/visi');
		$this->load->view('footer/footer');
    }
    
    public function tugas_pokok()
	{
        $data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/tugas');
		$this->load->view('footer/footer');
    }
    public function sdm()
	{
        $data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/sumber');
		$this->load->view('footer/footer');
    }
    public function prestasi()
	{
        $data['tittle']='profil';
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('profil/prestasi');
		$this->load->view('footer/footer');
	}

}
 