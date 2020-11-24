<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Good Issue Material</h1>
      <p class="mb-4">Data Semua Good Issue</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data Good Issue Material</h5>
      </div>
      <div class="col-2 p-0">
        <a href="<?= site_url('GI/create')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-plus"></i> Buat GI
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
							<th>No GI</th>
							<th>IO</th>
							<th>WO</th>
							<th>Create By</th>
							<th>Create On</th>
							<th>Print</th>
							<th>Print Serah Terima</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($GI->result() as $key => $data)  {?>
            <tr>
              <td><?=$data->gi_no;?></td>
              <td><?=$data->IO?></td>
              <td><?=$data->no_wo?></td>
							<td><?=$data->nama_pegawai?></td>
							<td><?=$data->create_on?></td>
							<td class="text-center">
                <a href="<?= site_url('gi/unduh_gi/'.$data->gi_no)?>" target="_blank" class="btn btn-success"><i class="fas fa-download"></i> PDF
                </a>
              </td>
							<td class="text-center">
                <a href="<?= site_url('gi/surat_jalan/'.$data->gi_no)?>" target="_blank" class="btn btn-success"><i class="fas fa-download"></i> PDF
                </a>
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
