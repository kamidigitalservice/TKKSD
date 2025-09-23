<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Konsultasi Controller
*| --------------------------------------------------------------------------
*| Tb Konsultasi site
*|
*/
class Tb_konsultasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_konsultasi');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Konsultasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_konsultasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_konsultasis'] = $this->model_tb_konsultasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_konsultasi_counts'] = $this->model_tb_konsultasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_konsultasi/index/',
			'total_rows'   => $this->model_tb_konsultasi->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Konsultasi List');
		$this->render('backend/standart/administrator/tb_konsultasi/tb_konsultasi_list', $this->data);
	}
	
	
		/**
	* Update view Tb Konsultasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_konsultasi_update');

		$this->data['tb_konsultasi'] = $this->model_tb_konsultasi->find($id);

		$this->template->title('Konsultasi Update');
		$this->render('backend/standart/administrator/tb_konsultasi/tb_konsultasi_update', $this->data);
	}

	/**
	* Update Tb Konsultasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_konsultasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('jenis_konsultasi', 'Jenis', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('nama_konsultasi', 'Nama ', 'trim|max_length[128]');
		$this->form_validation->set_rules('email_konsultasi', 'Email', 'trim|max_length[128]');
		$this->form_validation->set_rules('tlp_konsultasi', 'No Telp', 'trim|max_length[45]');
		$this->form_validation->set_rules('judul_konsultasi', 'Judul', 'trim|max_length[150]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'jenis_konsultasi' => $this->input->post('jenis_konsultasi'),
				'nama_konsultasi' => $this->input->post('nama_konsultasi'),
				'email_konsultasi' => $this->input->post('email_konsultasi'),
				'tlp_konsultasi' => $this->input->post('tlp_konsultasi'),
				'judul_konsultasi' => $this->input->post('judul_konsultasi'),
				'isi_konsultasi' => $this->input->post('isi_konsultasi'),
			];

			
			$save_tb_konsultasi = $this->model_tb_konsultasi->change($id, $save_data);

			if ($save_tb_konsultasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_konsultasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_konsultasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_konsultasi');
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
	* delete Tb Konsultasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_konsultasi_delete');

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
            set_message(cclang('has_been_deleted', 'tb_konsultasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_konsultasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Konsultasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_konsultasi_view');

		$this->data['tb_konsultasi'] = $this->model_tb_konsultasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Konsultasi Detail');
		$this->render('backend/standart/administrator/tb_konsultasi/tb_konsultasi_view', $this->data);
	}
	
	/**
	* delete Tb Konsultasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_konsultasi = $this->model_tb_konsultasi->find($id);

		
		
		return $this->model_tb_konsultasi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_konsultasi_export');

		$this->model_tb_konsultasi->export('tb_konsultasi', 'tb_konsultasi');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_konsultasi_export');

		$this->model_tb_konsultasi->pdf('tb_konsultasi', 'tb_konsultasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_konsultasi_export');

		$table = $title = 'tb_konsultasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_konsultasi->find($id);
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


/* End of file tb_konsultasi.php */
/* Location: ./application/controllers/administrator/Tb Konsultasi.php */