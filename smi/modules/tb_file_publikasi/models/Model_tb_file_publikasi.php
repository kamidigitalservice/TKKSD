<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tb_file_publikasi extends MY_Model {

    private $primary_key    = 'id_file_publikasi';
    private $table_name     = 'tb_file_publikasi';
    private $field_search   = ['judul_file_pub', 'kategori_file_pub', 'file_pub', 'deskripsi_pub', 'sumber'];

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
                    $where .= "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_file_publikasi.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('tb_file_publikasi.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('tb_kategori_file', 'tb_kategori_file.id_kat_file = tb_file_publikasi.kategori_file_pub', 'LEFT');
        
        $this->db->select('tb_file_publikasi.*,tb_kategori_file.nama_kat_file as tb_kategori_file_nama_kat_file');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tb_file_publikasi.php */
/* Location: ./application/models/Model_tb_file_publikasi.php */