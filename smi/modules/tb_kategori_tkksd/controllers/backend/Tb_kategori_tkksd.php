<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kategori Tkksd Controller
*| --------------------------------------------------------------------------
*| Tb Kategori Tkksd site
*|
*/
class Tb_kategori_tkksd extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kategori_tkksd');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kategori Tkksds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kategori_tkksd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kategori_tkksds'] = $this->model_tb_kategori_tkksd->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kategori_tkksd_counts'] = $this->model_tb_kategori_tkksd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_kategori_tkksd/index/',
			'total_rows'   => $this->model_tb_kategori_tkksd->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori Tkksd List');
		$this->render('backend/standart/administrator/tb_kategori_tkksd/tb_kategori_tkksd_list', $this->data);
	}
	
	/**
	* Add new tb_kategori_tkksds
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kategori_tkksd_add');

		$this->template->title('Kategori Tkksd New');
		$this->render('backend/standart/administrator/tb_kategori_tkksd/tb_kategori_tkksd_add', $this->data);
	}

	/**
	* Add New Tb Kategori Tkksds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kategori_tkksd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_kat_tkksd', 'Nama Kategori', 'trim|required|max_length[125]');
		$this->form_validation->set_rules('deskripsi_kat_tkksd', 'Deskripsi', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_tkksd' => $this->input->post('nama_kat_tkksd'),
				'deskripsi_kat_tkksd' => $this->input->post('deskripsi_kat_tkksd'),
			];

			
			$save_tb_kategori_tkksd = $this->model_tb_kategori_tkksd->store($save_data);
            

			if ($save_tb_kategori_tkksd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kategori_tkksd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_kategori_tkksd/edit/' . $save_tb_kategori_tkksd, 'Edit Tb Kategori Tkksd'),
						anchor('administrator/tb_kategori_tkksd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_kategori_tkksd/edit/' . $save_tb_kategori_tkksd, 'Edit Tb Kategori Tkksd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_tkksd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_tkksd');
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
	* Update view Tb Kategori Tkksds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kategori_tkksd_update');

		$this->data['tb_kategori_tkksd'] = $this->model_tb_kategori_tkksd->find($id);

		$this->template->title('Kategori Tkksd Update');
		$this->render('backend/standart/administrator/tb_kategori_tkksd/tb_kategori_tkksd_update', $this->data);
	}

	/**
	* Update Tb Kategori Tkksds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kategori_tkksd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_kat_tkksd', 'Nama Kategori', 'trim|required|max_length[125]');
		$this->form_validation->set_rules('deskripsi_kat_tkksd', 'Deskripsi', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_tkksd' => $this->input->post('nama_kat_tkksd'),
				'deskripsi_kat_tkksd' => $this->input->post('deskripsi_kat_tkksd'),
			];

			
			$save_tb_kategori_tkksd = $this->model_tb_kategori_tkksd->change($id, $save_data);

			if ($save_tb_kategori_tkksd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_kategori_tkksd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_tkksd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_tkksd');
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
	* delete Tb Kategori Tkksds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kategori_tkksd_delete');

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
            set_message(cclang('has_been_deleted', 'tb_kategori_tkksd'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_kategori_tkksd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Kategori Tkksds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kategori_tkksd_view');

		$this->data['tb_kategori_tkksd'] = $this->model_tb_kategori_tkksd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori Tkksd Detail');
		$this->render('backend/standart/administrator/tb_kategori_tkksd/tb_kategori_tkksd_view', $this->data);
	}
	
	/**
	* delete Tb Kategori Tkksds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kategori_tkksd = $this->model_tb_kategori_tkksd->find($id);

		
		
		return $this->model_tb_kategori_tkksd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kategori_tkksd_export');

		$this->model_tb_kategori_tkksd->export('tb_kategori_tkksd', 'tb_kategori_tkksd');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kategori_tkksd_export');

		$this->model_tb_kategori_tkksd->pdf('tb_kategori_tkksd', 'tb_kategori_tkksd');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kategori_tkksd_export');

		$table = $title = 'tb_kategori_tkksd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kategori_tkksd->find($id);
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


/* End of file tb_kategori_tkksd.php */
/* Location: ./application/controllers/administrator/Tb Kategori Tkksd.php */