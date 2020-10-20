<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master product</h1>
      <p class="mb-4">Data Semua Product</p>
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
        <a href="<?= site_url('master_product/add')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-plus"></i> Add Product
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
						<th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama Product</th>
              <th>Bandwith</th>
              <th>Satuan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
  						<th>No</th>
              <!-- <th>ID</th> -->
  						<th>Nama Product</th>
              <th>Bandwith</th>
              <th>Satuan</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <!-- <td><?=$data->product_id?></td> -->
              <td><?=$data->nama_product?></td>
              <td><?=$data->bandwith?></td>
              <td><?=$data->satuan?></td>
              <td class="text-center" colspan="2">
                <a href="<?= site_url('master_product/edit/'.$data->product_id)?>" class="btn btn-warning btn-circle">
                    <i class="fas fa-edit"></i>
                  </a>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->product_id;?>" data-backdrop="static" data-keyboard="false">
                    <i class="fas fa-trash-alt"></i>
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
