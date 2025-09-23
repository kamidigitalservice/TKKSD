<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb File Publikasi Controller
*| --------------------------------------------------------------------------
*| Tb File Publikasi site
*|
*/
class Tb_file_publikasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_file_publikasi');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb File Publikasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_file_publikasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_file_publikasis'] = $this->model_tb_file_publikasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_file_publikasi_counts'] = $this->model_tb_file_publikasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_file_publikasi/index/',
			'total_rows'   => $this->model_tb_file_publikasi->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Publikasi Dokumen List');
		$this->render('backend/standart/administrator/tb_file_publikasi/tb_file_publikasi_list', $this->data);
	}
	
	/**
	* Add new tb_file_publikasis
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_file_publikasi_add');

		$this->template->title('Publikasi Dokumen New');
		$this->render('backend/standart/administrator/tb_file_publikasi/tb_file_publikasi_add', $this->data);
	}

	/**
	* Add New Tb File Publikasis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_file_publikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('judul_file_pub', 'Judul File Dokumentasi', 'trim|required');
		$this->form_validation->set_rules('kategori_file_pub', 'Jenis Dokumen', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('tb_file_publikasi_file_pub_name', 'File Upload', 'trim|required');
		$this->form_validation->set_rules('sumber', 'Sumber', 'trim|max_length[225]');
		

		if ($this->form_validation->run()) {
			$tb_file_publikasi_file_pub_uuid = $this->input->post('tb_file_publikasi_file_pub_uuid');
			$tb_file_publikasi_file_pub_name = $this->input->post('tb_file_publikasi_file_pub_name');
		
			$save_data = [
				'judul_file_pub' => $this->input->post('judul_file_pub'),
				'kategori_file_pub' => $this->input->post('kategori_file_pub'),
				'deskripsi_pub' => $this->input->post('deskripsi_pub'),
				'sumber' => $this->input->post('sumber'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_file_publikasi/')) {
				mkdir(FCPATH . '/uploads/tb_file_publikasi/');
			}

			if (!empty($tb_file_publikasi_file_pub_name)) {
				$tb_file_publikasi_file_pub_name_copy = date('YmdHis') . '-' . $tb_file_publikasi_file_pub_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_file_publikasi_file_pub_uuid . '/' . $tb_file_publikasi_file_pub_name, 
						FCPATH . 'uploads/tb_file_publikasi/' . $tb_file_publikasi_file_pub_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_file_publikasi/' . $tb_file_publikasi_file_pub_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_pub'] = $tb_file_publikasi_file_pub_name_copy;
			}
		
			
			$save_tb_file_publikasi = $this->model_tb_file_publikasi->store($save_data);
            

			if ($save_tb_file_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_file_publikasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_file_publikasi/edit/' . $save_tb_file_publikasi, 'Edit Tb File Publikasi'),
						anchor('administrator/tb_file_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_file_publikasi/edit/' . $save_tb_file_publikasi, 'Edit Tb File Publikasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_file_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_file_publikasi');
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
	* Update view Tb File Publikasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_file_publikasi_update');

		$this->data['tb_file_publikasi'] = $this->model_tb_file_publikasi->find($id);

		$this->template->title('Publikasi Dokumen Update');
		$this->render('backend/standart/administrator/tb_file_publikasi/tb_file_publikasi_update', $this->data);
	}

	/**
	* Update Tb File Publikasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_file_publikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('judul_file_pub', 'Judul File Dokumentasi', 'trim|required');
		$this->form_validation->set_rules('kategori_file_pub', 'Jenis Dokumen', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('tb_file_publikasi_file_pub_name', 'File Upload', 'trim|required');
		$this->form_validation->set_rules('sumber', 'Sumber', 'trim|max_length[225]');
		
		if ($this->form_validation->run()) {
			$tb_file_publikasi_file_pub_uuid = $this->input->post('tb_file_publikasi_file_pub_uuid');
			$tb_file_publikasi_file_pub_name = $this->input->post('tb_file_publikasi_file_pub_name');
		
			$save_data = [
				'judul_file_pub' => $this->input->post('judul_file_pub'),
				'kategori_file_pub' => $this->input->post('kategori_file_pub'),
				'deskripsi_pub' => $this->input->post('deskripsi_pub'),
				'sumber' => $this->input->post('sumber'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_file_publikasi/')) {
				mkdir(FCPATH . '/uploads/tb_file_publikasi/');
			}

			if (!empty($tb_file_publikasi_file_pub_uuid)) {
				$tb_file_publikasi_file_pub_name_copy = date('YmdHis') . '-' . $tb_file_publikasi_file_pub_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_file_publikasi_file_pub_uuid . '/' . $tb_file_publikasi_file_pub_name, 
						FCPATH . 'uploads/tb_file_publikasi/' . $tb_file_publikasi_file_pub_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_file_publikasi/' . $tb_file_publikasi_file_pub_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_pub'] = $tb_file_publikasi_file_pub_name_copy;
			}
		
			
			$save_tb_file_publikasi = $this->model_tb_file_publikasi->change($id, $save_data);

			if ($save_tb_file_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_file_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_file_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_file_publikasi');
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
	* delete Tb File Publikasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_file_publikasi_delete');

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
            set_message(cclang('has_been_deleted', 'tb_file_publikasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_file_publikasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb File Publikasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_file_publikasi_view');

		$this->data['tb_file_publikasi'] = $this->model_tb_file_publikasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Publikasi Dokumen Detail');
		$this->render('backend/standart/administrator/tb_file_publikasi/tb_file_publikasi_view', $this->data);
	}
	
	/**
	* delete Tb File Publikasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_file_publikasi = $this->model_tb_file_publikasi->find($id);

		if (!empty($tb_file_publikasi->file_pub)) {
			$path = FCPATH . '/uploads/tb_file_publikasi/' . $tb_file_publikasi->file_pub;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_file_publikasi->remove($id);
	}
	
	/**
	* Upload Image Tb File Publikasi	* 
	* @return JSON
	*/
	public function upload_file_pub_file()
	{
		if (!$this->is_allowed('tb_file_publikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_file_publikasi',
		]);
	}

	/**
	* Delete Image Tb File Publikasi	* 
	* @return JSON
	*/
	public function delete_file_pub_file($uuid)
	{
		if (!$this->is_allowed('tb_file_publikasi_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file_pub', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_file_publikasi',
            'primary_key'       => 'id_file_publikasi',
            'upload_path'       => 'uploads/tb_file_publikasi/'
        ]);
	}

	/**
	* Get Image Tb File Publikasi	* 
	* @return JSON
	*/
	public function get_file_pub_file($id)
	{
		if (!$this->is_allowed('tb_file_publikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_file_publikasi = $this->model_tb_file_publikasi->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file_pub', 
            'table_name'        => 'tb_file_publikasi',
            'primary_key'       => 'id_file_publikasi',
            'upload_path'       => 'uploads/tb_file_publikasi/',
            'delete_endpoint'   => 'administrator/tb_file_publikasi/delete_file_pub_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_file_publikasi_export');

		$this->model_tb_file_publikasi->export('tb_file_publikasi', 'tb_file_publikasi');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_file_publikasi_export');

		$this->model_tb_file_publikasi->pdf('tb_file_publikasi', 'tb_file_publikasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_file_publikasi_export');

		$table = $title = 'tb_file_publikasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_file_publikasi->find($id);
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


/* End of file tb_file_publikasi.php */
/* Location: ./application/controllers/administrator/Tb File Publikasi.php */