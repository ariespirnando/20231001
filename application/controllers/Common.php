<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct(){    
		parent::__construct();  
		if($this->session->userdata('kodeuser_ses')){   
			$role = base64_decode($this->session->userdata('role_ses')); 
			switch ($role) {
				case "U-ADMIN": 
					break; 
				case "U-KEPSEK": 
					break; 
				case "U-KURIKULUM": 
					break; 
				default:
					redirect(site_url('auth')); 
			} 
		}else{
			redirect(site_url('auth')); 
		}  
 
		$this->load->model(array('Model_common'));
		$this->load->library('pagination');
	  }
	 
	function add(){ 
		$nama_common = $this->input->post('common');  
		$nik_common = $this->input->post('nik_common');  
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$nohandpone = $this->input->post('nohandpone');
		$email = $this->input->post('email'); 
		$jenis_common = $this->input->post('jenis_common');

		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
		$jurusan = $this->input->post('jurusan'); 

		$cek = $this->Model_common->cekcommon($nama_common,$tanggal_lahir); 
		$cek2 = $this->Model_common->cekemail($email); 
		if($cek>0){
			$this->session->set_flashdata('message', '<b>'.$nama_common.'</b> sudah tersedia');
			$this->session->set_flashdata('info', '2'); 
		}else if($cek2>0){
			$this->session->set_flashdata('message', '<b>'.$email.'</b> sudah digunakan');
			$this->session->set_flashdata('info', '2');  
		}else{ 
			$kode_common = generate_kode('PG');
			$dataSimpan = array(
				'tanggal_lahir'=>$tanggal_lahir, 
				'tempat_lahir'=>$tempat_lahir, 
				'pendidikan_terakhir'=>$pendidikan_terakhir, 
				'jurusan'=>$jurusan, 
				'kode_common'=>$kode_common,  
				'nama_common'=>$nama_common,
				'jenis_kelamin'=>$jenis_kelamin,
				'nik_common'=>$nik_common, 
				'alamat'=>$alamat,
				'nohandpone'=>$nohandpone, 
				'guid_groups'=>$jenis_common,
				'guid_common'=>generate_guid(), 
			);
			$insert = $this->db->insert('dt_common',$dataSimpan);
			if($insert){  
				$username = generate_username($nama_common);
				$password = generate_pw($username); 
				$dataAuth = array(
					'guid_user'=>generate_guid(),  
					'guid_groups'=>$jenis_common,
					'kode_user'=>$kode_common,
					'username'=>$username,
					'password'=>$password, 
				);
				$insert = $this->db->insert('auth_user',$dataAuth); 
				if($email!=""){
					$dataEmail = array(
						'guid_email'=>generate_guid(),   
						'kode_user'=>$kode_common, 
						'email'=>$email,  
					);
					$insert = $this->db->insert('auth_email',$dataEmail); 
				}

				$this->db->query("call insert_aktifitas('".base64_decode($this->session->userdata('kodeuser_ses'))."','Menambahkan staff baru An : ".$nama_common."')"); 
				$this->db->query("call insert_notif('".$kode_common."','Selamat, Anda sudah terdaftar di applikasi PJJ','')");
				

				$this->session->set_flashdata('message', '<b>'.$nama_common.'</b> berhasil ditambahkan');
				$this->session->set_flashdata('info', '1'); 
			}else{
				$this->session->set_flashdata('message', '<b>'.$nama_common.'</b> gagal ditambahkan');
				$this->session->set_flashdata('info', '2'); 
			} 
		} 
		redirect(site_url('common')); 
	}

	function delete(){
		$guid_common = $this->input->post('guid_common');
		$common = $this->Model_common->get_firstdata($guid_common);

		$this->db->where('guid_common',$guid_common);
		$insert = $this->db->update('dt_common',array('ideleted'=>1));
		if($insert){ 
			#delete email
			$this->db->where('kode_user',$common['kode_common']);
			$this->db->update('auth_email',array('ideleted'=>1));

			#delete user
			$this->db->where('guid_groups',$common['guid_groups']);
			$this->db->where('kode_user',$common['kode_common']);
			$this->db->update('auth_user',array('ideleted'=>1));

			$this->db->query("call insert_aktifitas('".base64_decode($this->session->userdata('kodeuser_ses'))."','Menghapus data staff An : ".$common['nama_common']."')");  

			$this->session->set_flashdata('message', '<b>'.$common['nama_common'].'</b> berhasil dihapus');
			$this->session->set_flashdata('info', '1'); 
		}else{
			$this->session->set_flashdata('message', '<b>'.$common['nama_common'].'</b> gagal dihapus');
			$this->session->set_flashdata('info', '2'); 
		} 
		redirect(site_url('common')); 
	}
	function resetpass(){
		$guid_user = $this->input->post('guid_user');
		$user = $this->Model_common->get_firstdata_userreset($guid_user);  
		$common = $this->Model_common->get_firstdata_kode($user['kode_user']);

		$this->db->where('guid_user',$guid_user);
		$insert = $this->db->update('auth_user',array('password'=>generate_pw($user['username'])));  

		// $guid_common = $this->input->post('guid_common');
		// $common = $this->Model_common->get_firstdata($guid_common);

		// $this->db->where('guid_common',$guid_common);
		// $insert = $this->db->update('dt_common',array('password'=>generate_pw($common['username'])));
 
		if($insert){ 
			$this->db->query("call insert_aktifitas('".base64_decode($this->session->userdata('kodeuser_ses'))."','Mereset password siswa An : ".$common['nama_common']."')"); 
			$this->db->query("call insert_notif('".$common['kode_common']."','Password anda sudah direset ke pengaturan awal','')");

			$this->session->set_flashdata('message', 'Password <b>'.$common['nama_common'].'</b> berhasil diperbaharui');
			$this->session->set_flashdata('info', '1'); 
		}else{
			$this->session->set_flashdata('message', 'Password <b>'.$common['nama_common'].'</b> gagal diperbaharui');
			$this->session->set_flashdata('info', '2'); 
		} 
		redirect(site_url('common')); 
	}
	function edit(){
		$type = $this->input->post('type');
		$nama = $this->input->post('nama');   
		$nip = $this->input->post('nip'); 

		$config['upload_path']			= realpath('upload'); 
		$config['allowed_types']        = 'docx';
		$config['max_size']             = 10000;  
		$config['upload_path'] = realpath('upload'); 
		$config['allowed_types'] = 'jpeg|jpg|png'; 
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('uploadfile')) { 
			$this->session->set_flashdata('message', 'Upload File Gagal');
			$this->session->set_flashdata('info', '2'); 
		}else{  
			$data_upload = $this->upload->data(); 
			$ttd = $data_upload['file_name']; 
			$dataSimpan = array( 
				'nama'=>$nama, 
				'nip'=>$nip, 
				'ttd_path'=>$ttd,  
			);
			$this->db->where('type',$type);
			$insert = $this->db->update('dt_common',$dataSimpan);

			if($insert){   
				$this->session->set_flashdata('message', 'Berhasil diubah');
				$this->session->set_flashdata('info', '1'); 
			}else{
				$this->session->set_flashdata('message', 'Gagal diubah');
				$this->session->set_flashdata('info', '2'); 
			} 
		} 
		redirect(site_url('common')); 
	}

	function loadedit(){
		$guid_common = $this->input->post('q'); 
		$data['role_in'] = $this->Model_common->list_role_in();
		$data['loaddata'] = $this->Model_common->get_firstdata_kode($guid_common);
		
		$this->load->view('common/modal_edit',$data);
	}
	function loadview(){
		$guid_common = $this->input->post('q'); 
		$data['role_in'] = $this->Model_common->list_role_in();
		$data['loaddata'] = $this->Model_common->get_firstdata($guid_common);
		$this->load->view('common/modal_view',$data);
	}
	public function index(){   
		$data['datacommon'] = $this->Model_common->list_all_data2();
        $this->template->load('template/template','common/view', $data);  
	}
}
