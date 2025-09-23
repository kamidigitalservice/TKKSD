<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Deskripsi Web Controller
*| --------------------------------------------------------------------------
*| Tb Deskripsi Web site
*|
*/
class Tb_deskripsi_web extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_deskripsi_web');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Deskripsi Webs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_deskripsi_web_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_deskripsi_webs'] = $this->model_tb_deskripsi_web->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_deskripsi_web_counts'] = $this->model_tb_deskripsi_web->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_deskripsi_web/index/',
			'total_rows'   => $this->model_tb_deskripsi_web->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Deskripsi Website List');
		$this->render('backend/standart/administrator/tb_deskripsi_web/tb_deskripsi_web_list', $this->data);
	}
	
	/**
	* Add new tb_deskripsi_webs
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_deskripsi_web_add');

		$this->template->title('Deskripsi Website New');
		$this->render('backend/standart/administrator/tb_deskripsi_web/tb_deskripsi_web_add', $this->data);
	}

	/**
	* Add New Tb Deskripsi Webs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_deskripsi_web_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_web', 'Nama Web', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('title_web', 'Title', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('deskripsi_web', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|max_length[123]');
		$this->form_validation->set_rules('tb_deskripsi_web_foto_kepala_name', 'Foto Kepala', 'trim');
		$this->form_validation->set_rules('nama_deveoper', 'Nama Developer', 'trim|max_length[123]');
		$this->form_validation->set_rules('tahun_bangun', 'Tahun Dibangun', 'trim|max_length[50]');
		$this->form_validation->set_rules('tb_deskripsi_web_ikon_web_name', 'Ikon Aplikasi', 'trim');
		$this->form_validation->set_rules('tb_deskripsi_web_logo_web_name', 'Logo Aplikasi', 'trim');
		

		if ($this->form_validation->run()) {
			$tb_deskripsi_web_foto_kepala_uuid = $this->input->post('tb_deskripsi_web_foto_kepala_uuid');
			$tb_deskripsi_web_foto_kepala_name = $this->input->post('tb_deskripsi_web_foto_kepala_name');
			$tb_deskripsi_web_ikon_web_uuid = $this->input->post('tb_deskripsi_web_ikon_web_uuid');
			$tb_deskripsi_web_ikon_web_name = $this->input->post('tb_deskripsi_web_ikon_web_name');
			$tb_deskripsi_web_logo_web_uuid = $this->input->post('tb_deskripsi_web_logo_web_uuid');
			$tb_deskripsi_web_logo_web_name = $this->input->post('tb_deskripsi_web_logo_web_name');
		
			$save_data = [
				'nama_web' => $this->input->post('nama_web'),
				'title_web' => $this->input->post('title_web'),
				'deskripsi_web' => $this->input->post('deskripsi_web'),
				'author' => $this->input->post('author'),
				'nama_kepala' => $this->input->post('nama_kepala'),
				'alamat' => $this->input->post('alamat'),
				'tlpon' => $this->input->post('tlpon'),
				'email' => $this->input->post('email'),
				'meta_tambahan' => $this->input->post('meta_tambahan'),
				'nama_deveoper' => $this->input->post('nama_deveoper'),
				'tahun_bangun' => $this->input->post('tahun_bangun'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_deskripsi_web/')) {
				mkdir(FCPATH . '/uploads/tb_deskripsi_web/');
			}

			if (!empty($tb_deskripsi_web_foto_kepala_name)) {
				$tb_deskripsi_web_foto_kepala_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_foto_kepala_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_foto_kepala_uuid . '/' . $tb_deskripsi_web_foto_kepala_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_foto_kepala_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_foto_kepala_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['foto_kepala'] = $tb_deskripsi_web_foto_kepala_name_copy;
			}
		
			if (!empty($tb_deskripsi_web_ikon_web_name)) {
				$tb_deskripsi_web_ikon_web_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_ikon_web_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_ikon_web_uuid . '/' . $tb_deskripsi_web_ikon_web_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_ikon_web_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_ikon_web_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['ikon_web'] = $tb_deskripsi_web_ikon_web_name_copy;
			}
		
			if (!empty($tb_deskripsi_web_logo_web_name)) {
				$tb_deskripsi_web_logo_web_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_logo_web_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_logo_web_uuid . '/' . $tb_deskripsi_web_logo_web_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_logo_web_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_logo_web_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo_web'] = $tb_deskripsi_web_logo_web_name_copy;
			}
		
			
			$save_tb_deskripsi_web = $this->model_tb_deskripsi_web->store($save_data);
            

			if ($save_tb_deskripsi_web) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_deskripsi_web;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_deskripsi_web/edit/' . $save_tb_deskripsi_web, 'Edit Tb Deskripsi Web'),
						anchor('administrator/tb_deskripsi_web', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_deskripsi_web/edit/' . $save_tb_deskripsi_web, 'Edit Tb Deskripsi Web')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_deskripsi_web');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_deskripsi_web');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Tb Deskripsi Webs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_deskripsi_web_update');

		$this->data['tb_deskripsi_web'] = $this->model_tb_deskripsi_web->find($id);

		$this->template->title('Deskripsi Website Update');
		$this->render('backend/standart/administrator/tb_deskripsi_web/tb_deskripsi_web_update', $this->data);
	}

	/**
	* Update Tb Deskripsi Webs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_deskripsi_web_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_web', 'Nama Web', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('title_web', 'Title', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('deskripsi_web', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|max_length[123]');
		$this->form_validation->set_rules('tb_deskripsi_web_foto_kepala_name', 'Foto Kepala', 'trim');
		$this->form_validation->set_rules('nama_deveoper', 'Nama Developer', 'trim|max_length[123]');
		$this->form_validation->set_rules('tahun_bangun', 'Tahun Dibangun', 'trim|max_length[50]');
		$this->form_validation->set_rules('tb_deskripsi_web_ikon_web_name', 'Ikon Aplikasi', 'trim');
		$this->form_validation->set_rules('tb_deskripsi_web_logo_web_name', 'Logo Aplikasi', 'trim');
		$this->form_validation->set_rules('status_api', 'Status Api', 'trim|max_length[2]');
		$this->form_validation->set_rules('apikey', 'Api key', 'trim|max_length[130]');
		$this->form_validation->set_rules('base_url_api', 'Base URL API', 'trim|max_length[220]');
		
		if ($this->form_validation->run()) {
			$tb_deskripsi_web_foto_kepala_uuid = $this->input->post('tb_deskripsi_web_foto_kepala_uuid');
			$tb_deskripsi_web_foto_kepala_name = $this->input->post('tb_deskripsi_web_foto_kepala_name');
			$tb_deskripsi_web_ikon_web_uuid = $this->input->post('tb_deskripsi_web_ikon_web_uuid');
			$tb_deskripsi_web_ikon_web_name = $this->input->post('tb_deskripsi_web_ikon_web_name');
			$tb_deskripsi_web_logo_web_uuid = $this->input->post('tb_deskripsi_web_logo_web_uuid');
			$tb_deskripsi_web_logo_web_name = $this->input->post('tb_deskripsi_web_logo_web_name');
		
			$save_data = [
				'nama_web' => $this->input->post('nama_web'),
				'title_web' => $this->input->post('title_web'),
				'deskripsi_web' => $this->input->post('deskripsi_web'),
				'author' => $this->input->post('author'),
				'nama_kepala' => $this->input->post('nama_kepala'),
				'alamat' => $this->input->post('alamat'),
				'tlpon' => $this->input->post('tlpon'),
				'email' => $this->input->post('email'),
				'meta_tambahan' => $this->input->post('meta_tambahan'),
				'nama_deveoper' => $this->input->post('nama_deveoper'),
				'tahun_bangun' => $this->input->post('tahun_bangun'),
				'api_key' => $this->input->post('base_url_api'),
				'status_api' => $this->input->post('status_api'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_deskripsi_web/')) {
				mkdir(FCPATH . '/uploads/tb_deskripsi_web/');
			}

			if (!empty($tb_deskripsi_web_foto_kepala_uuid)) {
				$tb_deskripsi_web_foto_kepala_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_foto_kepala_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_foto_kepala_uuid . '/' . $tb_deskripsi_web_foto_kepala_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_foto_kepala_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_foto_kepala_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['foto_kepala'] = $tb_deskripsi_web_foto_kepala_name_copy;
			}
		
			if (!empty($tb_deskripsi_web_ikon_web_uuid)) {
				$tb_deskripsi_web_ikon_web_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_ikon_web_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_ikon_web_uuid . '/' . $tb_deskripsi_web_ikon_web_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_ikon_web_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_ikon_web_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['ikon_web'] = $tb_deskripsi_web_ikon_web_name_copy;
			}
		
			if (!empty($tb_deskripsi_web_logo_web_uuid)) {
				$tb_deskripsi_web_logo_web_name_copy = date('YmdHis') . '-' . $tb_deskripsi_web_logo_web_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_deskripsi_web_logo_web_uuid . '/' . $tb_deskripsi_web_logo_web_name, 
						FCPATH . 'uploads/tb_deskripsi_web/' . $tb_deskripsi_web_logo_web_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web_logo_web_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo_web'] = $tb_deskripsi_web_logo_web_name_copy;
			}
		
			
			$save_tb_deskripsi_web = $this->model_tb_deskripsi_web->change($id, $save_data);

			if ($save_tb_deskripsi_web) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_deskripsi_web', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_deskripsi_web');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_deskripsi_web');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Tb Deskripsi Webs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_deskripsi_web_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'tb_deskripsi_web'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_deskripsi_web'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Deskripsi Webs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_deskripsi_web_view');

		$this->data['tb_deskripsi_web'] = $this->model_tb_deskripsi_web->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Deskripsi Website Detail');
		$this->render('backend/standart/administrator/tb_deskripsi_web/tb_deskripsi_web_view', $this->data);
	}
	
	/**
	* delete Tb Deskripsi Webs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_deskripsi_web = $this->model_tb_deskripsi_web->find($id);

		if (!empty($tb_deskripsi_web->foto_kepala)) {
			$path = FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web->foto_kepala;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($tb_deskripsi_web->ikon_web)) {
			$path = FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web->ikon_web;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($tb_deskripsi_web->logo_web)) {
			$path = FCPATH . '/uploads/tb_deskripsi_web/' . $tb_deskripsi_web->logo_web;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_deskripsi_web->remove($id);
	}
	
	/**
	* Upload Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function upload_foto_kepala_file()
	{
		if (!$this->is_allowed('tb_deskripsi_web_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_deskripsi_web',
			'allowed_types' => 'jpg|png|jpeg|gif',
		]);
	}

	/**
	* Delete Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function delete_foto_kepala_file($uuid)
	{
		if (!$this->is_allowed('tb_deskripsi_web_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'foto_kepala', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/'
        ]);
	}

	/**
	* Get Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function get_foto_kepala_file($id)
	{
		if (!$this->is_allowed('tb_deskripsi_web_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_deskripsi_web = $this->model_tb_deskripsi_web->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'foto_kepala', 
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/',
            'delete_endpoint'   => 'administrator/tb_deskripsi_web/delete_foto_kepala_file'
        ]);
	}
	
	/**
	* Upload Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function upload_ikon_web_file()
	{
		if (!$this->is_allowed('tb_deskripsi_web_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_deskripsi_web',
			'allowed_types' => 'jpg|png|jpeg|ico',
		]);
	}

	/**
	* Delete Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function delete_ikon_web_file($uuid)
	{
		if (!$this->is_allowed('tb_deskripsi_web_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'ikon_web', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/'
        ]);
	}

	/**
	* Get Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function get_ikon_web_file($id)
	{
		if (!$this->is_allowed('tb_deskripsi_web_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_deskripsi_web = $this->model_tb_deskripsi_web->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'ikon_web', 
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/',
            'delete_endpoint'   => 'administrator/tb_deskripsi_web/delete_ikon_web_file'
        ]);
	}
	
	/**
	* Upload Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function upload_logo_web_file()
	{
		if (!$this->is_allowed('tb_deskripsi_web_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_deskripsi_web',
			'allowed_types' => 'jpg|png|jpeg|ico',
		]);
	}

	/**
	* Delete Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function delete_logo_web_file($uuid)
	{
		if (!$this->is_allowed('tb_deskripsi_web_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'logo_web', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/'
        ]);
	}

	/**
	* Get Image Tb Deskripsi Web	* 
	* @return JSON
	*/
	public function get_logo_web_file($id)
	{
		if (!$this->is_allowed('tb_deskripsi_web_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_deskripsi_web = $this->model_tb_deskripsi_web->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'logo_web', 
            'table_name'        => 'tb_deskripsi_web',
            'primary_key'       => 'id_des_web',
            'upload_path'       => 'uploads/tb_deskripsi_web/',
            'delete_endpoint'   => 'administrator/tb_deskripsi_web/delete_logo_web_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_deskripsi_web_export');

		$this->model_tb_deskripsi_web->export('tb_deskripsi_web', 'tb_deskripsi_web');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_deskripsi_web_export');

		$this->model_tb_deskripsi_web->pdf('tb_deskripsi_web', 'tb_deskripsi_web');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_deskripsi_web_export');

		$table = $title = 'tb_deskripsi_web';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_deskripsi_web->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file tb_deskripsi_web.php */
/* Location: ./application/controllers/administrator/Tb Deskripsi Web.php */