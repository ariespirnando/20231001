<?php 

class Model_walisiswa extends CI_Model { 
    #Cek URL
    function get_cek_count_data($i){
        $this->db->where('guid_walisiswa',$i);
        $this->db->where('dt_walisiswa.ideleted',0);    
        $query = $this->db->get('dt_walisiswa'); 
        return $query->num_rows();
    }
    #result siswa
    function list_datasiswa($q){   
        $this->db->where('dt_walisiswa_detail.ideleted',0); 
        $this->db->where('dt_walisiswa.guid_walisiswa',$q);  
        $this->db->join('dt_siswa','dt_walisiswa_detail.kode_siswa = dt_siswa.kode_siswa','inner');   
        $this->db->join('dt_walisiswa','dt_walisiswa_detail.kode_walisiswa = dt_walisiswa.kode_walisiswa','inner');    
        $query = $this->db->get('dt_walisiswa_detail');  
        return $query->result_array();
    }

    #cek data
    function cekwalisiswa($k){
        $this->db->where('nama_walisiswa',$k); 
        $this->db->where('tanggal_lahir',$t);    
        $this->db->where('dt_walisiswa.ideleted',0);  
        $query = $this->db->get('dt_walisiswa');
        return $query->num_rows();
    }

    function cekemail($k){
        $this->db->where('auth_email.email',$k);   
        $this->db->where('auth_email.ideleted',0);   
        $query = $this->db->get('auth_email');
        return $query->num_rows();
    }

    function cekemail_kode($k){
        $this->db->where('auth_email.kode_user',$k);   
        $this->db->where('auth_email.ideleted',0);   
        $query = $this->db->get('auth_email');
        return $query->num_rows();
    }



    function get_firstdata($i){
        $this->db->where('guid_walisiswa',$i);
        $this->db->where('dt_walisiswa.ideleted',0);    
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');   
        $query = $this->db->get('dt_walisiswa'); 
        return $query->row_array();
    } 
    function get_firstdata_kode_ac($i){
        $this->db->select('dt_walisiswa.*');
        $this->db->select('auth_email.email');
        $this->db->select('auth_user.username'); 
        $this->db->select('auth_user.guid_user'); 
        $this->db->where('kode_walisiswa',$i);
        $this->db->where('dt_walisiswa.ideleted',0);   
        $this->db->join('auth_user','auth_user.kode_user = dt_walisiswa.kode_walisiswa','inner');
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');   
        $query = $this->db->get('dt_walisiswa'); 
        return $query->row_array();
    }

    function get_firstdata_kode($i){
        $this->db->where('kode_walisiswa',$i);
        $this->db->where('dt_walisiswa.ideleted',0);   
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');    
        $query = $this->db->get('dt_walisiswa'); 
        return $query->row_array();
    }
    
    function get_firstdatadet($i){
        $this->db->where('guid_walisiswa_detail',$i);
        $this->db->where('dt_walisiswa_detail.ideleted',0);     
        $query = $this->db->get('dt_walisiswa_detail'); 
        return $query->row_array();
    }
 
      
    #normal
    function count_all(){ 
        $this->db->select('dt_walisiswa.guid_walisiswa');  
        $this->db->where('dt_walisiswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_walisiswa.kode_walisiswa','inner'); 
        }
        $query = $this->db->get('dt_walisiswa');
        return $query->num_rows();

    }
    function list_all_data($start,$end){   
        $this->db->where('dt_walisiswa.ideleted',0); 
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');   
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_walisiswa.kode_walisiswa','inner'); 
        }
        $query = $this->db->get('dt_walisiswa',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search($q){ 
        $this->db->select('dt_walisiswa.guid_walisiswa');
        $this->db->group_start();  
        $this->db->or_like('dt_walisiswa.kode_walisiswa', $q);  
        $this->db->or_like('dt_walisiswa.nama_walisiswa', $q);  
        $this->db->or_like('dt_walisiswa.nik_walisiswa', $q);   
        $this->db->or_like('dt_walisiswa.status', $q);
        $this->db->group_end();   
        $this->db->where('dt_walisiswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_walisiswa.kode_walisiswa','inner'); 
        }
        $query = $this->db->get('dt_walisiswa');
        return $query->num_rows();

    }
    function list_all_data_search($q,$start,$end){   
        $this->db->group_start();  
        $this->db->or_like('dt_walisiswa.kode_walisiswa', $q);  
        $this->db->or_like('dt_walisiswa.nama_walisiswa', $q);  
        $this->db->or_like('dt_walisiswa.nik_walisiswa', $q);   
        $this->db->or_like('dt_walisiswa.status', $q);
        $this->db->group_end(); 
        $this->db->where('dt_walisiswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_walisiswa.kode_walisiswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_walisiswa.kode_walisiswa','inner'); 
        }
        $query = $this->db->get('dt_walisiswa',$end,$start);
        return $query->result_array();
    }
}
?>