<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller 
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
	    
		$data['tittle']='layanan';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		
		$this->load->library('form_validation');
		
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/konsultasi');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
	}

	public function konsultasi()
	{
	    
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('jenis', 'Jenis', 'required',[
			'required'=> 'Mohon Pilih Salasatu Jenis Konsultasi' 
		]);
	    $this->form_validation->set_rules('nama', 'Nama', 'required',[
			'required'=> 'Mohon Mengisi Form Nama' 
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required'=> 'Mohon isi Form Email',
			'valid_email'=> 'Mohon Isi Email Dengan Format yang Sesuai'
		]);
		$this->form_validation->set_rules('tlp', 'Tlp', 'required',[
			'required'=> 'Mohon Mengisi Form No Telpon' 
		]);
		$this->form_validation->set_rules('judul', 'Judul', 'required',[
			'required'=> 'Mohon Mengisi Form Judul Konsultasi' 
		]);
		$this->form_validation->set_rules('isi', 'Isi', 'required',[
			'required'=> 'Mohon Mengisi Form Isian dari Konsultasi Anda' 
		]);
		
		if ($this->form_validation->run()==false) {
		
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    
	    $this->load->model('m_profil');
        $data['tittle']='layanan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['profil']=$this->m_profil->show_tkksd();
		
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/konsultasi');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
		    
		}
		else
		{
			
			$captcha_response = trim($this->input->post('g-recaptcha-response'));
				
				if ($captcha_response != '') 
				{
				$keySecret = '6LfIQjsaAAAAAEhL2cBrfmFfaaj7qkVG1YfEQ5WU';
				$check = array(
					'secret' 	=> $keySecret,
					'response' 	=> $this->input->post('g-recaptcha-response'),
				);
				$startProcess = curl_init();
				curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
				curl_setopt($startProcess, CURLOPT_POST, true);
				curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
				curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
				$receiveData = curl_exec($startProcess);

				$finalResponse = json_decode($receiveData, true);

					if ($finalResponse['success']) {

					$data = [
					        'jenis_konsultasi' => $this->input->post('jenis', true),
							'nama_konsultasi' => $this->input->post('nama', true),
							'email_konsultasi' => $this->input->post('email', true),
							'tlp_konsultasi' => $this->input->post('jenis', true),
							'judul_konsultasi' => $this->input->post('nama', true),
							'isi_konsultasi' => $this->input->post('email', true)
							
						];
			    	$this->db->insert('tb_konsultasi', $data);
			    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Konsultasi Telah Dikirimkan, Terimakasih telah menggunakan layanan kami ! </div>');
			    	redirect('layanan/konsultasi');
					}
					else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Validasi Captcha Gagal Silahkan Coba Lagi ! </div>');
			    	redirect('layanan/konsultasi');
					}
				
				}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Validasi Captcha Harap Diisi Silahkan Coba Lagi ! </div>');
			    	redirect('layanan/konsultasi');
				}
			}
						
	}

	public function pihak_k3()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
	    $this->load->model('m_layanan');
        $data['tittle']='layanan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['layanan']=$this->m_layanan->show_ksdpk();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/k3');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    
    public function dengan_daerah()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
        $this->load->model('m_layanan');
        $data['tittle']='layanan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['layanan']=$this->m_layanan->show_ksdd();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/ksdd');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    public function sinergitas()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
        $this->load->model('m_layanan');
        $data['tittle']='layanan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['layanan']=$this->m_layanan->show_sinergitas();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/sinergitas');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }
    public function luar_negeri()
	{
	    $this->load->model('m_index');
	    $data['d11']=$this->m_index->get_des();
	    $data['sosmed']=$this->m_index->get_sosmed();
        $this->load->model('m_layanan');
        $data['tittle']='layanan';
        $data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$data['layanan']=$this->m_layanan->show_ln();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('layanan/ln');
		$this->load->view('header/side1');
		$this->load->view('footer/footer');
    }

}
 