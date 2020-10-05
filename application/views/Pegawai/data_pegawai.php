<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Pegawai</h1>
      <p class="mb-4">Edit atau tambah data untuk pegawai disini</p>
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
        <h5 class="m-0 font-weight-bold text-primary">DataTables Pegawai</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#add_data">
        <i class="fas fa-user-plus"></i> Add Pegawai
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>ID</th>
              <th>Nama Pegawai</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Jabatan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
              <th>No</th>
              <th>ID</th>
              <th>Nama Pegawai</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Jabatan</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data->pegawai_id?></td>
              <td><?=$data->nama_pegawai?></td>
              <td><?=$data->email?></td>
              <td><?=$data->no_telp?></td>
              <td>
                <?php if ($data->jabatan == 0) {
                  echo "SPV";
                } else if($data->jabatan == 1) {
                  echo "PM";
                } else if($data->jabatan == 2) {
                  echo "Admin";
                } else if($data->jabatan == 3) {
                  echo "Gudang";
                } else if($data->jabatan == 4) {
                  echo "QC";
                } else{
                  echo "Developer";
                }
                ?>
              </td>
              <td class="text-center" colspan="2">
                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit_modal<?=$data->pegawai_id; ?>">
                    <i class="fas fa-user-edit"></i>
                  </button>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->pegawai_id;?>">
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


<!-- Modal Untuk Tambah Data -->
<div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_pegawai/proses_add_data'); ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="nama_pegawai" name="nama_pegawai" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jabatan</label>
          <div class="col-sm-9">
            <select name="jabatan" id="jabatan" class="form-control custom-select" required>
              <option selected disabled value="">--Pilih Jabatan--</option>
              <option value="0">SPV</option>
              <option value="1">PM</option>
              <option value="2">Admin</option>
              <option value="3">Gudang</option>
              <option value="4">QC</option>
              <?php if ($this->session->userdata('jabatan') == -1):?>
                <option value="-1">Developer</option>
              <?php endif ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Create By</label>
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
<!-- Akhir Modal Tambah -->

<!-- Modal Untuk Edit Data -->
<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="edit_modal<?=$data->pegawai_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_pegawai/proses_edit_data'); ?>

        <input type="hidden" id="id" name="id" value="<?= $data->pegawai_id?>">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required=""value="<?= $data->nama_pegawai;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $data->no_telp;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" value="<?= $data->email;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" placeholder="********">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jabatan</label>
          <div class="col-sm-9">
            <select name="jabatan" id="jabatan" class="form-control custom-select"
            <?= $data->jabatan == -1 ? 'disabled' : "" ?>>
              <option value="0" <?php if ($data->jabatan == 0): ?>
                selected
              <?php endif ?>>SPV              
              </option>
              <option value="1" <?php if ($data->jabatan == 1): ?>
                selected
              <?php endif ?>>PM              
              </option>
              <option value="2" <?php if ($data->jabatan == 2): ?>
                selected
              <?php endif ?>>Admin              
              </option>
              <option value="3" <?php if ($data->jabatan == 3): ?>
                selected
              <?php endif ?>>Gudang              
              </option>
              <option value="4" <?php if ($data->jabatan == 4): ?>
                selected
              <?php endif ?>>QC              
              </option>
              <?php if ($this->session->userdata('jabatan') == -1 && $data->jabatan == -1):?>
                <option value="-1" selected>Developer</option>
              <?php endif ?>
            </select>
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
<div class="modal fade" id="hapus_modal<?=$data->pegawai_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_pegawai/hapus_data'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->pegawai_id?>">
        <p>Anda akan menghapus data "<?=$data->nama_pegawai ?>"</p>
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