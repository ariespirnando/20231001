<?php 

class Model_registrasi extends CI_Model { 
    #cek data
    function cek_data_registrasi($k){  
        $this->db->where('data_registrasi.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi');
        return $query->num_rows();
    } 
    function data_registrasi($k){  
        $this->db->where('data_kelulusan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_kelulusan');
        return $query->row_array();
    } 

    function cek_data_registrasi_alamat($k){  
        $this->db->where('data_registrasi_alamat.nomor_pendaftaran', $k);  
        $query = $this->db->get('data_registrasi_alamat');
        return $query->num_rows();
    } 
    function data_registrasi_alamat($k){  
        $this->db->where('data_registrasi_alamat.nomor_pendaftaran', $k);  
        $query = $this->db->get('data_registrasi_alamat');
        return $query->row_array();
    } 

    function cek_data_registrasi_kesehatan($k){  
        $this->db->where('data_registrasi_kesehatan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_kesehatan');
        return $query->num_rows();
    } 
    function data_registrasi_kesehatan($k){  
        $this->db->where('data_registrasi_kesehatan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_kesehatan');
        return $query->row_array();
    } 

    function cek_data_registrasi_pendidikan($k){  
        $this->db->where('data_registrasi_pendidikan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_pendidikan');
        return $query->num_rows();
    } 
    function data_registrasi_pendidikan($k){  
        $this->db->where('data_registrasi_pendidikan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_pendidikan');
        return $query->row_array();
    } 

    function cek_data_registrasi_pribadi($k){  
        $this->db->where('data_registrasi_pribadi.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_pribadi');
        return $query->num_rows();
    }
    function data_registrasi_pribadi($k){  
        $this->db->where('data_registrasi_pribadi.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_pribadi');
        return $query->row_array();
    } 

    function cek_data_registrasi_ortu($k){  
        $this->db->where('data_registrasi_ortuwali.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_ortuwali');
        return $query->num_rows();
    }
    function data_registrasi_ortu($k){  
        $this->db->where('data_registrasi_ortuwali.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_ortuwali');
        return $query->row_array();
    } 

    function cek_data_registrasi_inteleg($k){  
        $this->db->where('data_registrasi_kegemaran.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_kegemaran');
        return $query->num_rows();
    }
    function data_registrasi_inteleg($k){  
        $this->db->where('data_registrasi_kegemaran.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_kegemaran');
        return $query->row_array();
    }  

    function cek_data_registrasi_peminatan($k){  
        $this->db->where('data_registrasi_peminatan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_peminatan');
        return $query->num_rows();
    }
    function data_registrasi_peminatan($k){  
        $this->db->where('data_registrasi_peminatan.nomor_pendaftaran', $k);   
        $query = $this->db->get('data_registrasi_peminatan');
        return $query->row_array();
    }  
}
?>
