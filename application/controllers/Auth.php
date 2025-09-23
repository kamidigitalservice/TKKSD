<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{ 
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()== false)
		{
		$data['title'] = 'WPUU LOGIN';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
			
		} else
		{
			$this->_login();
		}
	}
	private function _login()
	{
		 $email = $this->input->post('email');
		 $password = $this->input->post('password');

		 $user= $this->db->get_where('user', ['email'=> $email])->row_array();
		 if($user){
		 	// jika user ada
		 	if($user['is_active']==1){
		 		// cek password
		 		if (password_verify($password, $user['password'])) {
		 			$data = [
		 				'email' => $user['email'],
		 				'role_id'=> $user['role_id']
		 			];
		 			$this->session->set_userdata($data);
		 			redirect('user');
		 		}else{
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
			redirect('auth');
		 		}


		 	}else{
		 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email Hase Not Been  Actived</div>');
			redirect('auth');	
		 	}

		 }else{
		 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Not Register </div>');
			redirect('auth');
		 }
	}
	public function registration()
	{ 
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This Email Already Register'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches'=> 'Password Dont Match !',
			'min_length'=> 'Password Too Short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run()==false) {
			
			$data['tittle']='auth';
		$data['data']=$this->m_berita->show_berita();
		$data['publikasi']=$this->m_berita->show_publikasi();
		$this->load->view('header/head');
		$this->load->view('header/menu', $data);
		$this->load->view('auth/auth');
		// $this->load->view('header/side1');
		$this->load->view('footer/footer');
			
		}
		else{
			$data = [
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your acount has been created. Please Login ! </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('rol_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged Out  ! </div>');
			redirect('auth');
	}

}
