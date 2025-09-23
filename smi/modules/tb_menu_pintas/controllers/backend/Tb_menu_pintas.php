<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Menu Pintas Controller
*| --------------------------------------------------------------------------
*| Tb Menu Pintas site
*|
*/
class Tb_menu_pintas extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_menu_pintas');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Menu Pintass
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_menu_pintas_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_menu_pintass'] = $this->model_tb_menu_pintas->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_menu_pintas_counts'] = $this->model_tb_menu_pintas->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_menu_pintas/index/',
			'total_rows'   => $this->model_tb_menu_pintas->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Menu Pintas List');
		$this->render('backend/standart/administrator/tb_menu_pintas/tb_menu_pintas_list', $this->data);
	}
	
	
		/**
	* Update view Tb Menu Pintass
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_menu_pintas_update');

		$this->data['tb_menu_pintas'] = $this->model_tb_menu_pintas->find($id);

		$this->template->title('Menu Pintas Update');
		$this->render('backend/standart/administrator/tb_menu_pintas/tb_menu_pintas_update', $this->data);
	}

	/**
	* Update Tb Menu Pintass
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_menu_pintas_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('nama_menu_pintas', 'Nama Menu Pintas', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('url_menu_pintas', 'Link URL', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('tb_menu_pintas_logo_ikon_name', 'Logo Ikon/gambar', 'trim');
		$this->form_validation->set_rules('aktif', 'Status', 'trim|required');
		
		if ($this->form_validation->run()) {
			$tb_menu_pintas_logo_ikon_uuid = $this->input->post('tb_menu_pintas_logo_ikon_uuid');
			$tb_menu_pintas_logo_ikon_name = $this->input->post('tb_menu_pintas_logo_ikon_name');
		
			$save_data = [
				'nama_menu_pintas' => $this->input->post('nama_menu_pintas'),
				'url_menu_pintas' => $this->input->post('url_menu_pintas'),
				'aktif' => $this->input->post('aktif'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_menu_pintas/')) {
				mkdir(FCPATH . '/uploads/tb_menu_pintas/');
			}

			if (!empty($tb_menu_pintas_logo_ikon_uuid)) {
				$tb_menu_pintas_logo_ikon_name_copy = date('YmdHis') . '-' . $tb_menu_pintas_logo_ikon_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_menu_pintas_logo_ikon_uuid . '/' . $tb_menu_pintas_logo_ikon_name, 
						FCPATH . 'uploads/tb_menu_pintas/' . $tb_menu_pintas_logo_ikon_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_menu_pintas/' . $tb_menu_pintas_logo_ikon_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo_ikon'] = $tb_menu_pintas_logo_ikon_name_copy;
			}
		
			
			$save_tb_menu_pintas = $this->model_tb_menu_pintas->change($id, $save_data);

			if ($save_tb_menu_pintas) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_menu_pintas', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_menu_pintas');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_menu_pintas');
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
	* delete Tb Menu Pintass
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_menu_pintas_delete');

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
            set_message(cclang('has_been_deleted', 'tb_menu_pintas'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_menu_pintas'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Menu Pintass
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_menu_pintas_view');

		$this->data['tb_menu_pintas'] = $this->model_tb_menu_pintas->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Menu Pintas Detail');
		$this->render('backend/standart/administrator/tb_menu_pintas/tb_menu_pintas_view', $this->data);
	}
	
	/**
	* delete Tb Menu Pintass
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_menu_pintas = $this->model_tb_menu_pintas->find($id);

		if (!empty($tb_menu_pintas->logo_ikon)) {
			$path = FCPATH . '/uploads/tb_menu_pintas/' . $tb_menu_pintas->logo_ikon;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_menu_pintas->remove($id);
	}
	
	/**
	* Upload Image Tb Menu Pintas	* 
	* @return JSON
	*/
	public function upload_logo_ikon_file()
	{
		if (!$this->is_allowed('tb_menu_pintas_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_menu_pintas',
			'allowed_types' => 'jpg|jpeg|png|gif|ico',
		]);
	}

	/**
	* Delete Image Tb Menu Pintas	* 
	* @return JSON
	*/
	public function delete_logo_ikon_file($uuid)
	{
		if (!$this->is_allowed('tb_menu_pintas_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'logo_ikon', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_menu_pintas',
            'primary_key'       => 'id_menu_pintas',
            'upload_path'       => 'uploads/tb_menu_pintas/'
        ]);
	}

	/**
	* Get Image Tb Menu Pintas	* 
	* @return JSON
	*/
	public function get_logo_ikon_file($id)
	{
		if (!$this->is_allowed('tb_menu_pintas_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_menu_pintas = $this->model_tb_menu_pintas->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'logo_ikon', 
            'table_name'        => 'tb_menu_pintas',
            'primary_key'       => 'id_menu_pintas',
            'upload_path'       => 'uploads/tb_menu_pintas/',
            'delete_endpoint'   => 'administrator/tb_menu_pintas/delete_logo_ikon_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_menu_pintas_export');

		$this->model_tb_menu_pintas->export('tb_menu_pintas', 'tb_menu_pintas');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_menu_pintas_export');

		$this->model_tb_menu_pintas->pdf('tb_menu_pintas', 'tb_menu_pintas');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_menu_pintas_export');

		$table = $title = 'tb_menu_pintas';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_menu_pintas->find($id);
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


/* End of file tb_menu_pintas.php */
/* Location: ./application/controllers/administrator/Tb Menu Pintas.php */