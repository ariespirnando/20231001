<form enctype='multipart/form-data' class="simple-example was-validated" action="<?php echo base_url().'siswa/ubah' ?>" method="post">
<div class="form-row mb-4"> 
         
    <div class="form-group col-md-4">
        <label for="inputAddress3">STATUS</label> 
		<select name="layak" class="form-control">
			<option <?php echo $loaddata['layak']=="LAYAK"?"selected":"";?> value="LAYAK">LAYAK</option>
			<option <?php echo $loaddata['layak']=="TIDAK LAYAK"?"selected":"";?> value="TIDAK LAYAK">TIDAK LAYAK</option>
		</select> 
    </div>  

	<div class="form-group col-md-8">
        <label for="inputAddress3">NOTE</label>  
		<input name="guid_kelulusan" type="hidden" value="<?php echo $loaddata['guid_kelulusan'] ?>">
		<input name="note" type="text" class="form-control" id="inputState3" placeholder="NOTE" value="<?php echo $loaddata['note'] ?>">
        <div class="invalid-feedback">
            *Mandatory
        </div>
    </div>    
</div> 
<div class="modal-footer"> 
    <button type="submit" class="btn btn-primary submit-fn">Ubah</button>
    <button class="btn btn-default submit-fn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
</div>
</form>
