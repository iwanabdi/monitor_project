<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Laporan Material</h1>
      <p class="mb-4">Laporan Data Keluar</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  
  <!-- DataTales Example -->
  <form method="post" action="<?= site_url('laporan_material/data_keluar')?>">
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-12 p-0 p-1">
        <h5 class="m-1 font-weight-bold text-primary">Barang Keluar</h5>
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
      <a href="<?= site_url('laporan_material/data_keluar')?>" class="btn btn-danger btn-block" id="btn">
      <i class="fas fa-user-plus"></i> Reset
      </a>
    </div>
	  </form>
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
  		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Material ID</th>
              <th>Nama Material</th>
              <th>QTY</th>
              <th>Transaksi GI</th>
              <th>Keterangan</th>
              <th>IO</th>
              <th>Reservasi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
              <th>No</th>
              <th>Material ID</th>
              <th>Nama Material</th>
              <th>QTY</th>
              <th>Transaksi GI</th>
              <th>Keterangan</th>
              <th>IO</th>
              <th>Reservasi</th>
            </tr>
          </tfoot>
          <tbody>
      		<?php $no = 1;
	            foreach ($row->result() as $key => $data)  {?>
	            <tr>
                <td><?=$no++;?></td>
                <td><?=$data->material_id;?></td>
                <td><?=$data->nama_material;?></td>
                <td><?=$data->qty;?></td>
                <td><?=$data->gi_no;?></td>
                <td><?=$data->no_wo;?></td>
                <td><?=$data->io;?></td>
                <td><?=$data->reservasi_no;?></td>
	            </tr>
            <?php } ?>
          	<!-- <?= print_r($row);?> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

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

