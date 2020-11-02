<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    
    <div class="col-12 py-2 border-bottom-secondary ">
      <div class="py-2 mx-2 row">
        <div class="mr-auto text-gray-800">
          <p class="mb-1">Upload File</p>
		  <h3><?= $this->session->id?></h3>
		 
		</div>		
      </div>
    </div>
  </div>
  <div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Upload File</h5>
			<div class="right">
				<a href="<?= site_url('C_survey')?>" class="btn btn-warning">	
					<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<?php echo form_open_multipart('C_survey/uploadmap/'.$this->session->id)?>
	    	<div class="card-body">
		        <div class="form-group row">
					<input type="hidden" value="<?= $this->session->id?>" name="map">
		          <label class="col-sm-3 col-form-label">Upload File MAP</label>
		            <div class="col-sm-9">
						<div class="custom-file">
								<input type="file" class="custom-file-input" name="berkas" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Masukan File Map</label>
					
						</div>
						<button type="submit" class="btn btn-success" name="add"><i class="fas fa-paper-plane"></i> Upload</button>
						
						<?= $this->session->flashdata('pesan'); ?>
						
				    </div>
		        </div>
			</div> 
		   
		<?php echo form_close()?>

		<?php echo form_open_multipart('C_survey/uploadxl')?>
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Upload File MAP</label>
		            <div class="col-sm-9">
						<div class="custom-file">
								<input type="file" class="custom-file-input"name="berkas" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Masukan File excel</label>
					
						</div>
						<button type="submit" class="btn btn-success" ><i class="fas fa-paper-plane"></i> Upload</button>
				    </div>
		        </div>
			</div> 
		   
		<?php echo form_close()?>
  </div>
</div>


 