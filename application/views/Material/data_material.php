<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Material</h1>
      <p class="mb-4">Edit atau tambah data untuk Material disini</p>
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
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#add_data">
        <i class="fas fa-user-plus"></i> Add Material
        </button>
      </div>
			<?php }?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
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
            <tr>
            <th>No</th>
              <th>ID</th>
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
              <td><?=$data->material_id?></td>
              <td><?=$data->nama_material?></td>
              <td><?=$data->brand?></td>
              <td><?=$data->stok?></td>
              <td><?=$data->storage_bin?></td>
              <?php if ($this->session->userdata('jabatan')== -1 || $this->session->userdata('jabatan')== 3) {?>
								<td class="text-center" colspan="2">
									<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit_modal<?=$data->material_id; ?>">
											<i class="fas fa-user-edit"></i>
										</button>
									<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->material_id;?>">
											<i class="fas fa-user-times"></i>
										</button>
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


<!-- Modal Untuk Tambah Data -->
<div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_material/proses_add_data'); ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Material</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_material" name="nama_material" 
            required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Brand</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="brand" id="brand" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Stok</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="stok" id="stok" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Storage</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="storage_bin" id="storage_bin" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Create By</label required>
          <div class="col-sm-9">
            <input type="text" name="create_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!-- Modal Untuk Edit Data -->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="edit_modal<?=$data->material_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_material/proses_edit_data'); ?>

        <input type="hidden" id="id" name="id" value="<?= $data->material_id?>">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Material</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_material" name="nama_material" required="" value="<?= $data->nama_material;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Brand</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="brand" id="brand" value="<?= $data->brand;?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Stok</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="stok" id="stok" value="<?= $data->stok;?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Storage</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="storage_bin" name="storage_bin" value="<?= $data->storage_bin;?>" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Update By</label>
          <div class="col-sm-9">
            <input type="text" name="update_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
          </div>
        </div>
        <!-- <div class="form-group">
          <label>Create On</label>
          <input type="date" name="nama" class="form-control">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Edit-->

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
