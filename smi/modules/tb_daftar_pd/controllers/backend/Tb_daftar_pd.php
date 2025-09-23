<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Daftar Pd Controller
*| --------------------------------------------------------------------------
*| Tb Daftar Pd site
*|
*/
class Tb_daftar_pd extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_daftar_pd');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Daftar Pds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_daftar_pd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_daftar_pds'] = $this->model_tb_daftar_pd->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_daftar_pd_counts'] = $this->model_tb_daftar_pd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_daftar_pd/index/',
			'total_rows'   => $this->model_tb_daftar_pd->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Daftar Perangkat Daerah List');
		$this->render('backend/standart/administrator/tb_daftar_pd/tb_daftar_pd_list', $this->data);
	}
	
	/**
	* Add new tb_daftar_pds
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_daftar_pd_add');

		$this->template->title('Daftar Perangkat Daerah New');
		$this->render('backend/standart/administrator/tb_daftar_pd/tb_daftar_pd_add', $this->data);
	}

	/**
	* Add New Tb Daftar Pds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_daftar_pd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_pede', 'Nama Perangkat Daerah', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('singkatan_pede', 'Singkatan OPD', 'trim|required|max_length[225]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pede' => $this->input->post('nama_pede'),
				'singkatan_pede' => $this->input->post('singkatan_pede'),
				'deskripsi_pede' => $this->input->post('deskripsi_pede'),
				'alamat_pede' => $this->input->post('alamat_pede'),
			];

			
			$save_tb_daftar_pd = $this->model_tb_daftar_pd->store($save_data);
            

			if ($save_tb_daftar_pd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_daftar_pd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_daftar_pd/edit/' . $save_tb_daftar_pd, 'Edit Tb Daftar Pd'),
						anchor('administrator/tb_daftar_pd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_daftar_pd/edit/' . $save_tb_daftar_pd, 'Edit Tb Daftar Pd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_daftar_pd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_daftar_pd');
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
	* Update view Tb Daftar Pds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_daftar_pd_update');

		$this->data['tb_daftar_pd'] = $this->model_tb_daftar_pd->find($id);

		$this->template->title('Daftar Perangkat Daerah Update');
		$this->render('backend/standart/administrator/tb_daftar_pd/tb_daftar_pd_update', $this->data);
	}

	/**
	* Update Tb Daftar Pds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_daftar_pd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_pede', 'Nama Perangkat Daerah', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('singkatan_pede', 'Singkatan OPD', 'trim|required|max_length[225]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pede' => $this->input->post('nama_pede'),
				'singkatan_pede' => $this->input->post('singkatan_pede'),
				'deskripsi_pede' => $this->input->post('deskripsi_pede'),
				'alamat_pede' => $this->input->post('alamat_pede'),
			];

			
			$save_tb_daftar_pd = $this->model_tb_daftar_pd->change($id, $save_data);

			if ($save_tb_daftar_pd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_daftar_pd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_daftar_pd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_daftar_pd');
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
	* delete Tb Daftar Pds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_daftar_pd_delete');

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
            set_message(cclang('has_been_deleted', 'tb_daftar_pd'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_daftar_pd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Daftar Pds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_daftar_pd_view');

		$this->data['tb_daftar_pd'] = $this->model_tb_daftar_pd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Daftar Perangkat Daerah Detail');
		$this->render('backend/standart/administrator/tb_daftar_pd/tb_daftar_pd_view', $this->data);
	}
	
	/**
	* delete Tb Daftar Pds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_daftar_pd = $this->model_tb_daftar_pd->find($id);

		
		
		return $this->model_tb_daftar_pd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_daftar_pd_export');

		$this->model_tb_daftar_pd->export('tb_daftar_pd', 'tb_daftar_pd');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_daftar_pd_export');

		$this->model_tb_daftar_pd->pdf('tb_daftar_pd', 'tb_daftar_pd');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_daftar_pd_export');

		$table = $title = 'tb_daftar_pd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_daftar_pd->find($id);
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


/* End of file tb_daftar_pd.php */
/* Location: ./application/controllers/administrator/Tb Daftar Pd.php */