<?php

class M_layanan extends CI_Model{

      
       function show_ksdd(){
            $where['id_halaman']=9;
            $data=$this->db->get_where('tb_halaman', $where)->row_array();

            return $data;

      }      
       function show_ksdpk(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id_halaman=6  ")->row_array();

            return $data;

      }    
       function show_sinergitas(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id_halaman=7  ")->row_array();

            return $data;

      }   
      function show_ln(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id_halaman=8  ")->row_array();

            return $data;

      }   

}