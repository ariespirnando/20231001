<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct(){    
		parent::__construct();   
		$this->load->model(array('Model_registrasi','Model_common')); 
	}
     

    public function pernyataan(){ 
				
        $data = array();
		$data['nomor_pendaftaran'] = $this->uri->segment(3);
		$data['registrasi'] = $this->Model_registrasi->data_registrasi($data['nomor_pendaftaran']);  
	    
	$role = base64_decode($this->session->userdata('role_ses')); 
	if($role == "U-REG"){
		//Update To Count Cetak
	} 

        $filename = preg_replace('/[^A-Za-z0-9\  ]/','_',$data['registrasi']['nama_lengkap']).'_'.preg_replace('/[^A-Za-z0-9\  ]/','_',$data['registrasi']['nisn']);  
		
		
		$data['dataregistrasi'] =$data['registrasi']; 
		$data['kepsek'] =$this->Model_common->get_firstdata_kode('KEPSEK'); 
		$data['jadwal'] =$this->Model_common->get_firstdata_kode('JADWAL'); 
		$pdfFilePath = "KARTUUJIAN".$filename.".pdf";
        $html =  $this->load->view('registrasiform/cetak_pernyataan',$data,true); 

		$mpdf = new \Mpdf\Mpdf();
		if($this->session->userdata('rule')==1){  
			$mpdf->AddPage("P","","","","","","","","","","","","","","","","","","","","Legal");
			$mpdf->WriteHTML($html);
			$mpdf->Output($pdfFilePath, "D"); 	
		}else{
			 
            $mpdf->AddPage("P","","","","","","","","","","","","","","","","","","","","Legal");
            $mpdf->WriteHTML($html);
            $mpdf->Output($pdfFilePath, "D");    
		}
    }
	 
}
