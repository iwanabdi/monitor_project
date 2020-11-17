<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Create Godd Issue</h5>
				<div class="right">
					<a href="<?= site_url('GI')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('GI/posting')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nomer Reservasi</label>
		          <div class="col-sm-9">
		            <div class="input-group">
					  <input type="text" class="form-control" name="reservasi_no" id="reservasi_no" value="<?=$reservasi->reservasi_no?>" readonly required>
		            </div>
		          </div>
				</div>	
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">IO Number</label>
		          <div class="col-sm-9">
		            <div class="input-group">
					  <input type="text" class="form-control" name="IO" id="IO" value="<?=$reservasi->IO?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Mitra</label>
		          <div class="col-sm-9">
		            <div class="input-group">
					  <input type="hidden" class="form-control" name="mitra_id" id="mitra_id" value="<?=$mitra->mitra_id?>" readonly required>
					  <input type="text" class="form-control" name="mitra_nama" id="mitra_nama" value="<?=$mitra->nama_mitra?>" readonly required>
		            </div>
		          </div>
				</div>
				
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>Material ID</th>
							<th>Nama Material</th>
							<th>SN</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($dreservasi->result() as $key => $data)  {
							for ($i=0; $i < $data->qty; $i++) {?>
							<tr>
							<td><input type="text" class="form-control" name="material_id[]" id="material_id[]" value="<?=$data->material_id?>" readonly required></td>
							<td><input type="text" class="form-control" name="nama_material[]" id="nama_material[]" value="<?=$data->nama_material?>" readonly required></td>
							<td><input type="text" class="form-control" name="sn[]" id="sn[]" required></td>
							</tr>
						<?php }} ?>
					</tbody>
				</table>


            </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Create</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->
