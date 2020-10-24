<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Material</h1>
      <p class="mb-4">Data Semua Material Yang Aktif</p>
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
        <h5 class="m-0 font-weight-bold text-primary">Data material</h5>
      </div>
      <?php if ($this->session->userdata('jabatan')== -1 || $this->session->userdata('jabatan')== 3) {?>
				<div class="col-2 p-0">
          <a href="<?= site_url('master_material/add')?>" class="btn btn-success btn-block" id="btn">
          <i class="fas fa-plus"></i> Add Material
          </a>
        </div>
			<?php }?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama material</th>
              <th>Brand</th>
              <th>Stok</th>
              <th>Storage</th>
              <?php if ($this->session->userdata('jabatan')== -1 || $this->session->userdata('jabatan')== 3) {?>
                <th>Opsi</th>
              <?php }?>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
            <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama material</th>
              <th>Brand</th>
              <th>Stok</th>
              <th>Storage</th>
              <?php if ($this->session->userdata('jabatan')== -1 || $this->session->userdata('jabatan')== 3) {?>
                <th>Opsi</th>
              <?php }?>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <!-- <td><?=$data->material_id?></td> -->
              <td><?=$data->nama_material?></td>
              <td><?=$data->brand?></td>
              <td><?=$data->stok?></td>
              <td><?=$data->storage_bin?></td>
              <?php if ($this->session->userdata('jabatan')== -1 || $this->session->userdata('jabatan')== 3) {?>
								<td class="text-center" colspan="3">
									<a href="<?= site_url('master_material/edit/'.$data->material_id)?>" class="btn btn-warning btn-circle">
                    <i class="fas fa-edit"></i>
                  </a>
									<!-- <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->material_id;?>" data-backdrop="static" data-keyboard="false">
											<i class="fas fa-trash-alt"></i>
										</button> -->
								</td>
							<?php }?>
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
<div class="modal fade" id="hapus_modal<?=$data->material_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapussssssssssss?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_material/hapus_data');?>
          <input type="hidden" id="id" name="id" value="<?=$data->material_id?>">
          <p>Anda akan menghapus data "<?=$data->nama_material ?>"</p>
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
