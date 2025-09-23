<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tb_tkksd extends MY_Model {

    private $primary_key    = 'id_tkksd';
    private $table_name     = 'tb_tkksd';
    private $field_search   = ['no_tkksd', 'tanggal_tkksd', 'judul_tkksd', 'kategori_tkksd', 'pihak1', 'pihak2', 'ruang_lingkup', 'dokumen_tkksd', 'gambar_tkksd', 'status_tkksd'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "tb_tkksd.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_tkksd.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_tkksd.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "tb_tkksd.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_tkksd.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_tkksd.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('tb_tkksd.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('tb_kategori_tkksd', 'tb_kategori_tkksd.id_kat_tkksd = tb_tkksd.kategori_tkksd', 'LEFT');
        $this->db->join('tb_daftar_pd', 'tb_daftar_pd.nama_pede = tb_tkksd.pd_pemrakasa', 'LEFT');
        
        $this->db->select('tb_tkksd.*,tb_kategori_tkksd.nama_kat_tkksd as tb_kategori_tkksd_nama_kat_tkksd,tb_daftar_pd.nama_pede as tb_daftar_pd_nama_pede');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tb_tkksd.php */
/* Location: ./application/models/Model_tb_tkksd.php */