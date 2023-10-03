<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="<?php echo base_url().'assets/' ?>assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url().'assets/' ?>assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>assets/css/elements/alert.css">
<link href="<?php echo base_url().'assets/' ?>assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>assets/css/components/timeline/custom-timeline.css" rel="stylesheet" type="text/css" />


<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES --> 

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-one">
        <div class="widget-content"> 
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
         UJIAN</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $nomor_pendaftaran ?> (<?php echo $nama_lengkap ?>)</li>
                </ol> 
            </nav>  
            <div class="alert alert-outline-primary mt-4 mb-2" role="alert">
            <?php 
            if($registrasi['layak']=='TIDAK LAYAK'){?>
            Kartu Ujian belum bisa di download, silakan hubungi bagian Wali Kelas <BR> Terimakasih...</div>
            <?php }else{?>
            Kartu Ujian sudah tersedia, silahkan didownload untuk mengikuti ujian</div>
			<a href="<?php echo base_url().'cetak/pernyataan/'.$registrasi['nomor_pendaftaran'] ?>" class="btn btn-bg btn-outline-primary">Download Kartu Ujian</a>
            <?php } ?>
            
			<br><br><br><br><br> 
			<br><br><br><br><br> 
			<br><br><br><br><br>
			<br><br><br><br><br>
        </div>
    </div>
</div>

 

        </div>
    </div>
</div>

 
 
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?php echo base_url().'assets/' ?>plugins/apex/apexcharts.min.js"></script>
<script src="<?php echo base_url().'assets/' ?>assets/js/dashboard/dash_2.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<?php 
if($this->session->userdata('message') <> ''){ 
    if($this->session->userdata('info')==1){
        echo "<script>
                    Snackbar.show({
                        text: '".$this->session->userdata('message')."',
                        actionTextColor: '#fff',
                        backgroundColor: '#8dbf42'
                    });
                </script>";
    }else{
        echo "<script>
                    Snackbar.show({
                        text: '".$this->session->userdata('message')."',
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                </script>";
    } 
}
?>
 

<script>
 







</script>
