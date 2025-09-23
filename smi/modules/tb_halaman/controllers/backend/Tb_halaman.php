<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Halaman Controller
*| --------------------------------------------------------------------------
*| Tb Halaman site
*|
*/
class Tb_halaman extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_halaman');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Halamans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_halaman_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_halamans'] = $this->model_tb_halaman->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_halaman_counts'] = $this->model_tb_halaman->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_halaman/index/',
			'total_rows'   => $this->model_tb_halaman->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Halaman List');
		$this->render('backend/standart/administrator/tb_halaman/tb_halaman_list', $this->data);
	}
	
	/**
	* Add new tb_halamans
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_halaman_add');

		$this->template->title('Halaman New');
		$this->render('backend/standart/administrator/tb_halaman/tb_halaman_add', $this->data);
	}

	/**
	* Add New Tb Halamans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_halaman_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('judul_halaman', 'Judul Halaman', 'trim|required');
		$this->form_validation->set_rules('isi_halaman', 'Isi Halaman', 'trim|required');
		$this->form_validation->set_rules('kategori_halaman', 'Kategori Halaman', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('jenis_template', 'Jenis Template', 'trim|max_length[225]');
		$this->form_validation->set_rules('tb_halaman_gambar_halaman_name', 'Gambar Yg Disipkan', 'trim');
		

		if ($this->form_validation->run()) {
			$tb_halaman_gambar_halaman_uuid = $this->input->post('tb_halaman_gambar_halaman_uuid');
			$tb_halaman_gambar_halaman_name = $this->input->post('tb_halaman_gambar_halaman_name');
		
			$save_data = [
				'judul_halaman' => $this->input->post('judul_halaman'),
				'isi_halaman' => $this->input->post('isi_halaman'),
				'author_halaman' => get_user_data('username'),
				'kategori_halaman' => $this->input->post('kategori_halaman'),
				'jenis_template' => $this->input->post('jenis_template'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_halaman/')) {
				mkdir(FCPATH . '/uploads/tb_halaman/');
			}

			if (!empty($tb_halaman_gambar_halaman_name)) {
				$tb_halaman_gambar_halaman_name_copy = date('YmdHis') . '-' . $tb_halaman_gambar_halaman_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_halaman_gambar_halaman_uuid . '/' . $tb_halaman_gambar_halaman_name, 
						FCPATH . 'uploads/tb_halaman/' . $tb_halaman_gambar_halaman_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_halaman/' . $tb_halaman_gambar_halaman_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_halaman'] = $tb_halaman_gambar_halaman_name_copy;
			}
		
			
			$save_tb_halaman = $this->model_tb_halaman->store($save_data);
            

			if ($save_tb_halaman) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_halaman;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_halaman/edit/' . $save_tb_halaman, 'Edit Tb Halaman'),
						anchor('administrator/tb_halaman', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_halaman/edit/' . $save_tb_halaman, 'Edit Tb Halaman')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_halaman');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_halaman');
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
	* Update view Tb Halamans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_halaman_update');

		$this->data['tb_halaman'] = $this->model_tb_halaman->find($id);

		$this->template->title('Halaman Update');
		$this->render('backend/standart/administrator/tb_halaman/tb_halaman_update', $this->data);
	}

	/**
	* Update Tb Halamans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_halaman_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('judul_halaman', 'Judul Halaman', 'trim|required');
		$this->form_validation->set_rules('isi_halaman', 'Isi Halaman', 'trim|required');
		$this->form_validation->set_rules('kategori_halaman', 'Kategori Halaman', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('jenis_template', 'Jenis Template', 'trim|max_length[225]');
		$this->form_validation->set_rules('tb_halaman_gambar_halaman_name', 'Gambar Yg Disipkan', 'trim');
		
		if ($this->form_validation->run()) {
			$tb_halaman_gambar_halaman_uuid = $this->input->post('tb_halaman_gambar_halaman_uuid');
			$tb_halaman_gambar_halaman_name = $this->input->post('tb_halaman_gambar_halaman_name');
		
			$save_data = [
				'judul_halaman' => $this->input->post('judul_halaman'),
				'isi_halaman' => $this->input->post('isi_halaman'),
				'author_halaman' => get_user_data('username'),
				'kategori_halaman' => $this->input->post('kategori_halaman'),
				'jenis_template' => $this->input->post('jenis_template'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_halaman/')) {
				mkdir(FCPATH . '/uploads/tb_halaman/');
			}

			if (!empty($tb_halaman_gambar_halaman_uuid)) {
				$tb_halaman_gambar_halaman_name_copy = date('YmdHis') . '-' . $tb_halaman_gambar_halaman_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_halaman_gambar_halaman_uuid . '/' . $tb_halaman_gambar_halaman_name, 
						FCPATH . 'uploads/tb_halaman/' . $tb_halaman_gambar_halaman_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_halaman/' . $tb_halaman_gambar_halaman_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_halaman'] = $tb_halaman_gambar_halaman_name_copy;
			}
		
			
			$save_tb_halaman = $this->model_tb_halaman->change($id, $save_data);

			if ($save_tb_halaman) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/dashboard', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_halaman');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_halaman');
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
	* delete Tb Halamans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_halaman_delete');

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
            set_message(cclang('has_been_deleted', 'tb_halaman'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_halaman'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Halamans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_halaman_view');

		$this->data['tb_halaman'] = $this->model_tb_halaman->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Halaman Detail');
		$this->render('backend/standart/administrator/tb_halaman/tb_halaman_view', $this->data);
	}
	
	/**
	* delete Tb Halamans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_halaman = $this->model_tb_halaman->find($id);

		if (!empty($tb_halaman->gambar_halaman)) {
			$path = FCPATH . '/uploads/tb_halaman/' . $tb_halaman->gambar_halaman;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_halaman->remove($id);
	}
	
	/**
	* Upload Image Tb Halaman	* 
	* @return JSON
	*/
	public function upload_gambar_halaman_file()
	{
		if (!$this->is_allowed('tb_halaman_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_halaman',
			'allowed_types' => 'jpg|png|jpeg',
		]);
	}

	/**
	* Delete Image Tb Halaman	* 
	* @return JSON
	*/
	public function delete_gambar_halaman_file($uuid)
	{
		if (!$this->is_allowed('tb_halaman_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'gambar_halaman', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_halaman',
            'primary_key'       => 'id_halaman',
            'upload_path'       => 'uploads/tb_halaman/'
        ]);
	}

	/**
	* Get Image Tb Halaman	* 
	* @return JSON
	*/
	public function get_gambar_halaman_file($id)
	{
		if (!$this->is_allowed('tb_halaman_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_halaman = $this->model_tb_halaman->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'gambar_halaman', 
            'table_name'        => 'tb_halaman',
            'primary_key'       => 'id_halaman',
            'upload_path'       => 'uploads/tb_halaman/',
            'delete_endpoint'   => 'administrator/tb_halaman/delete_gambar_halaman_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_halaman_export');

		$this->model_tb_halaman->export('tb_halaman', 'tb_halaman');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_halaman_export');

		$this->model_tb_halaman->pdf('tb_halaman', 'tb_halaman');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_halaman_export');

		$table = $title = 'tb_halaman';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_halaman->find($id);
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


/* End of file tb_halaman.php */
/* Location: ./application/controllers/administrator/Tb Halaman.php */