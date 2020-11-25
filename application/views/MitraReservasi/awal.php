<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Awal Create Reservasi</h5>
				<div class="right">
					<a href="<?= site_url('project')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('reservasi/proses_masuk')?>" method="POST">
        <input type="hidden" class="form-control" name="project_id" id="project_id" required>
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Pilih IO Number Project</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="IO" id="IO" disabled="" required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihio" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>	
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Project ID</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="project_id1" id="project_id1" disabled="" required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Customer Name</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_customer" id="nama_customer" disabled="" required>
		            </div>
		          </div>
				</div>
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Project Manager</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" disabled="" required>
		            </div>
		          </div>
				</div>
            </div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Next</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->

<!-- Modal customer-->
<div class="modal fade" id="pilihio" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Customer</h5>
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
                <th>IO Number</th>
                <th>Project ID</th>
                <th>Nama Customer</th>
                <th>Project Manager</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($project->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->IO?></td>
                <td><?=$data->project_id?></td>
                <td><?=$data->nama_customer?></td>
                <td><?=$data->nama_pegawai?></td>
                <td class="text-center">
                <button class="btn btn-info" id="select"
                data-io="<?= $data->IO?>" 
                data-project_id="<?= $data->project_id?>"
                data-nama_customer="<?= $data->nama_customer?>"
                data-nama_pegawai="<?= $data->nama_pegawai?>">Pilih
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
    $(document).on('click', '#select', function() {
      var IO = $(this).data('io');
      var project_id = $(this).data('project_id');
      var nama_customer = $(this).data('nama_customer');
      var nama_pegawai = $(this).data('nama_pegawai');
      $('#IO').val(IO);
      $('#project_id').val(project_id);
      $('#project_id1').val(project_id);
      $('#nama_customer').val(nama_customer);
      $('#nama_pegawai').val(nama_pegawai);
      $('#pilihio').modal('hide');
    })
  })
</script>
<!-- Akhir Modal customer Data -->