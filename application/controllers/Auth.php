<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){    
		parent::__construct(); 
		$this->load->model(array('Model_auth','Model_registrasi')); 
	}
	public function index(){  
		if($this->session->userdata('isLogIn_ses')==1 && $this->session->userdata('role_ses')!="" && $this->session->userdata('isLogInReg_ses')!=1){  
			redirect(site_url('welcome'));
		}else{
			$data = array();   
			$this->load->view('auth/login_page',$data);
		} 
	}
 

	public function cekemailrecov(){
		$email = $this->input->post('email'); 
		$nisn = $this->input->post('nisn'); 
		
		$cek_pendaftaran = $this->Model_auth->cekemail($email,$nisn);
		if(!empty($cek_pendaftaran['nomor_pendaftaran']) && !empty($cek_pendaftaran['nisn']) && !empty($cek_pendaftaran['nama_lengkap'])){
			$arraydata = array(
				'isLogInReg_ses' => 1,
				'nomor_pendaftaran'=> base64_encode($cek_pendaftaran['nomor_pendaftaran']),
				'nisn'=> base64_encode($cek_pendaftaran['nisn']),
				'nama_lengkap'=> base64_encode($cek_pendaftaran['nama_lengkap']),
				'no_urut'=> base64_encode($cek_pendaftaran['no_urut']), 
				'role_ses'=> base64_encode('U-REG'), 
			);  
			$this->session->set_userdata($arraydata);
			$this->Model_auth->history($cek_pendaftaran['nomor_pendaftaran'],'Login');
			$resp = array(
				"module"=>'auth/ujian_form', 
				"isauth"=>0,  
			);  
		}else{
			$resp = array(  //stop
				"isauth"=>1,  
			); 
		} 
		echo json_encode($resp); 
	}
	   

	public function registration(){   
		if($this->session->userdata('isLogInReg_ses')!=""){  
			redirect(site_url('auth/ujian_form'));
		}else{
			$data = array();  
			$this->load->view('auth/password_recovery',$data);   
		} 
	}
	public function ujian_form(){   
		if($this->session->userdata('isLogIn_ses')!=""){  
			redirect(site_url('welcome'));
		}else{
			$data = array();    
			
			$data['nomor_pendaftaran'] = base64_decode($this->session->userdata('nomor_pendaftaran')); 
			$data['nisn'] = base64_decode($this->session->userdata('nisn')); 
			$data['nama_lengkap'] = base64_decode($this->session->userdata('nama_lengkap')); 
			
			$data['registrasi'] = $this->Model_registrasi->data_registrasi($data['nomor_pendaftaran']);
			$this->template->load('template2/template','welcome/siswa/view', $data); 
		} 
	} 
	 
	 
	public function login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$username = $user;
		$password = $pass;
		
		$login = $this->Model_auth->password_check($username,generate_pw($password));
		if(!empty($login['username']) && !empty($login['kode_user']) && !empty($login['kode_groups'])){
			$arraydata = array(
				'isLogIn_ses' => 1,
				'guid_ses'    => base64_encode($login['guid_user']),
				'username_ses'=> base64_encode($login['username']),
				'kodeuser_ses'=> base64_encode($login['kode_user']),
				'rldesc_ses'=> base64_encode($login['description']), 
				'role_ses'	  => base64_encode($login['kode_groups']),
				'email_ses'	  => base64_encode($login['email']), 
			);
			$this->db->query("call insert_aktifitas('".$login['kode_user']."','Log In Applikasi PJJ')"); 
			$this->session->set_userdata($arraydata);
			$resp = array(
				"module"=>'welcome', 
				"isauth"=>3,  
			); 
			$this->Model_auth->history($login['guid_user'],'Login');
		}else{
			$resp = array(  
				"isauth"=>2,  
			);
		}  

		echo json_encode($resp);
	} 
	 
	public function logout(){
		$this->Model_auth->history(base64_decode($this->session->userdata('guid_ses')),'Logout');
		$this->db->query("call insert_aktifitas('".base64_decode($this->session->userdata('kodeuser_ses'))."','Log Out Applikasi PJJ')"); 
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}
	public function logout2(){
		 $this->session->sess_destroy();
		redirect(site_url('auth/registration'));
	}
	

}
