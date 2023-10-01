<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){    
		parent::__construct();  
		if($this->session->userdata('kodeuser_ses')){   
			$role = base64_decode($this->session->userdata('role_ses')); 
			switch ($role) {
				case "U-ADMIN": 
					break;  
				default:
					redirect(site_url('auth')); 
			} 
		}else{
			redirect(site_url('auth')); 
		}  
 
		
		$this->load->model(array('Model_kelulusanandregister'));
		$this->load->library('pagination');
	  }
	
	function add(){
		$config['upload_path']			= realpath('upload');
        $config['allowed_types']        = 'docx';
		$config['max_size']             = 10000;  
		$config['upload_path'] = realpath('upload');
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('uploadfile')) { 
			$this->session->set_flashdata('message', 'Upload File Gagal');
			$this->session->set_flashdata('info', '2');
			redirect(site_url('siswa'));
		}else{  
			$data_upload = $this->upload->data(); 
			$excelreader     = new PHPExcel_Reader_Excel2007();
			$loadexcel         = $excelreader->load('upload/'.$data_upload['file_name']);  
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true); 

			$numrow = 1;

			$data_kelulusan = array();
			foreach($sheet as $row){
				if($numrow > 2){ 
					$urut = $row['A'];
					$nomor_pendaftaran = $row['B'];
					$nisn = $row['C'];
					$nama_lengkap = $row['D'];
					$kelas = $row['E'];
					$layak = $row['F'];

					$this->db->where('nomor_pendaftaran',$nomor_pendaftaran);
					$this->db->where('nisn',$nisn);
					$cek = $this->db->get('data_kelulusan')->num_rows();
					if($cek>0){ 
					}else{
						array_push($data_kelulusan, array(  
							'nomor_pendaftaran'=>$nomor_pendaftaran,  
							'nisn'=>$nisn, 
							'nama_lengkap'=>$nama_lengkap,  
							'kelas'=>$kelas,
							'layak'=>$layak,
							'no_urut'=>$urut
						));
					}
					 
				}
				$numrow++;
			}
			if(!empty($data_kelulusan)){
				$this->db->insert_batch('data_kelulusan', $data_kelulusan);
			}
			$this->session->set_flashdata('message', 'Upload Sukses');
			$this->session->set_flashdata('info', '1');
			redirect(site_url('siswa'));
		} 
	}

	function delete(){
		$guid_kelulusan = $this->input->post('guid_kelulusan');
		$Kelulusanandregister = $this->Model_kelulusanandregister->get_firstdata($guid_kelulusan);

		$this->db->where('guid_kelulusan',$guid_kelulusan);
		$insert = $this->db->delete('data_kelulusan');
		if($insert){ 
			$this->session->set_flashdata('message', 'Berhasil dihapus');
			$this->session->set_flashdata('info', '1'); 
		}else{
			$this->session->set_flashdata('message', 'Gagal dihapus');
			$this->session->set_flashdata('info', '2'); 
		} 
		redirect(site_url('siswa')); 
	}

	function ubah(){
		$guid_kelulusan = $this->input->post('guid_kelulusan');
		$Kelulusanandregister = $this->Model_kelulusanandregister->get_firstdata($guid_kelulusan);
		
		$Kelayakan = "TIDAK LAYAK";
		if($Kelulusanandregister['layak'] == "LAYAK"){
			$Kelayakan = "TIDAK LAYAK";
		} 
		if($Kelulusanandregister['layak'] == "TIDAK LAYAK"){
			$Kelayakan = "LAYAK";
		} 

		$this->db->where('guid_kelulusan',$guid_kelulusan); 
		$insert = $this->db->update('data_kelulusan',array('layak'=>$Kelayakan));

		if($insert){ 
			$this->session->set_flashdata('message', 'Berhasil diubah');
			$this->session->set_flashdata('info', '1'); 
		}else{
			$this->session->set_flashdata('message', 'Gagal diubah');
			$this->session->set_flashdata('info', '2'); 
		} 
		redirect(site_url('siswa')); 
	}

	function clean(){
		$this->db->truncate('data_kelulusan');
		$this->db->truncate('data_registrasi');
		$this->db->truncate('data_registrasi_alamat');
		$this->db->truncate('data_registrasi_kegemaran');
		$this->db->truncate('data_registrasi_kesehatan'); 
		$this->db->truncate('data_registrasi_ortuwali');
		$this->db->truncate('data_registrasi_peminatan');
		$this->db->truncate('data_registrasi_pendidikan'); 
		$this->db->truncate('data_registrasi_pribadi'); 
		redirect(site_url('siswa')); 
	}
	 
	public function index()
	{  
		$data['modul'] = 'masterumum';  
		$search_text = "";
	    if($this->input->post('submit') != NULL ){
		  $search_text = $this->input->post('search'); 
		  //echo $search_text;exit;
	      $this->session->set_userdata(array("searchKelulusanandregister"=>$search_text));
	    }else{
	      if($this->session->userdata('searchKelulusanandregister') != NULL){
	        $search_text = $this->session->userdata('searchKelulusanandregister');
	      }
		}
		
	    if($this->input->post('reset') != NULL ){
	      $search_text = '';
	      $this->session->set_userdata(array("searchKelulusanandregister"=>$search_text));
		} 

        $config['base_url'] = site_url('siswa/index');   
        $config['per_page'] = 12;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter  
		$config['prev_link'] = FALSE;
		$config['next_link'] = FALSE;  
		$config['first_link'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>';
		$config['last_link'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;  
		$data['search'] = $search_text; 
		if($search_text==""){
			$config['total_rows'] = $this->Model_kelulusanandregister->count_all(); 
			$data['datasiswa'] = $this->Model_kelulusanandregister->list_all_data($data['page'],$config['per_page']);
		}else{
			$config['total_rows'] = $this->Model_kelulusanandregister->count_all_search($search_text);  
			$data['datasiswa'] = $this->Model_kelulusanandregister->list_all_data_search($search_text,$data['page'],$config['per_page']);
		} 

		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();   
        $this->template->load('template/template','siswa/view', $data); 
		
	}
}
