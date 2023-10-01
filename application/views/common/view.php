<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="<?php echo base_url().'assets/' ?>assets/css/elements/custom-pagination.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'assets/' ?>plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  --> 
<link href="<?php echo base_url().'assets/' ?>plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />


<div class="col-xl-12 col-lg-12 col-sm-12 col-12 layout-spacing"> 
    <div class="widget-content widget-content-area br-6">  
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">COMMON</li>
        </ol> 
    </nav>  
      
     
    <hr>   
        <div class="table-responsive mb-4 mt-4">
            <table class="table table-hover" style="width:100%">
                <thead>
                    <tr> 
						<th>TYPE</th>
                        <th>NIP</th>
                        <th>NAMA</th> 
                        <th>TTD</th>  
                        <th class="text-center" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = $page+1;
                    foreach($datacommon as $d){ 
                ?>
                    <tr> 
                        <td><?php echo $d['type']?> </td> 
                        <td><?php echo $d['nip']?></td>
                        <td><?php echo $d['nama']?></td>
                        <td><?php echo $d['ttd_path']?></td>  
						<td class="text-center">
                            <span  onclick="load_edit('<?php echo $d['type']?>')" class="btn btn-outline-primary"  data-toggle="modal" data-target=".bd-edit-lg2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            </span>  
                        </td>  
                    </tr>
                <?php 
                    $no++;
                    }
                ?>  
            </table> 
        </div> 
        <div class="pagination-custom_outline"> 
            <?php echo $pagination; ?> 
        </div>
    </div>
</div>

<?php $this->load->view('karyawan/modal_add') ?>


<div class="modal fade bd-edit-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="clearbody"><div class="loader dual-loader mx-auto"></div></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-edit-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Hapus Data !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="loader dual-loader mx-auto"></div>
            </div>
            <div class="modal-footer">
                <form enctype='multipart/form-data' action="<?php echo base_url().'karyawan/delete' ?>" method="post">
                <input type="hidden" class="deletevalue" name="guid_karyawan" value=""/> 
                <button type="submit" class="btn btn-danger submit-fn">Hapus</button>
                <button class="btn btn-default submit-fn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-edit-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Reset Password !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="loader dual-loader mx-auto"></div>
            </div>
            <div class="modal-footer">
                <form enctype='multipart/form-data' action="<?php echo base_url().'karyawan/resetpass' ?>" method="post">
                <input type="hidden" class="resetvalue" name="guid_user" value=""/> 
                <button type="submit" class="btn btn-danger submit-fn">Reset</button>
                <button class="btn btn-default submit-fn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
            
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-edit-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Lihat Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="clearbody2"><div class="loader dual-loader mx-auto"></div></div>
            </div>
            <div class="modal-footer"> 
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button> 
            </div>
        </div>
    </div>
</div>
 

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url().'assets/' ?>assets/js/scrollspyNav.js"></script> 
<script src="<?php echo base_url().'assets/' ?>plugins/notification/snackbar/snackbar.min.js"></script>
<script src="<?php echo base_url().'assets/' ?>assets/js/forms/bootstrap_validation/bs_validation_script.js"></script> 
<!-- END PAGE LEVEL SCRIPTS -->

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
function load_edit(q){
    $.ajax({
        url: '<?php echo base_url()?>common/loadedit',
        type: 'post', 
        data: "q="+q, 
        success: function(response){
            $('.clearbody').html(response); 
        }   
    })
} 

function view_edit(q){
    $.ajax({
        url: '<?php echo base_url()?>karyawan/loadview',
        type: 'post', 
        data: "q="+q, 
        success: function(response){
            $('.clearbody2').html(response); 
        }   
    })
} 

function send_delete(q){
    $('.deletevalue').val(q); 
}
function reset_pw(q){
    $('.resetvalue').val(q); 
}
</script>

 

