<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Mitra</h1>
      <p class="mb-4">Edit atau tambah data untuk mitra disini</p>
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
        <h5 class="m-0 font-weight-bold text-primary">DataTables Mitra</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#add_data">
        <i class="fas fa-user-plus"></i> Add Mitra
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
              <th>Nama mitra</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Alamat</th>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>
                <th>Opsi</th>
              <?php }?>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
              <th>No</th>
              <th>ID</th>
              <th>Nama mitra</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Alamat</th>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>
                <th>Opsi</th>
              <?php }?>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data->mitra_id?></td>
              <td><?=$data->nama_mitra?></td>
              <td><?=$data->email?></td>
              <td><?=$data->no_telp?></td>
              <td><?=$data->alamat?></td>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>         
              <td class="text-center" colspan="2">
                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit_modal<?=$data->mitra_id; ?>">
                    <i class="fas fa-user-edit"></i>
                  </button>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->mitra_id;?>">
                    <i class="fas fa-user-times"></i>
                  </button>
              </td>
              <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_mitra/proses_add_data'); ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="alamat" name="alamat" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="kota" name="kota" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Fax</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="fax" id="fax" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">NPWP</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="npwp" id="npwp" required>
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
          <label class="col-sm-3 col-form-label">Create By</label>
          <div class="col-sm-9">
            <input type="text" name="create_by" class="form-control" id="mitra_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
<div class="modal fade" id="edit_modal<?=$data->mitra_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_mitra/proses_edit_data'); ?>
        <input type="hidden" id="id" name="id" value="<?= $data->mitra_id?>">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" value="<?= $data->nama_mitra;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data->alamat;?>" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kota" name="kota" required="" value="<?=$data->kota;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $data->no_telp;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Fax</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="fax" id="fax" value="<?= $data->fax;?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">NPWP</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="npwp" id="npwp" value="<?= $data->npwp;?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" value="<?= $data->email;?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" placeholder="********">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Update By</label>
          <div class="col-sm-9">
            <input type="text" name="update_by" class="form-control" id="mitra_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
<?php endforeach; ?>
<!-- Akhir Modal Edit-->

<!-- Modal Hapus Data-->

<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->mitra_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_mitra/hapus_data'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->mitra_id?>">
        <p>Anda akan menghapus data "<?=$data->nama_mitra ?>"</p>
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