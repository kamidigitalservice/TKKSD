<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tb_halaman extends MY_Model {

    private $primary_key    = 'id_halaman';
    private $table_name     = 'tb_halaman';
    private $field_search   = ['judul_halaman', 'kategori_halaman', 'jenis_template', 'gambar_halaman'];

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
                    $where .= "tb_halaman.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_halaman.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_halaman.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "tb_halaman.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "tb_halaman.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_halaman.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('tb_halaman.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('tb_kategori_halaman', 'tb_kategori_halaman.id_kategori_halaman = tb_halaman.kategori_halaman', 'LEFT');
        $this->db->join('tb_template', 'tb_template.id_template = tb_halaman.jenis_template', 'LEFT');
        
        $this->db->select('tb_halaman.*,tb_kategori_halaman.nama_kategori_halaman as tb_kategori_halaman_nama_kategori_halaman,tb_template.nama_template as tb_template_nama_template');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tb_halaman.php */
/* Location: ./application/models/Model_tb_halaman.php */