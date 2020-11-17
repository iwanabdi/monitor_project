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
    	<form action="<?= site_url('GI/lanjut')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nomer Reservasi</label>
		          <div class="col-sm-9">
		            <div class="input-group">
					  <input type="text" class="form-control" name="reservasi_no" id="reservasi_no" readonly required>
					  <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihreservasi" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>	
                <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Mitra</label>
		          <div class="col-sm-9">
		            <div class="input-group">
					  <input type="text" class="form-control" name="mitra_id" id="mitra_id" readonly required>
					  <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihmitra" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>
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


<!-- Modal reser-->
<div class="modal fade" id="pilihreservasi" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Reservasi</h5>
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
                <th>Nomer Reservasi</th>
                <th>IO</th>
                <th>WO</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($reservasi->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->reservasi_no?></td>
                <td><?=$data->IO?></td>
				<td><?=$data->WO?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectr"
					data-id="<?= $data->reservasi_no?>">Pilih
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
    $(document).on('click', '#selectr', function() {
      var reser = $(this).data('id');
      $('#reservasi_no').val(reser);
      $('#pilihreservasi').modal('hide');
    })
  })
</script>
<!-- Akhir Modal reser Data -->

<!-- Modal mitra-->
<div class="modal fade" id="pilihmitra" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Mitra Yang Ambil</h5>
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
                <th>Nomer Reservasi</th>
                <th>IO</th>
                <th>WO</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($reservasi->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->reservasi_no?></td>
                <td><?=$data->IO?></td>
				<td><?=$data->WO?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectr"
					data-id="<?= $data->reservasi_no?>">Pilih
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
    $(document).on('click', '#selectr', function() {
      var reser = $(this).data('id');
      $('#mitra_id').val(reser);
      $('#pilihmitra').modal('hide');
    })
  })
</script>
<!-- Akhir Modal mitra Data -->
