<?php 

class Model_common extends CI_Model {  
	 #
	 function list_role_in(){   
        $this->db->where('auth_groups.iTipe',0);  
        if(base64_decode($this->session->userdata('role_ses'))=='U-KURIKULUM'){
            $this->db->where('auth_groups.kode_groups','U-GURU'); 
        }
        $query = $this->db->get('auth_groups'); 
        return $query->result_array();
    }
    
    #cek data
    function cekcommon($k,$t){
        $this->db->where('nama_common',$k);   
        $this->db->where('tanggal_lahir',$t);    
        $this->db->where('dt_common.ideleted',0);  
        $query = $this->db->get('dt_common');
        return $query->num_rows();
    } 

    function get_firstdata_kode($i){
        $this->db->where('type',$i);   
        $query = $this->db->get('dt_common'); 
        return $query->row_array();
    }

	
 
 
    #normal
    function count_all(){ 
        // $this->db->select('dt_common.guid_common');  
        // $this->db->where('dt_common.ideleted',0);   
        // if(base64_decode($this->session->userdata('role_ses'))=='U-KURIKULUM'){
        //     $this->db->where('auth_groups.kode_groups','U-GURU'); 
        // }
        // if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
        //     $this->db->join('auth_user','auth_user.kode_user = dt_common.kode_common','inner'); 
        // }
        // $this->db->join('auth_groups','dt_common.guid_groups = auth_groups.guid_groups','inner');
        // $this->db->join('auth_email','auth_email.kode_user = dt_common.kode_common','left');  
        $query = $this->db->get('dt_common');
        return $query->num_rows();

    }
    function list_all_data($start,$end){   
        // $this->db->where('dt_common.ideleted',0);  
        // if(base64_decode($this->session->userdata('role_ses'))=='U-KURIKULUM'){
        //     $this->db->where('auth_groups.kode_groups','U-GURU'); 
        // }
        // if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
        //     $this->db->join('auth_user','auth_user.kode_user = dt_common.kode_common','inner'); 
        // }
        // $this->db->join('auth_groups','dt_common.guid_groups = auth_groups.guid_groups','inner');
        // $this->db->join('auth_email','auth_email.kode_user = dt_common.kode_common','left');  
        // $this->db->order_by('dt_common.dateinsupt', 'DESC'); 
        // $this->db->order_by('dt_common.nama_common', 'ASC'); 
        $query = $this->db->get('dt_common',$end,$start); 
        return $query->result_array();
    }
	function list_all_data2(){    
        $query = $this->db->get('dt_common'); 
        return $query->result_array();
    }
    #search
    function count_all_search($q){ 
		$this->db->group_start();
        $this->db->or_like('dt_common.nip', $q);  
        $this->db->or_like('dt_common.nama', $q);  
        $this->db->or_like('dt_common.ttd_path', $q);    
        $this->db->group_end();   
        // $this->db->select('dt_common.guid_common');
        // $this->db->group_start();
        // $this->db->or_like('dt_common.kode_common', $q);  
        // $this->db->or_like('dt_common.nama_common', $q);  
        // $this->db->or_like('dt_common.nik_common', $q);   
        // $this->db->or_like('dt_common.status', $q); 
        // $this->db->or_like('auth_groups.description', $q);  
        // $this->db->group_end();  
        // $this->db->where('dt_common.ideleted',0); 
        // if(base64_decode($this->session->userdata('role_ses'))=='U-KURIKULUM'){
        //     $this->db->where('auth_groups.kode_groups','U-GURU'); 
        // }
        // if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
        //     $this->db->join('auth_user','auth_user.kode_user = dt_common.kode_common','inner'); 
        // }
        // $this->db->join('auth_groups','dt_common.guid_groups = auth_groups.guid_groups','inner'); 
        // $this->db->join('auth_email','auth_email.kode_user = dt_common.kode_common','left');  
        $query = $this->db->get('dt_common');
        return $query->num_rows();

    }
    function list_all_data_search($q,$start,$end){   
        $this->db->group_start();
        $this->db->or_like('dt_common.nip', $q);  
        $this->db->or_like('dt_common.nama', $q);  
        $this->db->or_like('dt_common.ttd_path', $q);    
        $this->db->group_end();   
        // $this->db->where('dt_common.ideleted',0);  
        // if(base64_decode($this->session->userdata('role_ses'))=='U-KURIKULUM'){
        //     $this->db->where('auth_groups.kode_groups','U-GURU'); 
        // }
        // if(base64_decode($this->session->userdata('role_ses'))=='U-ADMIN'){
        //     $this->db->join('auth_user','auth_user.kode_user = dt_common.kode_common','inner'); 
        // }
        // $this->db->join('auth_groups','dt_common.guid_groups = auth_groups.guid_groups','inner');
        // $this->db->join('auth_email','auth_email.kode_user = dt_common.kode_common','left');  
        // $this->db->order_by('dt_common.dateinsupt', 'DESC'); 
        // $this->db->order_by('dt_common.nama_common', 'ASC'); 
        $query = $this->db->get('dt_common',$end,$start);
        return $query->result_array();
    }
}
?>
