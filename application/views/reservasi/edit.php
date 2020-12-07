<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Edit Reservasi</h5>
				<div class="right">
					<a href="<?= site_url('reservasi')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('reservasi/edit_reservasi')?>" method="POST">
	    	<div class="card-body">
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Reservasi </label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="reservasi_no" id="reservasi_no" readonly value="<?=$reservasi->reservasi_no?>" required>
		            </div>
		          </div>
				</div>	
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">IO Number </label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="IO" id="IO" readonly value="<?=$reservasi->IO?>" required>
		            </div>
		          </div>
				</div>	
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">NO WORK ORDER</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="project_id" id="project_id" value="<?=$reservasi->no_wo?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">LOKASI</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?=$reservasi->lokasi?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?=$reservasi->nama_pembuat?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
				<label class="col-sm-3 col-form-label">Material dan Jumlah</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<!-- <th class="text-center">No</th> -->
									<th class="text-center">Material</th>
                                    <!-- <th class="text-center"></th> -->
									<th class="text-center">Jumlah</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_material"><i class="fas fa-plus-circle"></i> Add Material</button></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($dreservasi->result() as $key => $data)  {
									?>
									<tr>
										<td>
											<select name="material[]" id="material[]" class="form-control custom-select project" required>
												<?php foreach ($material->result() as $key => $data1) {?>
													<option value="<?= $data1->material_id;?>" 
													<?php if ($data->material_id==$data1->material_id) {?> selected <?php }?>>
													<?=$data1->nama_material;?></option>
												<?php }?>
											</select>
										</td>
										<td class="text-center"><input type="number" name="jumlah[]" id="jumlah[]" class="form-control" required value=<?=$data->qty;?>></td>
										<td class="text-center"> <button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
	    	    </div>
            </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Create</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->

<!-- JAVASCRIPT TAIL SELECT -->
<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?= base_url();?>assets/tail.select/js/tail.select-full.js"></script>

<script type="text/javascript">

	$(document).ready(function () {
		$('#add_material').click(function (e) {
			e.preventDefault();
			add_project();
		});
	});

	function add_project()
	{
		var No = $("#tableLoop tbody tr").length+1;
		var Baris = '<tr>';
				Baris += '<td>';
				Baris += '<select name="material[]" id="material[]" class="form-control custom-select project" required>\
								<option selected disabled value="">--Pilih Material--</option>\
								<?php foreach ($material->result() as $key => $data) {?>\
									<option value="<?= $data->material_id;?>"><?=$data->nama_material;?></option>\
								<?php }?>\
							</select>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="number" name="jumlah[]" id="jumlah[]" class="form-control" required>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button>';
				Baris += '</td>';
			Baris += '</tr>';

		$("#tableLoop tbody").append(Baris);
	}

	$(document).on('click', '#HapusBaris', function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
	});

</script>
