<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Slider Controller
*| --------------------------------------------------------------------------
*| Tb Slider site
*|
*/
class Tb_slider extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_slider');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Sliders
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_slider_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_sliders'] = $this->model_tb_slider->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_slider_counts'] = $this->model_tb_slider->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_slider/index/',
			'total_rows'   => $this->model_tb_slider->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Gambar Slider List');
		$this->render('backend/standart/administrator/tb_slider/tb_slider_list', $this->data);
	}
	
	/**
	* Add new tb_sliders
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_slider_add');

		$this->template->title('Gambar Slider New');
		$this->render('backend/standart/administrator/tb_slider/tb_slider_add', $this->data);
	}

	/**
	* Add New Tb Sliders
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_slider_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('tb_slider_gambar_slider_name', 'Gambar Slider', 'trim|required|max_length[123]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[50]');
		

		if ($this->form_validation->run()) {
			$tb_slider_gambar_slider_uuid = $this->input->post('tb_slider_gambar_slider_uuid');
			$tb_slider_gambar_slider_name = $this->input->post('tb_slider_gambar_slider_name');
		
			$save_data = [
				'status' => $this->input->post('status'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_slider/')) {
				mkdir(FCPATH . '/uploads/tb_slider/');
			}

			if (!empty($tb_slider_gambar_slider_name)) {
				$tb_slider_gambar_slider_name_copy = date('YmdHis') . '-' . $tb_slider_gambar_slider_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_slider_gambar_slider_uuid . '/' . $tb_slider_gambar_slider_name, 
						FCPATH . 'uploads/tb_slider/' . $tb_slider_gambar_slider_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_slider/' . $tb_slider_gambar_slider_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_slider'] = $tb_slider_gambar_slider_name_copy;
			}
		
			
			$save_tb_slider = $this->model_tb_slider->store($save_data);
            

			if ($save_tb_slider) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_slider;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_slider/edit/' . $save_tb_slider, 'Edit Tb Slider'),
						anchor('administrator/tb_slider', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_slider/edit/' . $save_tb_slider, 'Edit Tb Slider')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_slider');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_slider');
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
	* Update view Tb Sliders
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_slider_update');

		$this->data['tb_slider'] = $this->model_tb_slider->find($id);

		$this->template->title('Gambar Slider Update');
		$this->render('backend/standart/administrator/tb_slider/tb_slider_update', $this->data);
	}

	/**
	* Update Tb Sliders
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_slider_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('tb_slider_gambar_slider_name', 'Gambar Slider', 'trim|required|max_length[123]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[50]');
		
		if ($this->form_validation->run()) {
			$tb_slider_gambar_slider_uuid = $this->input->post('tb_slider_gambar_slider_uuid');
			$tb_slider_gambar_slider_name = $this->input->post('tb_slider_gambar_slider_name');
		
			$save_data = [
				'status' => $this->input->post('status'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_slider/')) {
				mkdir(FCPATH . '/uploads/tb_slider/');
			}

			if (!empty($tb_slider_gambar_slider_uuid)) {
				$tb_slider_gambar_slider_name_copy = date('YmdHis') . '-' . $tb_slider_gambar_slider_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_slider_gambar_slider_uuid . '/' . $tb_slider_gambar_slider_name, 
						FCPATH . 'uploads/tb_slider/' . $tb_slider_gambar_slider_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_slider/' . $tb_slider_gambar_slider_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_slider'] = $tb_slider_gambar_slider_name_copy;
			}
		
			
			$save_tb_slider = $this->model_tb_slider->change($id, $save_data);

			if ($save_tb_slider) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_slider', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_slider');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_slider');
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
	* delete Tb Sliders
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_slider_delete');

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
            set_message(cclang('has_been_deleted', 'tb_slider'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_slider'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Sliders
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_slider_view');

		$this->data['tb_slider'] = $this->model_tb_slider->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Gambar Slider Detail');
		$this->render('backend/standart/administrator/tb_slider/tb_slider_view', $this->data);
	}
	
	/**
	* delete Tb Sliders
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_slider = $this->model_tb_slider->find($id);

		if (!empty($tb_slider->gambar_slider)) {
			$path = FCPATH . '/uploads/tb_slider/' . $tb_slider->gambar_slider;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_slider->remove($id);
	}
	
	/**
	* Upload Image Tb Slider	* 
	* @return JSON
	*/
	public function upload_gambar_slider_file()
	{
		if (!$this->is_allowed('tb_slider_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_slider',
		]);
	}

	/**
	* Delete Image Tb Slider	* 
	* @return JSON
	*/
	public function delete_gambar_slider_file($uuid)
	{
		if (!$this->is_allowed('tb_slider_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'gambar_slider', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_slider',
            'primary_key'       => 'id_slider',
            'upload_path'       => 'uploads/tb_slider/'
        ]);
	}

	/**
	* Get Image Tb Slider	* 
	* @return JSON
	*/
	public function get_gambar_slider_file($id)
	{
		if (!$this->is_allowed('tb_slider_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_slider = $this->model_tb_slider->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'gambar_slider', 
            'table_name'        => 'tb_slider',
            'primary_key'       => 'id_slider',
            'upload_path'       => 'uploads/tb_slider/',
            'delete_endpoint'   => 'administrator/tb_slider/delete_gambar_slider_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_slider_export');

		$this->model_tb_slider->export('tb_slider', 'tb_slider');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_slider_export');

		$this->model_tb_slider->pdf('tb_slider', 'tb_slider');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_slider_export');

		$table = $title = 'tb_slider';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_slider->find($id);
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


/* End of file tb_slider.php */
/* Location: ./application/controllers/administrator/Tb Slider.php */