<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kategori Publikasi Controller
*| --------------------------------------------------------------------------
*| Tb Kategori Publikasi site
*|
*/
class Tb_kategori_publikasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kategori_publikasi');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kategori Publikasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kategori_publikasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kategori_publikasis'] = $this->model_tb_kategori_publikasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kategori_publikasi_counts'] = $this->model_tb_kategori_publikasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_kategori_publikasi/index/',
			'total_rows'   => $this->model_tb_kategori_publikasi->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori Publikasi List');
		$this->render('backend/standart/administrator/tb_kategori_publikasi/tb_kategori_publikasi_list', $this->data);
	}
	
	/**
	* Add new tb_kategori_publikasis
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kategori_publikasi_add');

		$this->template->title('Kategori Publikasi New');
		$this->render('backend/standart/administrator/tb_kategori_publikasi/tb_kategori_publikasi_add', $this->data);
	}

	/**
	* Add New Tb Kategori Publikasis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kategori_publikasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('nama_kat_pub', 'Nama Kategori', 'trim|required|max_length[225]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_pub' => $this->input->post('nama_kat_pub'),
				'deskripsi_kat_pub' => $this->input->post('deskripsi_kat_pub'),
			];

			
			$save_tb_kategori_publikasi = $this->model_tb_kategori_publikasi->store($save_data);
            

			if ($save_tb_kategori_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kategori_publikasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_kategori_publikasi/edit/' . $save_tb_kategori_publikasi, 'Edit Tb Kategori Publikasi'),
						anchor('administrator/tb_kategori_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_kategori_publikasi/edit/' . $save_tb_kategori_publikasi, 'Edit Tb Kategori Publikasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_publikasi');
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
	* Update view Tb Kategori Publikasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kategori_publikasi_update');

		$this->data['tb_kategori_publikasi'] = $this->model_tb_kategori_publikasi->find($id);

		$this->template->title('Kategori Publikasi Update');
		$this->render('backend/standart/administrator/tb_kategori_publikasi/tb_kategori_publikasi_update', $this->data);
	}

	/**
	* Update Tb Kategori Publikasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kategori_publikasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_kat_pub', 'Nama Kategori', 'trim|required|max_length[225]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_kat_pub' => $this->input->post('nama_kat_pub'),
				'deskripsi_kat_pub' => $this->input->post('deskripsi_kat_pub'),
			];

			
			$save_tb_kategori_publikasi = $this->model_tb_kategori_publikasi->change($id, $save_data);

			if ($save_tb_kategori_publikasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_kategori_publikasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_kategori_publikasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_kategori_publikasi');
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
	* delete Tb Kategori Publikasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kategori_publikasi_delete');

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
            set_message(cclang('has_been_deleted', 'tb_kategori_publikasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_kategori_publikasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Kategori Publikasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kategori_publikasi_view');

		$this->data['tb_kategori_publikasi'] = $this->model_tb_kategori_publikasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori Publikasi Detail');
		$this->render('backend/standart/administrator/tb_kategori_publikasi/tb_kategori_publikasi_view', $this->data);
	}
	
	/**
	* delete Tb Kategori Publikasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kategori_publikasi = $this->model_tb_kategori_publikasi->find($id);

		
		
		return $this->model_tb_kategori_publikasi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kategori_publikasi_export');

		$this->model_tb_kategori_publikasi->export('tb_kategori_publikasi', 'tb_kategori_publikasi');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kategori_publikasi_export');

		$this->model_tb_kategori_publikasi->pdf('tb_kategori_publikasi', 'tb_kategori_publikasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kategori_publikasi_export');

		$table = $title = 'tb_kategori_publikasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kategori_publikasi->find($id);
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


/* End of file tb_kategori_publikasi.php */
/* Location: ./application/controllers/administrator/Tb Kategori Publikasi.php */