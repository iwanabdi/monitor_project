<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Laporan PM</h1>
      <p class="mb-4">Laporan Data Project PM</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  
  <!-- DataTales Example -->
  <form method="post" action="<?= site_url('laporan_material/data_masuk')?>">
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-2 p-0 p-1">
        <h5 class="m-1 font-weight-bold text-primary">Barang Masuk</h5>
      </div>
	<div class="input-group mb-4 p-1 col-8">
		<div class="input-group">
	  		<select name="project[]" id="project[]" class="form-control custom-select project" required>
				<option selected disabled value="">-- Pilih PM --</option>
				<?php foreach ($row->result() as $key => $data) {?>
					<option value="<?= $data->pegawai_id;?>"><?=$data->nama_pegawai;?></option>
				<?php }?>
			</select>
		</div>
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

    <div class="row">
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
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="10" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Status Project</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Disposisi : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Survey : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Progres : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Testcom : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Dokumen : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="QC OK : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="BAPS : " readonly="">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="Close : " readonly="">
            </div>
          </div>
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Performa PM</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    8
                  </div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 8%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-project-diagram fa-2x"></i>
            </div>
          </div>
          <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-3 col-form-label">Tepat Waktu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="8 Project" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Terlambat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
              value="2 Project" readonly="">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>





  	

</div>
<!-- /.container-fluid