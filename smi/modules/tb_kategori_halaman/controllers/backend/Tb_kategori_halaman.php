<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kategori Halaman Controller
*| --------------------------------------------------------------------------
*| Tb Kategori Halaman site
*|
*/
class Tb_kategori_halaman extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kategori_halaman');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kategori Halamans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kategori_halaman_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kategori_halamans'] = $this->model_tb_kategori_halaman->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kategori_halaman_counts'] = $this->model_tb_kategori_halaman->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_kategori_halaman/index/',
			'total_rows'   => $this->model_tb_kategori_halaman->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori Halaman List');
		$this->render('backend/standart/administrator/tb_kategori_halaman/tb_kategori_halaman_list', $this->data);
	}
	
	/**
	* Add new tb_kategori_halamans
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kategori_halaman_add');

		$this->template->title('Kategori Halaman New');
		$this->render('backend/standart/administrator/tb_kategori_halaman/tb_kategori_halaman_add', $this->data);
	}

	/**
	* Add New Tb Kategori Halamans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kategori_halaman_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_kategori_halaman', 'Kategori Halaman', 'trim|required|max_length[225]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kategori_halaman' => $this->input->post('nama_kategori_halaman'),
				'ket_kategori_halaman' => $this->input->post('ket_kategori_halaman'),
			];

			
			$save_tb_kategori_halaman = $this->model_tb_kategori_halaman->store($save_data);
            

			if ($save_tb_kategori_halaman) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kategori_halaman;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_kategori_halaman/edit/' . $save_tb_kategori_halaman, 'Edit Tb Kategori Halaman'),
						anchor('administrator/tb_kategori_halaman', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_kategori_halaman/edit/' . $save_tb_kategori_halaman, 'Edit Tb Kategori Halaman')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_halaman');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_halaman');
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
	* Update view Tb Kategori Halamans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kategori_halaman_update');

		$this->data['tb_kategori_halaman'] = $this->model_tb_kategori_halaman->find($id);

		$this->template->title('Kategori Halaman Update');
		$this->render('backend/standart/administrator/tb_kategori_halaman/tb_kategori_halaman_update', $this->data);
	}

	/**
	* Update Tb Kategori Halamans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kategori_halaman_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_kategori_halaman', 'Kategori Halaman', 'trim|required|max_length[225]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kategori_halaman' => $this->input->post('nama_kategori_halaman'),
				'ket_kategori_halaman' => $this->input->post('ket_kategori_halaman'),
			];

			
			$save_tb_kategori_halaman = $this->model_tb_kategori_halaman->change($id, $save_data);

			if ($save_tb_kategori_halaman) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_kategori_halaman', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_halaman');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_halaman');
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
	* delete Tb Kategori Halamans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kategori_halaman_delete');

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
            set_message(cclang('has_been_deleted', 'tb_kategori_halaman'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_kategori_halaman'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Kategori Halamans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kategori_halaman_view');

		$this->data['tb_kategori_halaman'] = $this->model_tb_kategori_halaman->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori Halaman Detail');
		$this->render('backend/standart/administrator/tb_kategori_halaman/tb_kategori_halaman_view', $this->data);
	}
	
	/**
	* delete Tb Kategori Halamans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kategori_halaman = $this->model_tb_kategori_halaman->find($id);

		
		
		return $this->model_tb_kategori_halaman->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kategori_halaman_export');

		$this->model_tb_kategori_halaman->export('tb_kategori_halaman', 'tb_kategori_halaman');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kategori_halaman_export');

		$this->model_tb_kategori_halaman->pdf('tb_kategori_halaman', 'tb_kategori_halaman');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kategori_halaman_export');

		$table = $title = 'tb_kategori_halaman';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kategori_halaman->find($id);
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


/* End of file tb_kategori_halaman.php */
/* Location: ./application/controllers/administrator/Tb Kategori Halaman.php */