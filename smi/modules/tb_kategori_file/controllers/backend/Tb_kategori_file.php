<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kategori File Controller
*| --------------------------------------------------------------------------
*| Tb Kategori File site
*|
*/
class Tb_kategori_file extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kategori_file');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kategori Files
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kategori_file_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kategori_files'] = $this->model_tb_kategori_file->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kategori_file_counts'] = $this->model_tb_kategori_file->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_kategori_file/index/',
			'total_rows'   => $this->model_tb_kategori_file->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori File List');
		$this->render('backend/standart/administrator/tb_kategori_file/tb_kategori_file_list', $this->data);
	}
	
	/**
	* Add new tb_kategori_files
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kategori_file_add');

		$this->template->title('Kategori File New');
		$this->render('backend/standart/administrator/tb_kategori_file/tb_kategori_file_add', $this->data);
	}

	/**
	* Add New Tb Kategori Files
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kategori_file_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_kat_file', 'Nama Kategori', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_file' => $this->input->post('nama_kat_file'),
				'deskripsi_kat_file' => $this->input->post('deskripsi_kat_file'),
			];

			
			$save_tb_kategori_file = $this->model_tb_kategori_file->store($save_data);
            

			if ($save_tb_kategori_file) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kategori_file;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_kategori_file/edit/' . $save_tb_kategori_file, 'Edit Tb Kategori File'),
						anchor('administrator/tb_kategori_file', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_kategori_file/edit/' . $save_tb_kategori_file, 'Edit Tb Kategori File')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_file');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_file');
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
	* Update view Tb Kategori Files
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kategori_file_update');

		$this->data['tb_kategori_file'] = $this->model_tb_kategori_file->find($id);

		$this->template->title('Kategori File Update');
		$this->render('backend/standart/administrator/tb_kategori_file/tb_kategori_file_update', $this->data);
	}

	/**
	* Update Tb Kategori Files
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kategori_file_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_kat_file', 'Nama Kategori', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_file' => $this->input->post('nama_kat_file'),
				'deskripsi_kat_file' => $this->input->post('deskripsi_kat_file'),
			];

			
			$save_tb_kategori_file = $this->model_tb_kategori_file->change($id, $save_data);

			if ($save_tb_kategori_file) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_kategori_file', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_file');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_file');
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
	* delete Tb Kategori Files
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kategori_file_delete');

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
            set_message(cclang('has_been_deleted', 'tb_kategori_file'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_kategori_file'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Kategori Files
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kategori_file_view');

		$this->data['tb_kategori_file'] = $this->model_tb_kategori_file->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori File Detail');
		$this->render('backend/standart/administrator/tb_kategori_file/tb_kategori_file_view', $this->data);
	}
	
	/**
	* delete Tb Kategori Files
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kategori_file = $this->model_tb_kategori_file->find($id);

		
		
		return $this->model_tb_kategori_file->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kategori_file_export');

		$this->model_tb_kategori_file->export('tb_kategori_file', 'tb_kategori_file');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kategori_file_export');

		$this->model_tb_kategori_file->pdf('tb_kategori_file', 'tb_kategori_file');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kategori_file_export');

		$table = $title = 'tb_kategori_file';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kategori_file->find($id);
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


/* End of file tb_kategori_file.php */
/* Location: ./application/controllers/administrator/Tb Kategori File.php */