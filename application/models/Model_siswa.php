<?php 

class Model_siswa extends CI_Model { 
    #cek data
    function ceksiswa($k){
        $this->db->where('nik_siswa',$k);   
        $this->db->where('dt_siswa.ideleted',0);   
        $query = $this->db->get('dt_siswa');
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
        $this->db->where('guid_siswa',$i);
        $this->db->where('dt_siswa.ideleted',0);   
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        $query = $this->db->get('dt_siswa'); 
        return $query->row_array();
    }

    function get_firstdata_userreset($i){
        $this->db->where('auth_user.guid_user',$i);
        $this->db->where('auth_user.ideleted',0);    
        $query = $this->db->get('auth_user'); 
        return $query->row_array();
    }


    function get_firstdata_kode($i){
        $this->db->where('kode_siswa',$i);
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');    
        $query = $this->db->get('dt_siswa');  
        return $query->row_array();
    }

    function get_firstdata_kode_ac($i){
        $this->db->select('dt_siswa.*');
        $this->db->select('auth_email.email');
        $this->db->select('auth_user.username'); 
        $this->db->select('auth_user.guid_user'); 
        $this->db->where('kode_siswa',$i);
        $this->db->where('dt_siswa.ideleted',0);   
        $this->db->join('auth_user','auth_user.kode_user = dt_siswa.kode_siswa','inner');
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        $query = $this->db->get('dt_siswa');  
        return $query->row_array();
    }

      
    #normal
    function count_all(){ 
        $this->db->select('dt_siswa.guid_siswa');  
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_siswa.kode_siswa','inner'); 
        }
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data($start,$end){   
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_siswa.kode_siswa','inner'); 
        }
        $query = $this->db->get('dt_siswa',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search($q){ 
        $this->db->select('dt_siswa.guid_siswa');
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.status', $q);
        $this->db->group_end();  
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_siswa.kode_siswa','inner'); 
        }
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data_search($q,$start,$end){   
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.status', $q);
        $this->db->group_end();  
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->join('auth_email','auth_email.kode_user = dt_siswa.kode_siswa','left');  
        if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
            $this->db->join('auth_user','auth_user.kode_user = dt_siswa.kode_siswa','inner'); 
        }
        $query = $this->db->get('dt_siswa',$end,$start);
        return $query->result_array();
    }

    //AddNotIn
    #normal
    function count_all_notin(){ 
        $this->db->select('dt_siswa.guid_siswa');  
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT dt_walisiswa_detail.kode_siswa FROM dt_walisiswa_detail where dt_walisiswa_detail.ideleted = 0)', NULL, FALSE);
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data_notin($start,$end){   
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT dt_walisiswa_detail.kode_siswa FROM dt_walisiswa_detail where dt_walisiswa_detail.ideleted = 0)', NULL, FALSE);
        $query = $this->db->get('dt_siswa',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search_notin($q){ 
        $this->db->select('dt_siswa.guid_siswa');
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.status', $q);
        $this->db->group_end();  
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT dt_walisiswa_detail.kode_siswa FROM dt_walisiswa_detail where dt_walisiswa_detail.ideleted = 0)', NULL, FALSE);
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data_search_notin($q,$start,$end){   
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.status', $q);
        $this->db->group_end();   
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT dt_walisiswa_detail.kode_siswa FROM dt_walisiswa_detail where dt_walisiswa_detail.ideleted = 0)', NULL, FALSE);
        $query = $this->db->get('dt_siswa',$end,$start);
        return $query->result_array();
    }


    #normal subxsiswa
    function count_all_subxsiswa($ta){ 
        $this->db->select('dt_siswa.guid_siswa'); 
        $this->db->where('dt_siswa.status','Active');  
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT DISTINCT(conf_subkelasxsiswa.kode_siswa) FROM dt_tahunajaran
        JOIN conf_kelas ON conf_kelas.kode_tahunajaran = dt_tahunajaran.kode_tahunajaran
        JOIN conf_kelasxsubkelas ON conf_kelasxsubkelas.guid_conf_kelas = conf_kelas.guid_conf_kelas
        JOIN conf_subkelasxsiswa ON conf_subkelasxsiswa.guid_conf_kelasxsubkelas = conf_kelasxsubkelas.guid_conf_kelasxsubkelas
        WHERE conf_kelas.ideleted = 0 AND
                conf_kelasxsubkelas.ideleted = 0 AND
                conf_subkelasxsiswa.ideleted = 0 AND
                dt_tahunajaran.guid_tahunajaran = "'.$ta.'")', NULL, FALSE);
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data_subxsiswa($ta,$start,$end){   
        $this->db->where('dt_siswa.ideleted',0); 
        $this->db->where('dt_siswa.status','Active');  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT DISTINCT(conf_subkelasxsiswa.kode_siswa) FROM dt_tahunajaran
        JOIN conf_kelas ON conf_kelas.kode_tahunajaran = dt_tahunajaran.kode_tahunajaran
        JOIN conf_kelasxsubkelas ON conf_kelasxsubkelas.guid_conf_kelas = conf_kelas.guid_conf_kelas
        JOIN conf_subkelasxsiswa ON conf_subkelasxsiswa.guid_conf_kelasxsubkelas = conf_kelasxsubkelas.guid_conf_kelasxsubkelas
        WHERE conf_kelas.ideleted = 0 AND
                conf_kelasxsubkelas.ideleted = 0 AND
                conf_subkelasxsiswa.ideleted = 0 AND
                dt_tahunajaran.guid_tahunajaran = "'.$ta.'")', NULL, FALSE);
        $query = $this->db->get('dt_siswa',$end,$start); 
        return $query->result_array();
    }
    #search
    function count_all_search_subxsiswa($ta,$q){ 
        $this->db->select('dt_siswa.guid_siswa');
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.jenis_kelamin', $q);
        $this->db->group_end();  
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT DISTINCT(conf_subkelasxsiswa.kode_siswa) FROM dt_tahunajaran
        JOIN conf_kelas ON conf_kelas.kode_tahunajaran = dt_tahunajaran.kode_tahunajaran
        JOIN conf_kelasxsubkelas ON conf_kelasxsubkelas.guid_conf_kelas = conf_kelas.guid_conf_kelas
        JOIN conf_subkelasxsiswa ON conf_subkelasxsiswa.guid_conf_kelasxsubkelas = conf_kelasxsubkelas.guid_conf_kelasxsubkelas
        WHERE conf_kelas.ideleted = 0 AND
                conf_kelasxsubkelas.ideleted = 0 AND
                conf_subkelasxsiswa.ideleted = 0 AND
                dt_tahunajaran.guid_tahunajaran = "'.$ta.'")', NULL, FALSE);
        $query = $this->db->get('dt_siswa');
        return $query->num_rows();

    }
    function list_all_data_search_subxsiswa($ta,$q,$start,$end){   
        $this->db->group_start(); 
        $this->db->or_like('dt_siswa.kode_siswa', $q);  
        $this->db->or_like('dt_siswa.nama_siswa', $q);  
        $this->db->or_like('dt_siswa.nik_siswa', $q);   
        $this->db->or_like('dt_siswa.jenis_kelamin', $q);
        $this->db->group_end();   
        $this->db->where('dt_siswa.status','Active'); 
        $this->db->where('dt_siswa.ideleted',0);  
        $this->db->where('dt_siswa.kode_siswa NOT IN (SELECT DISTINCT(conf_subkelasxsiswa.kode_siswa) FROM dt_tahunajaran
        JOIN conf_kelas ON conf_kelas.kode_tahunajaran = dt_tahunajaran.kode_tahunajaran
        JOIN conf_kelasxsubkelas ON conf_kelasxsubkelas.guid_conf_kelas = conf_kelas.guid_conf_kelas
        JOIN conf_subkelasxsiswa ON conf_subkelasxsiswa.guid_conf_kelasxsubkelas = conf_kelasxsubkelas.guid_conf_kelasxsubkelas
        WHERE conf_kelas.ideleted = 0 AND
                conf_kelasxsubkelas.ideleted = 0 AND
                conf_subkelasxsiswa.ideleted = 0 AND
                dt_tahunajaran.guid_tahunajaran = "'.$ta.'")', NULL, FALSE);
        $query = $this->db->get('dt_siswa',$end,$start);
        return $query->result_array();
    }
}
?>