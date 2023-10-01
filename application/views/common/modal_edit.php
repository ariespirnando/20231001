<form enctype='multipart/form-data' class="simple-example was-validated" action="<?php echo base_url().'common/edit' ?>" method="post">
<div class="form-row mb-4"> 
         
        

    <div class="form-group col-md-8">
        <label for="inputAddress3">Nama Pegawai</label>  
		<input name="type" type="hidden" value="<?php echo $loaddata['type'] ?>">
		<input name="nama" type="text" required class="form-control" id="inputState3" placeholder="NAMA" value="<?php echo $loaddata['nama'] ?>">
        <div class="invalid-feedback">
            *Mandatory
        </div>
    </div>  

    <div class="form-group col-md-4">
        <label for="inputAddress3">NIP</label>  
        <input name="nip" type="text" required class="form-control" id="inputState3" placeholder="NIP" value="<?php echo $loaddata['nip'] ?>">
        <div class="invalid-feedback">
            *Mandatory
        </div>
    </div>  
 
	<div class="form-group col-md-12">
		<label for="inputAddress3">Upload Gambar</label>
		<input accept="image/png, image/jpeg" required name="uploadfile" type="file" required class="form-control" id="inputState3" placeholder="Upload File"> 
	</div>   
 

</div> 
<div class="modal-footer"> 
    <button type="submit" class="btn btn-primary submit-fn">Ubah</button>
    <button class="btn btn-default submit-fn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
</div>
</form>
