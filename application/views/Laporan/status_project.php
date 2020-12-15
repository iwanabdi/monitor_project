<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Status Project</h1>
      
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  
  <!-- DataTales Example -->
  <form method="post" action="<?= site_url('Laporan_staspro/data_project')?>">
  <div class="card shadow mb-12">
		<div class="row card-header col-12 mx-auto">
		<div class="col-12 p-0 p-1">
			<h5 class="m-1 font-weight-bold text-primary">Status Poject</h5>
		</div>
			<div class="input-group mb-3 p-1 col-5">
				<div class="input-group-prepend">
					<span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
				</div>
				<?php if ($this->session->userdata('status') == 0) {?>
					<input type="text" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal" 
					aria-label="Tanggal Awal" aria-describedby="basic-addon1" readonly=""/>
				<?php } ?>
				<?php if ($this->session->userdata('status') == 1) {?>
					<input type="text" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal" 
					aria-label="Tanggal Awal" aria-describedby="basic-addon1" readonly="" value="<?= $tgl_awal;?>"/>
				<?php } ?>
			</div>
			<div class="input-group mb-3 p-1 col-5">
				<div class="input-group-prepend">
					<span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
				</div>
				<?php if ($this->session->userdata('status') == 0) {?>
					<input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Akhir" aria-label="Tanggal Akhir" aria-describedby="basic-addon1" readonly=""/>
				<?php } ?>
				<?php if ($this->session->userdata('status') == 1) {?>
					<input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Akhir" aria-label="Tanggal Akhir" aria-describedby="basic-addon1" readonly="" value="<?= $tgl_akhir;?>"/>
				<?php } ?>
			</div>
			<div class="col-1 p-1 mx-auto">
			<button type="submit" class="btn btn-success btn-block" id="btn">
			<i class="fas fa-user-plus"></i> Submit
			</button>
			</div>
		<div class="col-1 p-1 mx-auto">
		<a href="<?= site_url('laporan_material/data_masuk')?>" class="btn btn-danger btn-block" id="btn">
		<i class="fas fa-user-plus"></i> Reset
		</a>
		</div>
		</form>
      
	</div>
	<?php if ($this->session->userdata('status') != 0): ?>
		<div class="row">
			<div class="col">
				<div class="card-img h-100 py-1">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<img src="<?= base_url('assets/img/01.svg')?>" width="100%">
						</div>
					</div>
				</div>
					
			</div>
			<div class="col">
				<!-- row ke 1 -->
				<div class="form-group row" style="margin-top: 10px;">
					<label class="col-sm-3 col-form-label">Jumlah PA</label>
					<div class="col-sm-9">
							<?php foreach ($pa as $key => $data) {?>
								<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
									value="<?= $data->jumlahpa?> project" readonly="">
								
							<?php } ?>
					</div>
				</div>
				
				<!-- row ke 2 -->
				<div class="form-group row" style="margin-top: 10px;">
					<label class="col-sm-3 col-form-label">On Proses</label>
					<div class="col-sm-9">
							<?php foreach ($onproses as $key => $data) {?>
								<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
									value="<?= $data->jumlahonproses?> project" readonly="">
								
							<?php } ?>
					</div>
				</div>

				<!-- row ke 3 -->
				<div class="form-group row" style="margin-top: 10px;">
					<label class="col-sm-3 col-form-label">Testcom</label>
					<div class="col-sm-9">
							<?php foreach ($testcom as $key => $data) {?>
								<input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
									value="<?= $data->jumlahtestcom?> project" readonly="">
								
							<?php } ?>
					</div>
				</div>
			</div>

		</div>
	<?php endif ?>


		

</div>
<!-- /.container-fluid -->
<script>
	$( function() {
		$( "#tgl_awal" ).datepicker({
			"dateFormat" : "yy-mm-dd"
			});
		$( "#tgl_akhir" ).datepicker({
			"dateFormat" : "yy-mm-dd"
			});
	});
</script>

