<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Surat Tugas</h1>
      <p class="mb-4">Data STG Semua STG</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-10 p-0 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Data STG</h5>
      </div>
      <?php if ($this->session->userdata('jabatan')==2 || $this->session->userdata('jabatan')==-1){?>
        <div class="col-2 p-0">
          <a href="<?= site_url('C_stg/buat')?>" class="btn btn-success btn-block" id="btn">
          <i class="fas fa-plus"></i> BUAT STG
          </a>
        </div>
      <?php }?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Nomer STG</th>
              <th>Project ID</th>
              <th>Customer Name</th>
              <th>Project Manager</th>
              <th>Mitra</th>
              <th>Tanggal Request</th>
              <th>File STG</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($project->result() as $key => $data)  {?>
            <tr>
              <td><?=$data->no_stg?></td>
              <td><?=$data->project_id?></td>
              <td><?=$data->nama_customer?></td>
              <td><?=$data->nama_pegawai?></td>
              <td><?=$data->nama_mitra?></td>
              <td><?=$data->create_on?></td>
              <td style="text-align:center">
                <?php if ($data->no_stg == ""): ?>
                  <a href="#" onclick="not_cetak()" class="btn btn-danger btn-circle"><i class="fas fa-print"></i>
                </a>
                <?php else: ?>
                  <a href="<?= site_url('C_stg/cetak_stg/'.$data->no_stg)?>" target="_blank" class="btn btn-warning btn-circle"><i class="fas fa-print"></i>
                </a>
                <?php endif ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<script type="text/javascript">
  function not_cetak()
  {
    alert("File STG Untuk Project Ini Belum Dibuat");
  }
</script>