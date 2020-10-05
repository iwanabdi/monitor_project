<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master alamat</h1>
      <p class="mb-4">Edit atau tambah data untuk alamat disini</p>
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
        <h5 class="m-0 font-weight-bold text-primary">DataTables alamat</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#add_data">
        <i class="fas fa-user-plus"></i> Add alamat
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
						  <th>No</th>
							<th>ID</th>
							<th>Customer</th>
              <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
							<th>Kontak</th>
							<th>No_Telp</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr class="text-center">
						  <th>No</th>
							<th>ID</th>
							<th>Customer</th>
						  <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
							<th>Kontak</th>
							<th>No_Telp</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
							<td><?=$data->alamat_id?></td>
							<td><?=$data->nama_customer?></td>
              <td><?=$data->jalan?></td>
              <td><?=$data->kota?></td>
              <td><?=$data->provinsi?></td>
							<td><?=$data->negara?></td> 
							<td><?=$data->koordinat?></td>
							<td><?=$data->type?></td>                             
              <td><?=$data->kontak?></td>              
              <td><?=$data->no_telp?></td>              
              <td class="text-center" colspan="2">
                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit_modal<?=$data->alamat_id; ?>">
                    <i class="fas fa-user-edit"></i>
                  </button>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->alamat_id;?>">
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
<div class="modal fade" id="add_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_alamat/proses_add_data'); ?>
        <div class="form-group row">
          <input type="hidden" name="customer_id" id="customer_id">
          <label class="col-sm-3 col-form-label">Pilih Customer</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control" name="nama_customer" id="nama_customer" disabled="" required="">
              <div class="input-group-append">
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihcustomer"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jalan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="jalan" name="jalan" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="kota" name="kota" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="provinsi" name="provinsi" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Negara</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="negara" id="negara" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Koordinat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="koordinat" id="koordinat" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Type</label>
          <div class="col-sm-9">
						<select name="type" id="type" class="form-control custom-select" required="">
              <option selected disabled value="">Pilih Type</option>
              <option value="0">HO</option>
              <option value="1">Originating</option>
							<option value="2">Terminating</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">PIC</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="kontak" id="kontak" required>
          </div>
				</div>
				<div class="form-group row">
          <label class="col-sm-3 col-form-label">No Telp</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" required>
          </div>
				</div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Create By</label>
          <div class="col-sm-9">
            <input type="text" name="create_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
<div class="modal fade show" id="edit_modal<?=$data->alamat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body was-validated">
        <?php echo form_open_multipart('master_alamat/proses_edit_data'); ?>
        <input type="hidden" id="id" name="id" value="<?= $data->alamat_id?>">
				<div class="form-group row">
          <input type="hidden" name="customer_id" id="customer_id" value="<?=$data->customer_id?>">
          <label class="col-sm-3 col-form-label">Pilih Customer</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control" name="nama_customer" id="nama_customer" disabled=""  required="" value="<?=$data->nama_customer?>">
              <div class="input-group-append">
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihcustomer"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jalan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="jalan" name="jalan" required="" value="<?= $data->jalan;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kota</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kota" name="kota" value="<?= $data->kota;?>" required="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="provinsi" name="provinsi" required="" value="<?=$data->provinsi;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Negara</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="negara" id="negara" required 
            value="<?= $data->negara;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Koordinat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="koordinat" id="koordinat" required value="<?= $data->koordinat;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Type</label>
          <div class="col-sm-9">
						<select name="type" id="type" class="form-control custom-select" required="">
              <option selected disabled value="">Pilih Type</option>
              <option value="0">HO</option>
              <option value="1">Originating</option>
							<option value="2">Terminating</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kontak</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="kontak" id="kontak" required value="<?= $data->kontak;?>">
          </div>
				</div>
				<div class="form-group row">
          <label class="col-sm-3 col-form-label">No_Telp</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $data->no_telp;?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Update By</label>
          <div class="col-sm-9">
            <input type="text" name="update_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
<div class="modal fade" id="hapus_modal<?=$data->alamat_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_alamat/hapus_data'); ?>
        <input type="hidden" id="id" name="id" value="<?=$data->alamat_id?>">
        <p>Anda akan menghapus data "<?=$data->jalan ?>"</p>
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

<!-- Modal customer-->

<div class="modal fade" id="pilihcustomer" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nama Customer</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($rowcustomer->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->customer_id?></td>
                <td><?=$data->nama_customer?></td>
                <td class="text-center">
                <button class="btn btn-info" id="select"
                data-id="<?= $data->customer_id?>" 
                data-nama="<?= $data->nama_customer?>">Pilih
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
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var customer_id = $(this).data('id');
      var nama_customer = $(this).data('nama');
      $('#customer_id').val(customer_id);
      $('#nama_customer').val(nama_customer);
      $('#pilihcustomer').modal('hide');
    })
  })
</script>
<!-- Akhir Modal customer Data -->
