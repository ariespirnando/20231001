<?php 

class Model_pelajaran extends CI_Model { 
    #cek data
    function cekpelajaran($k){
        $this->db->where('akronim',$k);   
        $this->db->where('dt_pelajaran.ideleted',0);  
        $query = $this->db->get('dt_pelajaran');
        return $query->num_rows();
    }

    function get_firstdata($i){
        $this->db->where('guid_pelajaran',$i);
        $this->db->where('dt_pelajaran.ideleted',0);    
        $query = $this->db->get('dt_pelajaran'); 
        return $query->row_array();
    }

    #normal
    function count_all(){ 
        $this->db->select('dt_pelajaran.guid_pelajaran');  
        $this->db->where('dt_pelajaran.ideleted',0);  
        $query = $this->db->get('dt_pelajaran');
        return $query->num_rows();

    }
    function list_all_data($start,$end){   
        $this->db->where('dt_pelajaran.ideleted',0);  
        $query = $this->db->get('dt_pelajaran',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search($q){ 
        $this->db->select('dt_pelajaran.guid_pelajaran');
        $this->db->group_start(); 
        $this->db->or_like('dt_pelajaran.kode_pelajaran', $q);  
        $this->db->or_like('dt_pelajaran.akronim', $q);  
        $this->db->or_like('dt_pelajaran.nama_pelajaran', $q);  
        $this->db->or_like('dt_pelajaran.status', $q); 
        $this->db->group_end(); 
        $this->db->where('dt_pelajaran.ideleted',0);  
        $query = $this->db->get('dt_pelajaran');
        return $query->num_rows();

    }
    function list_all_data_search($q,$start,$end){   
        $this->db->group_start(); 
        $this->db->or_like('dt_pelajaran.kode_pelajaran', $q);  
        $this->db->or_like('dt_pelajaran.akronim', $q);  
        $this->db->or_like('dt_pelajaran.nama_pelajaran', $q);  
        $this->db->or_like('dt_pelajaran.status', $q); 
        $this->db->group_end(); 
        $this->db->where('dt_pelajaran.ideleted',0);  
        $query = $this->db->get('dt_pelajaran',$end,$start);
        return $query->result_array();
    }
}
?>