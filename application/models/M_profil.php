<?php

class M_profil extends CI_Model{

      
       function show_tkksd(){
            $where['id_halaman']=3;
            $data=$this->db->get_where('tb_halaman', $where)->row_array();

            return $data;

      }      
       function show_organisasi(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id_halaman=4  ")->row_array();

            return $data;

      }    
       function show_tupoksi(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id_halaman=5  ")->row_array();

            return $data;

      }    

}