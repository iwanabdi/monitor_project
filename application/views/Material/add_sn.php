<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah SN</h5>
			<div class="right">
				<a href="<?= site_url('master_material')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_material/proses_edit_data')?>" method="POST">
	    	<div class="card-body">

	    		<input type="hidden" id="id" name="id" value="<?= $row->material_id?>">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Stok</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="stok" id="stok" value="<?= $row->stok;?>" disabled>
		          </div>
		        </div>
		        <?php 

		        for ($i=1; $i <= $row->stok; $i++) { 
		        	if ($i%2 == 0) {
		        		echo '<div class="form-group row">
						          <label class="col-sm-3 col-form-label">SN-'.$i.'</label>
						          <div class="col-sm-9">
						            <input type="text" class="form-control" name="item" id="item">
						          </div>
						        </div>';
		        	}else{
				        	echo '<div class="form-group row">
					          <label class="col-sm-3 col-form-label">SN-'.$i.'</label>
					          <div class="col-sm-9">
					            <input type="text" class="form-control" name="item" id="item">
					          </div>
					        </div>';
			    	}
		        }?>

	    	</div>

	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>

	    </form>
	</div>
</div>