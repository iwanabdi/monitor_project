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
      <?php if ($this->session->userdata('jabatan')==2){?>
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
              <th>Nomer PO</th>
              <th>Project ID</th>
              <th>Project Manager</th>
              <th>Mitra</th>
              <th>Nilai</th>
              <th>Tanggal Request</th>
              <th>Create PO</th>
              <th>Approve PO</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->