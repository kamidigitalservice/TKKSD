<?php

class M_profil extends CI_Model{

      
       function show_tkksd(){

            $data=$this->db->query("SELECT * FROM tb_halaman where id=3  ");

            return $data;

      }      

}