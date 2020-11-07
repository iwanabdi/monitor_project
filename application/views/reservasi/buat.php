<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Create Reservasi</h5>
				<div class="right">
					<a href="<?= site_url('reservasi')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('reservasi/proses_reservasi')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">IO Number </label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="IO" id="IO" readonly value="<?= $project->IO?>" required>
		            </div>
		          </div>
				</div>	
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">NO WORK ORDER</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="project_id" id="project_id" value="<?= $project->project_id?> <?= $project->nama_customer?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">LOKASI</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $project->jalan_ter?> <?= $project->kota_ter?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Project Manager</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $project->nama_pegawai   ?>" readonly required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
				<label class="col-sm-3 col-form-label">Project dan Tanggal</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<!-- <th class="text-center">No</th> -->
									<th class="text-center">Material</th>
                                    <th class="text-center"></th>
									<th class="text-center">Jumlah</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_material"><i class="fas fa-plus-circle"></i> Add Material</button></th>
								</tr>
							</thead>
							<tbody></tbody>
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
		var Baris = '<tr>';
				Baris += '<td>';
					Baris += '<input type="text" class="form-control" name="IO" id="IO" disabled="" required>';
				Baris += '</td>';
                Baris += '<td>';
					Baris += '<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihio" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i></button>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="number" name="tgl_stg[]" id="tgl_stg[]" class="form-control tgl_stg" required>';
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