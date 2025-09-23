<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Publikasi Controller
*| --------------------------------------------------------------------------
*| Tb Publikasi site
*|
*/
class Tb_publikasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_publikasi');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Publikasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_publikasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_publikasis'] = $this->model_tb_publikasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_publikasi_counts'] = $this->model_tb_publikasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_publikasi/index/',
			'total_rows'   => $this->model_tb_publikasi->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Publikasi Informasi List');
		$this->render('backend/standart/administrator/tb_publikasi/tb_publikasi_list', $this->data);
	}
	
	/**
	* Add new tb_publikasis
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_publikasi_add');

		$this->template->title('Publikasi Informasi New');
		$this->render('backend/standart/administrator/tb_publikasi/tb_publikasi_add', $this->data);
	}

	/**
	* Add New Tb Publikasis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_publikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kategori_publikasi', 'Kategori', 'trim|required|max_length[123]');
		$this->form_validation->set_rules('judul_publikasi', 'Judul', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('deskripsi_publikasi', 'Isi Konten', 'trim|required');
		$this->form_validation->set_rules('author_publikasi', 'Author', 'trim|max_length[225]');
		$this->form_validation->set_rules('sumber_publikasi', 'Sumber Publikasi', 'trim|max_length[225]');
		

		if ($this->form_validation->run()) {
			$tb_publikasi_gambar_publikasi_uuid = $this->input->post('tb_publikasi_gambar_publikasi_uuid');
			$tb_publikasi_gambar_publikasi_name = $this->input->post('tb_publikasi_gambar_publikasi_name');
		
			$save_data = [
				'kategori_publikasi' => $this->input->post('kategori_publikasi'),
				'judul_publikasi' => $this->input->post('judul_publikasi'),
				'deskripsi_publikasi' => $this->input->post('deskripsi_publikasi'),
				'author_publikasi' => $this->input->post('author_publikasi'),
				'sumber_publikasi' => $this->input->post('sumber_publikasi'),
				'aktif_publikasi' => $this->input->post('aktif_publikasi'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_publikasi/')) {
				mkdir(FCPATH . '/uploads/tb_publikasi/');
			}

			if (!empty($tb_publikasi_gambar_publikasi_name)) {
				$tb_publikasi_gambar_publikasi_name_copy = date('YmdHis') . '-' . $tb_publikasi_gambar_publikasi_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_publikasi_gambar_publikasi_uuid . '/' . $tb_publikasi_gambar_publikasi_name, 
						FCPATH . 'uploads/tb_publikasi/' . $tb_publikasi_gambar_publikasi_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_publikasi/' . $tb_publikasi_gambar_publikasi_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_publikasi'] = $tb_publikasi_gambar_publikasi_name_copy;
			}
		
			
			$save_tb_publikasi = $this->model_tb_publikasi->store($save_data);
            

			if ($save_tb_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_publikasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_publikasi/edit/' . $save_tb_publikasi, 'Edit Tb Publikasi'),
						anchor('administrator/tb_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_publikasi/edit/' . $save_tb_publikasi, 'Edit Tb Publikasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_publikasi');
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
	* Update view Tb Publikasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_publikasi_update');

		$this->data['tb_publikasi'] = $this->model_tb_publikasi->find($id);

		$this->template->title('Publikasi Informasi Update');
		$this->render('backend/standart/administrator/tb_publikasi/tb_publikasi_update', $this->data);
	}

	/**
	* Update Tb Publikasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_publikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('kategori_publikasi', 'Kategori', 'trim|required|max_length[123]');
		$this->form_validation->set_rules('judul_publikasi', 'Judul', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('deskripsi_publikasi', 'Isi Konten', 'trim|required');
		$this->form_validation->set_rules('author_publikasi', 'Author', 'trim|max_length[225]');
		$this->form_validation->set_rules('sumber_publikasi', 'Sumber Publikasi', 'trim|max_length[225]');
		
		if ($this->form_validation->run()) {
			$tb_publikasi_gambar_publikasi_uuid = $this->input->post('tb_publikasi_gambar_publikasi_uuid');
			$tb_publikasi_gambar_publikasi_name = $this->input->post('tb_publikasi_gambar_publikasi_name');
		
			$save_data = [
				'kategori_publikasi' => $this->input->post('kategori_publikasi'),
				'judul_publikasi' => $this->input->post('judul_publikasi'),
				'deskripsi_publikasi' => $this->input->post('deskripsi_publikasi'),
				'author_publikasi' => $this->input->post('author_publikasi'),
				'sumber_publikasi' => $this->input->post('sumber_publikasi'),
				'aktif_publikasi' => $this->input->post('aktif_publikasi'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_publikasi/')) {
				mkdir(FCPATH . '/uploads/tb_publikasi/');
			}

			if (!empty($tb_publikasi_gambar_publikasi_uuid)) {
				$tb_publikasi_gambar_publikasi_name_copy = date('YmdHis') . '-' . $tb_publikasi_gambar_publikasi_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_publikasi_gambar_publikasi_uuid . '/' . $tb_publikasi_gambar_publikasi_name, 
						FCPATH . 'uploads/tb_publikasi/' . $tb_publikasi_gambar_publikasi_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_publikasi/' . $tb_publikasi_gambar_publikasi_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_publikasi'] = $tb_publikasi_gambar_publikasi_name_copy;
			}
		
			
			$save_tb_publikasi = $this->model_tb_publikasi->change($id, $save_data);

			if ($save_tb_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_publikasi');
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
	* delete Tb Publikasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_publikasi_delete');

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
            set_message(cclang('has_been_deleted', 'tb_publikasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_publikasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Publikasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_publikasi_view');

		$this->data['tb_publikasi'] = $this->model_tb_publikasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Publikasi Informasi Detail');
		$this->render('backend/standart/administrator/tb_publikasi/tb_publikasi_view', $this->data);
	}
	
	/**
	* delete Tb Publikasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_publikasi = $this->model_tb_publikasi->find($id);

		if (!empty($tb_publikasi->gambar_publikasi)) {
			$path = FCPATH . '/uploads/tb_publikasi/' . $tb_publikasi->gambar_publikasi;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_publikasi->remove($id);
	}
	
	/**
	* Upload Image Tb Publikasi	* 
	* @return JSON
	*/
	public function upload_gambar_publikasi_file()
	{
		if (!$this->is_allowed('tb_publikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_publikasi',
		]);
	}

	/**
	* Delete Image Tb Publikasi	* 
	* @return JSON
	*/
	public function delete_gambar_publikasi_file($uuid)
	{
		if (!$this->is_allowed('tb_publikasi_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'gambar_publikasi', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_publikasi',
            'primary_key'       => 'id_publikasi',
            'upload_path'       => 'uploads/tb_publikasi/'
        ]);
	}

	/**
	* Get Image Tb Publikasi	* 
	* @return JSON
	*/
	public function get_gambar_publikasi_file($id)
	{
		if (!$this->is_allowed('tb_publikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_publikasi = $this->model_tb_publikasi->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'gambar_publikasi', 
            'table_name'        => 'tb_publikasi',
            'primary_key'       => 'id_publikasi',
            'upload_path'       => 'uploads/tb_publikasi/',
            'delete_endpoint'   => 'administrator/tb_publikasi/delete_gambar_publikasi_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_publikasi_export');

		$this->model_tb_publikasi->export('tb_publikasi', 'tb_publikasi');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_publikasi_export');

		$this->model_tb_publikasi->pdf('tb_publikasi', 'tb_publikasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_publikasi_export');

		$table = $title = 'tb_publikasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_publikasi->find($id);
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


/* End of file tb_publikasi.php */
/* Location: ./application/controllers/administrator/Tb Publikasi.php */