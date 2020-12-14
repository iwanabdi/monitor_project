<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Laporan Mitra</h1>
      <p class="mb-4">Laporan Data Mitra</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  
  <!-- DataTales Example -->
  <form method="post" action="<?= site_url('Laporan_mitra/data_mitra')?>">
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-2 p-0 p-1">
        <h5 class="m-1 font-weight-bold text-primary">Pilih Mitra</h5>
      </div>
	<div class="input-group mb-4 p-1 col-8">
		<div class="input-group">
	  		<select name="project[]" id="project[]" class="form-control custom-select project" required>
				<option selected disabled value="">-- Pilih Mitra --</option>
				<?php if ($this->session->userdata('status') == 0): ?>
					<?php foreach ($row->result() as $key => $data) {?>
						<option value="<?= $data->mitra_id;?>"><?=$data->nama_mitra;?></option>
					<?php }?>
				<?php endif ?>

				<?php if ($this->session->userdata('status') != 0): ?>
					<?php foreach ($row->result() as $key => $data) {?>
							<option value="<?= $data->mitra_id;?>" <?php if ($data->mitra_id == $this->session->userdata('status')): ?>
								selected
							<?php endif ?>><?=$data->nama_mitra;?></option>
					<?php }?>
				<?php endif ?>
			</select>
		</div>
	</div>
	<input type="hidden" name="status" id="status">
	<div class="col-1 p-1 mx-auto">
	  <button type="submit" class="btn btn-success btn-block" id="btn">
	  <i class="fas fa-check"></i> Pilih
	  </button>
	</div>
    <div class="col-1 p-1 mx-auto">
      <a href="<?= site_url('laporan_mitra')?>" class="btn btn-danger btn-block" id="btn">
      <i class="fas fa-user-plus"></i> Reset
      </a>
    </div>
  </form>   
    </div>
    	<?php if ($this->session->userdata('status') != 0): ?>
		    <div class="row" id="details">
			    	<!-- Card line 1 -->
			    <div class="col-xl-6 col-md-6 mb-4">
			      <div class="card-img h-100 py-2">
			        <div class="card-body">
			          <div class="row no-gutters align-items-center">
			            <img src="<?= base_url('assets/img/01.svg')?>" width="100%">
			          </div>
			        </div>
			      </div>
			    </div>
			    <div class="col-xl-6 col-md-6 mb-4">
			      <div class="card-img h-100 py-2">
			        <div class="card-body">

			          <div class="form-group row">
			            <label class="col-sm-3 col-form-label">Jumlah Project</label>
			            <div class="col-sm-9">
			            	<?php foreach ($jproject->result() as $key => $data): ?>
			            		<input type="text" class="form-control" id="jumlah_project" name="jumlah_project" required
			              			value="<?= $data->jumlah;?>" readonly="">
			              			<?php $jumlah = $data->jumlah ?>
			            	<?php endforeach ?>
			            </div>
			          </div>

			          <div class="form-group row">
			            <label class="col-sm-3 col-form-label">Status Project</label>
			            <div class="col-sm-9">
			            <?php foreach ($rows as $key => $data) {?>
			            	<?php if ($data->status_project == 1): ?>
			            		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Disposisi : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 2): ?>
			            		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Survey : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 3): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Progres : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 4): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Testcom : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 5): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Dokumen : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 6): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="QC OK : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 7): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="BAPS : <?= $data->qty?>" readonly="">
			            	<?php endif ?>

			            	<?php if ($data->status_project == 8): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="Close : <?= $data->qty?>" readonly="">
			            	<?php endif ?>
			            <?php } ?>

			            </div>
			          </div>

					  <div class="row no-gutters align-items-center">
			            <div class="col mr-2">
							  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Performa Mitra</div>
							  <div class="progress">
									<?php foreach ($performa as $key => $data) {?>
										<?php if ($data->performa == "tepat waktu"): ?>
											<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
											value="<?= $data->jumlah?> project" readonly="">
										<?php endif ?>
									<?php } ?>
							   </div>
							<div class="progress">

								<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
							</div>
			              </div>
			            </div>
			          
			          </div>
					
								

			          <div class="form-group row" style="margin-top: 10px;">
			            <label class="col-sm-3 col-form-label">Tepat Waktu</label>
			            <div class="col-sm-9">
						<?php foreach ($performa as $key => $data) {?>
							<?php if ($data->performa == "tepat waktu"): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="<?= $data->jumlah?> project" readonly="">
			            	<?php endif ?>
						<?php } ?>
			            </div>
					  </div>
					  <div class="form-group row" style="margin-top: 10px;">
			            <label class="col-sm-3 col-form-label">Terlambat</label>
			            <div class="col-sm-9">
						<?php foreach ($performa as $key => $data) {?>
							<?php if ($data->performa == "terlambat"): ?>
			              		<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
			              		value="<?= $data->jumlah?> project" readonly="">
			            	<?php endif ?>
						<?php } ?>
			            </div>
			          </div>
			          

			        </div>
			      </div>
			    </div>
		    </div>
    	<?php endif ?>

	</div>

</div>
<!-- .container-fluid -->
<script type="text/javascript">

	$(document).ready(function() {
		$('.project').change(function() {
			var id = $(this).val();
			// alert(id);
			$('#status').val(id);
		});
	});

</script>
