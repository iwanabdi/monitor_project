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

<!-- Modal PM -->
<div class="modal fade" id="pilihpm" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr class="text-center">
                <th>ID</th>
                <th>Nama Project Manager</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
			<?php
              foreach($material->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->pegawai_id?></td>
                <td><?=$data->nama_pegawai?></td>
                <td class="text-center">
					<button class="btn btn-info" id="selectpm"
					data-id="<?= $data->pegawai_id?>" 
					data-nama="<?= $data->nama_pegawai?>"
					data-pilih="<?= $data->nama_pegawai?>">Pilih
					</button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#selectpm', function() {
      let pm_id = $(this).data('id');
      let nama_pm = $(this).data('nama');
      $('#pm_id').val(pm_id);
      $('#nama_pm').val(nama_pm);
      $('#pilihpm').modal('hide');
    });
  });
</script>
<!-- akhir modal PM -->

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
					Baris += '<input type="text" class="form-control" name="MID'+No+'" id="MID" disabled="" required>';
				Baris += '</td>';
                Baris += '<td>';
					Baris += '<button type="button" class="btn btn-info btn-flat" data-toggle="modal'+No+'" data-target="#pilihio" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i></button>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="number" name="jumlah'+No+'" id="jumlah'+No+'" class="form-control" required>';
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
