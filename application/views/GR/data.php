<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Good Receipt</h1>
      <p class="mb-4">Data Semua GR</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data GR</h5>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Nomer GR</th>
              <th>Project Name</th>
              <th>Project Manager</th>
              <th>Mitra</th>
              <th>Nomer PO</th>
              <th>Nilai PO</th>
              <th>Dev Date</th>
							<th>GR Date</th>
							<th>Nilai GR</th>
              <th width="10%">Opsi</th>
              <th>Approve</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($gr->result() as $key => $data)  {
              ?>
            <tr>
                <td><?=$data->gr_no?></td>
                <td><?=$data->pa_id?></td>
                <td><?=$data->pm?></td>
                <td><?=$data->mitra?></td>
                <td><?=$data->po_no?></td>
                <td>Rp. <?=$data->net_price?></td>
                <td><?=$data->devdate_po?></td>
                <td><?=$data->createon_gr?></td>
                <td>Rp. <?=$data->net_value?></td>
                <td class="text-center">
                  <?php if($data->gr_no == null) {?>
                  <a href="<?= site_url('GR/create/'.$data->po_no)?>" class="btn btn-success"><i class="fas fa-paper-plane"></i>Create</a> 
                  <?php } ?>
                  <?php if($data->gr_no != null) {?>
                  <a href="<?= site_url('GR/edit/'.$data->gr_no)?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a> 
                  <?php } ?>
                  <!-- <?php if($data->statusgr == 1 ) {?>           
                  <a href="<?= site_url()?>" class="btn btn-success"><i class="fas fa-download"></i>PDF</a>
                  <?php } ?> -->
              </td>
              <td class="text-center">
                <?php if($data->statusgr == 1) {  
                  echo "<a href='#' class='btn btn-success btn-circle'><i class='fas fa-check'></i></a>";
                }else if ($data->po_no != null || $data->status != 1){?>
                    <a href="<?= site_url('GR/approve/'.$data->gr_no)?>" class="btn btn-danger btn-circle"><i class="fas fa-check"></i></a>
                <?php } ?> 
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