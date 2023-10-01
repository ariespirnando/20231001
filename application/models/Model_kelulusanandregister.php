<?php 

class Model_kelulusanandregister extends CI_Model { 
    #cek data
    function cekkelulusanandregister($k){  
        $this->db->where('data_kelulusan.nomor_pendaftaran', $k);  
        $this->db->where('data_kelulusan.ideleted',0);  
        $query = $this->db->get('data_kelulusan');
        return $query->num_rows();
    }

    function get_firstdata($i){
        $this->db->where('guid_kelulusan',$i);
        $this->db->where('data_kelulusan.ideleted',0);    
        $query = $this->db->get('data_kelulusan'); 
        return $query->row_array();
    }

      
    #normal
    function count_all(){ 
        $this->db->select('data_kelulusan.guid_kelulusan');  
        $this->db->where('data_kelulusan.ideleted',0);  
        $query = $this->db->get('data_kelulusan');
        return $query->num_rows();

    }
    function list_all_data($start,$end){   
        $this->db->where('data_kelulusan.ideleted',0);  
        $query = $this->db->get('data_kelulusan',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search($q){ 
        $this->db->select('data_kelulusan.guid_kelulusan');
        $this->db->group_start();
        $this->db->or_like('data_kelulusan.nomor_pendaftaran', $q);  
        $this->db->or_like('data_kelulusan.nisn', $q);  
        $this->db->or_like('data_kelulusan.nama_lengkap', $q);   
        $this->db->group_end(); 
        $this->db->where('data_kelulusan.ideleted',0);  
        $query = $this->db->get('data_kelulusan');
        return $query->num_rows();

    }
    function list_all_data_search($q,$start,$end){   
        $this->db->group_start();
        $this->db->or_like('data_kelulusan.nomor_pendaftaran', $q);  
        $this->db->or_like('data_kelulusan.nisn', $q);  
        $this->db->or_like('data_kelulusan.nama_lengkap', $q);   
        $this->db->group_end();  
        $this->db->where('data_kelulusan.ideleted',0);  
        $query = $this->db->get('data_kelulusan',$end,$start);
        return $query->result_array();
    }
}
?>