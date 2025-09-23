<?php

class M_berita extends CI_Model{

      function show_berita(){

            $hasil=$this->db->query("SELECT * FROM tb_publikasi where kategori_publikasi = 1 ORDER BY created_at desc limit 4");

            return $hasil;

      }  
       function show_publikasi(){

            $hasil=$this->db->query("SELECT * FROM tb_kategori_file  ");

            return $hasil;

      }      
      function show_tkksd(){

            $hasil=$this->db->query("SELECT * FROM tb_kategori_tkksd  ");

            return $hasil;

      }
      
       function show_hasil(){

            $hasil_kerjasama=$this->db->query("SELECT * FROM tb_publikasi where kategori_publikasi = 3 ORDER BY created_at desc limit 3");

            return $hasil_kerjasama;

      } 
      function show_api(){

            // $api=$this->db->query("SELECT api_key FROM tb_deskripsi_web")->row_array();
            
            $api1 = $this->db->get('tb_deskripsi_web')->row_array();
            
//             $artikel=file_get_contents($api1['api_key']);
// 			$a1=json_decode($artikel,true);
// 			$isi = $a1['artikel'];
            
            return $api1;

      } 

}