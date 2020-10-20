<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Project</h1>
      <p class="mb-4">Data Semua Project</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data product</h5>
      </div>
      <div class="col-2 p-0">
        <a href="<?= site_url('project/add')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-user-plus"></i> Add Project
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
				<th>Project ID</th>
				<th>Customer Name</th>
				<th>Status</th>
              	<th>Aging</th>
              	<th>Product</th>
				<th>IO</th>
				<th>SID</th>
				<th>Project Manager</th>
				<th>Alamat</th>
				<th>Create On</th>
				<th>Dispos</th>			  
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$data->project_id?></td>
              <td><?=$data->nama_customer?></td>
              <td>#nanti</td>
              <td>#nanti</td>
              <td><?=$data->nama_product?></td>
			  <td>#generate</td>
              <td>#generate</td>
			  <td><?=$data->nama_pegawai?></td>
			  <td><?=$data->jalan?> <?=$data->kota?> ,<?=$data->provinsi?></td>
			  <td><?=$data->create_on?></td>
              <td class="text-center">
                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->product_id;?>" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-user-times"></i>
                </button>
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

<!-- Modal Hapus Data-->

<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->product_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_product/hapus_data'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->product_id?>">
        <p>Anda akan menghapus data "<?=$data->nama_product ?>"</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-danger" type="submit">Hapus</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Hapus Data -->
