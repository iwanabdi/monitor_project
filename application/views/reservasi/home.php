<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Resrvasi</h1>
      <p class="mb-4">Data Semua Reservasi yang masih aktif</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data Reservasi</h5>
      </div>
      <div class="col-2 p-0">
        <a href="<?= site_url('reservasi/create')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-plus"></i> Buat Reservasi
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
    				  <th>No Rerservasi</th>
      				<th>IO</th>
            	<th>WO</th>
      				<th>Create By </th>
      				<th>Create On </th>
      				<th>Opsi</th>
      				<th>Print</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
      				<th>No Rerservasi</th>
      				<th>IO</th>
            	<th>WO</th>
      				<th>Create By </th>
      				<th>Create On </th>
      				<th>Opsi</th>
            	<th>Print</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            foreach ($reservasi->result() as $key => $data)  {?>
            <tr>
              <td><?=$data->reservasi_no;?></td>
              <td><?=$data->IO?></td>
              <td><?=$data->no_wo?></td>
      			  <td><?=$data->nama_pembuat?></td>
      			  <td><?=$data->create_on?></td>
              <td class="text-center" >
                <a href="<?= site_url('reservasi/edit/'.$data->reservasi_no)?>" class="btn btn-warning btn-circle">
                    <i class="fas fa-edit"></i>
                </a>
		          </td>
              <td class="text-center">
                  <a href="<?= site_url('reservasi/cetak_reservasi/'.$data->reservasi_no)?>" target="_blank" class="btn btn-info btn-circle"><i class="fas fa-print"></i>
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
