<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Purchase Order</h1>
      <p class="mb-4">Data Semua PO</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data PO</h5>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Nomer PO</th>
              <th>Project Name</th>
              <th>Project Manager</th>
              <th>Mitra</th>
              <th>Nomer PR</th>
              <th>Nilai PR</th>
              <th>Tanggal Request</th>
              <th>Nilai PO</th>
              <th>Dev Date</th>
              <th>Opsi</th>
              <th>Approve</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($po->result() as $key => $data)  {
              ?>
            <tr>
              <td><?=$data->po_no;?></td>
              <td><?=$data->project_name?></td>
              <td><?=$data->pm?></td>
      			  <td><?=$data->mitrapr?></td>
      			  <td><?=$data->pr_no?></td>
      			  <td>Rp. <?=$data->sub_total?></td>
      			  <td><?=$data->tgl_pr?></td>
      			  <td>Rp. <?=$data->net_price?></td>
      			  <td><?=$data->devdate_po?></td>
              <td>
                <?php if($data->po_no == null) {?>
                  <a href="<?= site_url('PO/create/'.$data->pr_no)?>" class="btn btn-success"><i class="fas fa-paper-plane"></i>Create</a>
                <?php } ?>     
                <?php if($data->po_no != null) {?>           
                <a href="<?= site_url('PO/edit/'.$data->pr_no)?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                <?php } ?>    
                <?php if($data->status == 1 ) {?>           
                <a href="<?= site_url()?>" class="btn btn-success"><i class="fas fa-download"></i>PDF</a>
                <?php } ?>    
              </td>
              <td>
                <?php if($data->status == 1) {  
                  echo "<a href='#' class='btn btn-success btn-circle'><i class='fas fa-check'></i></a>";
                }else if ($data->po_no != null || $data->status != 1){?>
                    <a href="<?= site_url('PO/approve/'.$data->pr_no)?>" class="btn btn-danger btn-circle"><i class="fas fa-check"></i></a>
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