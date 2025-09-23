<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Sosmed Controller
*| --------------------------------------------------------------------------
*| Tb Sosmed site
*|
*/
class Tb_sosmed extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_sosmed');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Sosmeds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_sosmed_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_sosmeds'] = $this->model_tb_sosmed->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_sosmed_counts'] = $this->model_tb_sosmed->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_sosmed/index/',
			'total_rows'   => $this->model_tb_sosmed->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Sosial Media List');
		$this->render('backend/standart/administrator/tb_sosmed/tb_sosmed_list', $this->data);
	}
	
	/**
	* Add new tb_sosmeds
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_sosmed_add');

		$this->template->title('Sosial Media New');
		$this->render('backend/standart/administrator/tb_sosmed/tb_sosmed_add', $this->data);
	}

	/**
	* Add New Tb Sosmeds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_sosmed_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_sosmed', 'Nama Sosmed', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('link_url', 'Link URL', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('tb_sosmed_logo_gambar_name', 'Gambar Logo', 'trim|required|max_length[123]');
		

		if ($this->form_validation->run()) {
			$tb_sosmed_logo_gambar_uuid = $this->input->post('tb_sosmed_logo_gambar_uuid');
			$tb_sosmed_logo_gambar_name = $this->input->post('tb_sosmed_logo_gambar_name');
		
			$save_data = [
				'nama_sosmed' => $this->input->post('nama_sosmed'),
				'link_url' => $this->input->post('link_url'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_sosmed/')) {
				mkdir(FCPATH . '/uploads/tb_sosmed/');
			}

			if (!empty($tb_sosmed_logo_gambar_name)) {
				$tb_sosmed_logo_gambar_name_copy = date('YmdHis') . '-' . $tb_sosmed_logo_gambar_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_sosmed_logo_gambar_uuid . '/' . $tb_sosmed_logo_gambar_name, 
						FCPATH . 'uploads/tb_sosmed/' . $tb_sosmed_logo_gambar_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_sosmed/' . $tb_sosmed_logo_gambar_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo_gambar'] = $tb_sosmed_logo_gambar_name_copy;
			}
		
			
			$save_tb_sosmed = $this->model_tb_sosmed->store($save_data);
            

			if ($save_tb_sosmed) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_sosmed;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_sosmed/edit/' . $save_tb_sosmed, 'Edit Tb Sosmed'),
						anchor('administrator/tb_sosmed', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_sosmed/edit/' . $save_tb_sosmed, 'Edit Tb Sosmed')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_sosmed');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_sosmed');
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
	* Update view Tb Sosmeds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_sosmed_update');

		$this->data['tb_sosmed'] = $this->model_tb_sosmed->find($id);

		$this->template->title('Sosial Media Update');
		$this->render('backend/standart/administrator/tb_sosmed/tb_sosmed_update', $this->data);
	}

	/**
	* Update Tb Sosmeds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_sosmed_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_sosmed', 'Nama Sosmed', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('link_url', 'Link URL', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('tb_sosmed_logo_gambar_name', 'Gambar Logo', 'trim|required|max_length[123]');
		
		if ($this->form_validation->run()) {
			$tb_sosmed_logo_gambar_uuid = $this->input->post('tb_sosmed_logo_gambar_uuid');
			$tb_sosmed_logo_gambar_name = $this->input->post('tb_sosmed_logo_gambar_name');
		
			$save_data = [
				'nama_sosmed' => $this->input->post('nama_sosmed'),
				'link_url' => $this->input->post('link_url'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_sosmed/')) {
				mkdir(FCPATH . '/uploads/tb_sosmed/');
			}

			if (!empty($tb_sosmed_logo_gambar_uuid)) {
				$tb_sosmed_logo_gambar_name_copy = date('YmdHis') . '-' . $tb_sosmed_logo_gambar_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_sosmed_logo_gambar_uuid . '/' . $tb_sosmed_logo_gambar_name, 
						FCPATH . 'uploads/tb_sosmed/' . $tb_sosmed_logo_gambar_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_sosmed/' . $tb_sosmed_logo_gambar_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo_gambar'] = $tb_sosmed_logo_gambar_name_copy;
			}
		
			
			$save_tb_sosmed = $this->model_tb_sosmed->change($id, $save_data);

			if ($save_tb_sosmed) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_sosmed', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_sosmed');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_sosmed');
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
	* delete Tb Sosmeds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_sosmed_delete');

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
            set_message(cclang('has_been_deleted', 'tb_sosmed'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_sosmed'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Sosmeds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_sosmed_view');

		$this->data['tb_sosmed'] = $this->model_tb_sosmed->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Sosial Media Detail');
		$this->render('backend/standart/administrator/tb_sosmed/tb_sosmed_view', $this->data);
	}
	
	/**
	* delete Tb Sosmeds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_sosmed = $this->model_tb_sosmed->find($id);

		if (!empty($tb_sosmed->logo_gambar)) {
			$path = FCPATH . '/uploads/tb_sosmed/' . $tb_sosmed->logo_gambar;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_sosmed->remove($id);
	}
	
	/**
	* Upload Image Tb Sosmed	* 
	* @return JSON
	*/
	public function upload_logo_gambar_file()
	{
		if (!$this->is_allowed('tb_sosmed_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_sosmed',
		]);
	}

	/**
	* Delete Image Tb Sosmed	* 
	* @return JSON
	*/
	public function delete_logo_gambar_file($uuid)
	{
		if (!$this->is_allowed('tb_sosmed_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'logo_gambar', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_sosmed',
            'primary_key'       => 'id_sosmed',
            'upload_path'       => 'uploads/tb_sosmed/'
        ]);
	}

	/**
	* Get Image Tb Sosmed	* 
	* @return JSON
	*/
	public function get_logo_gambar_file($id)
	{
		if (!$this->is_allowed('tb_sosmed_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_sosmed = $this->model_tb_sosmed->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'logo_gambar', 
            'table_name'        => 'tb_sosmed',
            'primary_key'       => 'id_sosmed',
            'upload_path'       => 'uploads/tb_sosmed/',
            'delete_endpoint'   => 'administrator/tb_sosmed/delete_logo_gambar_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_sosmed_export');

		$this->model_tb_sosmed->export('tb_sosmed', 'tb_sosmed');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_sosmed_export');

		$this->model_tb_sosmed->pdf('tb_sosmed', 'tb_sosmed');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_sosmed_export');

		$table = $title = 'tb_sosmed';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_sosmed->find($id);
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


/* End of file tb_sosmed.php */
/* Location: ./application/controllers/administrator/Tb Sosmed.php */