<!-- Begin Page Content -->
<div class="container-fluid">
  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Laporan Mitra</h5>
			
	    </div>
    
	    	<div class="card-body">
	    		<div class="form-group row">
				  <label class="col-sm-3 col-form-label">Nama Mitra</label>
				  <div class="col-sm-8">
					  <select name="jabatan" id="jabatan" class="form-control custom-select" required>
						  <option selected disabled value="">--Pilih Jabatan--</option>
					 		 	<?php foreach ($row->result() as $key => $data)  {?>
									<option value="<?=$data->mitra_id?>"><?=$data->nama_mitra?></option>
								<?php } ?> 
					  </select>
				   </div>
				  <div class="col-sm-1">
				  	<button type="button" class="btn btn-success" onclick="tampildata()"> Pilih</button>
		          </div>
		        </div>
				
	    	</div>
	    	
  </div>
	<?= $this->session->flashdata('msg_email');?>
</div>

<script language='javascript'>
		function tampildata(params) {
			$.ajax({
				type: "POST",
				url: "/Controller/Action", // the URL of the controller action method
				data: null, // optional data
				success: function(result) {
						// do something with result
				},                
				error : function(req, status, error) {
						// do something with error   
				}
			});
		}
</script>