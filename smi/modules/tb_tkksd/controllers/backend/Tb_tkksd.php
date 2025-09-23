<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Tkksd Controller
*| --------------------------------------------------------------------------
*| Tb Tkksd site
*|
*/
class Tb_tkksd extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_tkksd');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Tkksds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_tkksd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_tkksds'] = $this->model_tb_tkksd->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_tkksd_counts'] = $this->model_tb_tkksd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tb_tkksd/index/',
			'total_rows'   => $this->model_tb_tkksd->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kerjasama Tkksd List');
		$this->render('backend/standart/administrator/tb_tkksd/tb_tkksd_list', $this->data);
	}
	
	/**
	* Add new tb_tkksds
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_tkksd_add');

		$this->template->title('Kerjasama Tkksd New');
		$this->render('backend/standart/administrator/tb_tkksd/tb_tkksd_add', $this->data);
	}

	/**
	* Add New Tb Tkksds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_tkksd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('no_tkksd', 'Nomor', 'trim|max_length[255]');
		$this->form_validation->set_rules('tanggal_tkksd', 'Tanggal Kerjasama', 'trim|required');
		$this->form_validation->set_rules('judul_tkksd', 'Judul Kesepakatan (Kerjasama) ', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('kategori_tkksd', 'Kategori', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('sumber_tkksd', 'Sumber', 'trim|max_length[225]');
		$this->form_validation->set_rules('tb_tkksd_dokumen_tkksd_name', ' Lampiran Dokumen (untuk Dipublikasikan)', 'trim');
		$this->form_validation->set_rules('tb_tkksd_gambar_tkksd_name', 'Lampiran Dokumen (untuk Dipublikasikan)', 'trim');
		$this->form_validation->set_rules('status_tkksd', 'Status', 'trim|required');
		

		if ($this->form_validation->run()) {
			$tb_tkksd_dokumen_tkksd_uuid = $this->input->post('tb_tkksd_dokumen_tkksd_uuid');
			$tb_tkksd_dokumen_tkksd_name = $this->input->post('tb_tkksd_dokumen_tkksd_name');
			$tb_tkksd_gambar_tkksd_uuid = $this->input->post('tb_tkksd_gambar_tkksd_uuid');
			$tb_tkksd_gambar_tkksd_name = $this->input->post('tb_tkksd_gambar_tkksd_name');
		
			$save_data = [
				'no_tkksd' => $this->input->post('no_tkksd'),
				'tanggal_tkksd' => $this->input->post('tanggal_tkksd'),
				'judul_tkksd' => $this->input->post('judul_tkksd'),
				'kategori_tkksd' => $this->input->post('kategori_tkksd'),
				'deskripsi_tkksd' => $this->input->post('deskripsi_tkksd'),
				'pihak1' => $this->input->post('pihak1'),
				'pihak2' => $this->input->post('pihak2'),
				'ruang_lingkup' => $this->input->post('ruang_lingkup'),
				'jangka_wktu_awal' => $this->input->post('jangka_wktu_awal'),
				'jangka_wktu_akhir' => $this->input->post('jangka_wktu_akhir'),
				'pd_pemrakasa' => implode(',', (array) $this->input->post('pd_pemrakasa')),
				'sumber_tkksd' => $this->input->post('sumber_tkksd'),
				'keterangan_lainnya' => $this->input->post('keterangan_lainnya'),
				'status_tkksd' => $this->input->post('status_tkksd'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_tkksd/')) {
				mkdir(FCPATH . '/uploads/tb_tkksd/');
			}

			if (!empty($tb_tkksd_dokumen_tkksd_name)) {
				$tb_tkksd_dokumen_tkksd_name_copy = date('YmdHis') . '-' . $tb_tkksd_dokumen_tkksd_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_tkksd_dokumen_tkksd_uuid . '/' . $tb_tkksd_dokumen_tkksd_name, 
						FCPATH . 'uploads/tb_tkksd/' . $tb_tkksd_dokumen_tkksd_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd_dokumen_tkksd_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['dokumen_tkksd'] = $tb_tkksd_dokumen_tkksd_name_copy;
			}
		
			if (!empty($tb_tkksd_gambar_tkksd_name)) {
				$tb_tkksd_gambar_tkksd_name_copy = date('YmdHis') . '-' . $tb_tkksd_gambar_tkksd_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_tkksd_gambar_tkksd_uuid . '/' . $tb_tkksd_gambar_tkksd_name, 
						FCPATH . 'uploads/tb_tkksd/' . $tb_tkksd_gambar_tkksd_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd_gambar_tkksd_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_tkksd'] = $tb_tkksd_gambar_tkksd_name_copy;
			}
		
			
			$save_tb_tkksd = $this->model_tb_tkksd->store($save_data);
            

			if ($save_tb_tkksd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_tkksd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tb_tkksd/edit/' . $save_tb_tkksd, 'Edit Tb Tkksd'),
						anchor('administrator/tb_tkksd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tb_tkksd/edit/' . $save_tb_tkksd, 'Edit Tb Tkksd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_tkksd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_tkksd');
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
	* Update view Tb Tkksds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_tkksd_update');

		$this->data['tb_tkksd'] = $this->model_tb_tkksd->find($id);

		$this->template->title('Kerjasama Tkksd Update');
		$this->render('backend/standart/administrator/tb_tkksd/tb_tkksd_update', $this->data);
	}

	/**
	* Update Tb Tkksds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_tkksd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('no_tkksd', 'Nomor', 'trim|max_length[255]');
		$this->form_validation->set_rules('tanggal_tkksd', 'Tanggal Kerjasama', 'trim|required');
		$this->form_validation->set_rules('judul_tkksd', 'Judul Kesepakatan (Kerjasama) ', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('kategori_tkksd', 'Kategori', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('sumber_tkksd', 'Sumber', 'trim|max_length[225]');
		$this->form_validation->set_rules('tb_tkksd_dokumen_tkksd_name', ' Lampiran Dokumen (untuk Dipublikasikan)', 'trim');
		$this->form_validation->set_rules('tb_tkksd_gambar_tkksd_name', 'Lampiran Dokumen (untuk Dipublikasikan)', 'trim');
		$this->form_validation->set_rules('status_tkksd', 'Status', 'trim|required');
		
		if ($this->form_validation->run()) {
			$tb_tkksd_dokumen_tkksd_uuid = $this->input->post('tb_tkksd_dokumen_tkksd_uuid');
			$tb_tkksd_dokumen_tkksd_name = $this->input->post('tb_tkksd_dokumen_tkksd_name');
			$tb_tkksd_gambar_tkksd_uuid = $this->input->post('tb_tkksd_gambar_tkksd_uuid');
			$tb_tkksd_gambar_tkksd_name = $this->input->post('tb_tkksd_gambar_tkksd_name');
		
			$save_data = [
				'no_tkksd' => $this->input->post('no_tkksd'),
				'tanggal_tkksd' => $this->input->post('tanggal_tkksd'),
				'judul_tkksd' => $this->input->post('judul_tkksd'),
				'kategori_tkksd' => $this->input->post('kategori_tkksd'),
				'deskripsi_tkksd' => $this->input->post('deskripsi_tkksd'),
				'pihak1' => $this->input->post('pihak1'),
				'pihak2' => $this->input->post('pihak2'),
				'ruang_lingkup' => $this->input->post('ruang_lingkup'),
				'jangka_wktu_awal' => $this->input->post('jangka_wktu_awal'),
				'jangka_wktu_akhir' => $this->input->post('jangka_wktu_akhir'),
				'pd_pemrakasa' => implode(',', (array) $this->input->post('pd_pemrakasa')),
				'sumber_tkksd' => $this->input->post('sumber_tkksd'),
				'keterangan_lainnya' => $this->input->post('keterangan_lainnya'),
				'status_tkksd' => $this->input->post('status_tkksd'),
			];

			if (!is_dir(FCPATH . '/uploads/tb_tkksd/')) {
				mkdir(FCPATH . '/uploads/tb_tkksd/');
			}

			if (!empty($tb_tkksd_dokumen_tkksd_uuid)) {
				$tb_tkksd_dokumen_tkksd_name_copy = date('YmdHis') . '-' . $tb_tkksd_dokumen_tkksd_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_tkksd_dokumen_tkksd_uuid . '/' . $tb_tkksd_dokumen_tkksd_name, 
						FCPATH . 'uploads/tb_tkksd/' . $tb_tkksd_dokumen_tkksd_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd_dokumen_tkksd_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['dokumen_tkksd'] = $tb_tkksd_dokumen_tkksd_name_copy;
			}
		
			if (!empty($tb_tkksd_gambar_tkksd_uuid)) {
				$tb_tkksd_gambar_tkksd_name_copy = date('YmdHis') . '-' . $tb_tkksd_gambar_tkksd_name;

				rename(FCPATH . 'uploads/tmp/' . $tb_tkksd_gambar_tkksd_uuid . '/' . $tb_tkksd_gambar_tkksd_name, 
						FCPATH . 'uploads/tb_tkksd/' . $tb_tkksd_gambar_tkksd_name_copy);

				if (!is_file(FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd_gambar_tkksd_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['gambar_tkksd'] = $tb_tkksd_gambar_tkksd_name_copy;
			}
		
			
			$save_tb_tkksd = $this->model_tb_tkksd->change($id, $save_data);

			if ($save_tb_tkksd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tb_tkksd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tb_tkksd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tb_tkksd');
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
	* delete Tb Tkksds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_tkksd_delete');

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
            set_message(cclang('has_been_deleted', 'tb_tkksd'), 'success');
        } else {
            set_message(cclang('error_delete', 'tb_tkksd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tb Tkksds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_tkksd_view');

		$this->data['tb_tkksd'] = $this->model_tb_tkksd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kerjasama Tkksd Detail');
		$this->render('backend/standart/administrator/tb_tkksd/tb_tkksd_view', $this->data);
	}
	
	/**
	* delete Tb Tkksds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_tkksd = $this->model_tb_tkksd->find($id);

		if (!empty($tb_tkksd->dokumen_tkksd)) {
			$path = FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd->dokumen_tkksd;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($tb_tkksd->gambar_tkksd)) {
			$path = FCPATH . '/uploads/tb_tkksd/' . $tb_tkksd->gambar_tkksd;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tb_tkksd->remove($id);
	}
	
	/**
	* Upload Image Tb Tkksd	* 
	* @return JSON
	*/
	public function upload_dokumen_tkksd_file()
	{
		if (!$this->is_allowed('tb_tkksd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_tkksd',
			'allowed_types' => 'pdf|docx',
		]);
	}

	/**
	* Delete Image Tb Tkksd	* 
	* @return JSON
	*/
	public function delete_dokumen_tkksd_file($uuid)
	{
		if (!$this->is_allowed('tb_tkksd_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'dokumen_tkksd', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_tkksd',
            'primary_key'       => 'id_tkksd',
            'upload_path'       => 'uploads/tb_tkksd/'
        ]);
	}

	/**
	* Get Image Tb Tkksd	* 
	* @return JSON
	*/
	public function get_dokumen_tkksd_file($id)
	{
		if (!$this->is_allowed('tb_tkksd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_tkksd = $this->model_tb_tkksd->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'dokumen_tkksd', 
            'table_name'        => 'tb_tkksd',
            'primary_key'       => 'id_tkksd',
            'upload_path'       => 'uploads/tb_tkksd/',
            'delete_endpoint'   => 'administrator/tb_tkksd/delete_dokumen_tkksd_file'
        ]);
	}
	
	/**
	* Upload Image Tb Tkksd	* 
	* @return JSON
	*/
	public function upload_gambar_tkksd_file()
	{
		if (!$this->is_allowed('tb_tkksd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tb_tkksd',
			'allowed_types' => 'jpg|png|jpeg|gif',
		]);
	}

	/**
	* Delete Image Tb Tkksd	* 
	* @return JSON
	*/
	public function delete_gambar_tkksd_file($uuid)
	{
		if (!$this->is_allowed('tb_tkksd_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'gambar_tkksd', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tb_tkksd',
            'primary_key'       => 'id_tkksd',
            'upload_path'       => 'uploads/tb_tkksd/'
        ]);
	}

	/**
	* Get Image Tb Tkksd	* 
	* @return JSON
	*/
	public function get_gambar_tkksd_file($id)
	{
		if (!$this->is_allowed('tb_tkksd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tb_tkksd = $this->model_tb_tkksd->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'gambar_tkksd', 
            'table_name'        => 'tb_tkksd',
            'primary_key'       => 'id_tkksd',
            'upload_path'       => 'uploads/tb_tkksd/',
            'delete_endpoint'   => 'administrator/tb_tkksd/delete_gambar_tkksd_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_tkksd_export');

		$this->model_tb_tkksd->export('tb_tkksd', 'tb_tkksd');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_tkksd_export');

		$this->model_tb_tkksd->pdf('tb_tkksd', 'tb_tkksd');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_tkksd_export');

		$table = $title = 'tb_tkksd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_tkksd->find($id);
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


/* End of file tb_tkksd.php */
/* Location: ./application/controllers/administrator/Tb Tkksd.php */