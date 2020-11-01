
<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-default.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Surat Tugas</h5>
	    </div>
    	<form action="<?= site_url('project/proses_add_data')?>" method="POST">
	    	<div class="card-body">

				<div class="form-group row">
		          <input type="hidden" name="project_id" id="project_id" required="">
		          <label class="col-sm-3 col-form-label">Pilih Project</label>
		          <div class="col-sm-9">
		            <div class="input-group">
						<select class="select-move form-control custom-select" required multiple>
							<!-- <optgroup label="Project"> -->
								<?php foreach($project->result() as $key => $data){?>
									<option data-description=""><?= $data->project_id?></option>
								<?php } ?>
								<!-- <option data-description="Tahun 2020">Project 1</option>
								<option data-description="Tahun 021">Project 2</option>
								<option data-description="Tahun 2132">Project 3</option> -->
							<!-- </optgroup> -->
						</select>
						<div class="col-6 mx-auto" id="tail-move-container"></div>
		            </div>
		          </div>
				</div>

				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Tentukan Target Date</label>
				</div>
				<div id="cetak"></div>

				<!-- <div class="form-group row">
				  <label class="col-sm-3 col-form-label"></label>
				  <label class="col-sm-9 col-form-label" >sukses</label>
				  
		         
				</div> -->
	    	</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
				<a href="<?= site_url('C_stg/coba')?>"><button type="button" class="btn btn-success" id="cetakkk"><i class="fas fa-paper-plane"></i> tes</button></a>
			</div>
       
    	</form>
  </div>
  <!-- End Card -->

</div>

<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/tail.select/js/tail.select-full.js"></script>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		tail.select(".select-move", {
		search: true,
		descriptions: true,
		hideSelected: true,
		hideDisabled: true,
		multiLimit: 10,
		multiShowCount: false,
		multiContainer: "#tail-move-container"
		});
	});
</script>
