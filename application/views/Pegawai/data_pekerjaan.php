<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Pekerjaan</h1>
      <p class="mb-4">Edit atau tambah data untuk Pekerjaan atau BOQ disini</p>
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
        <h5 class="m-0 font-weight-bold text-primary">DataTables Pekerjaan</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#add_data">
        <i class="fas fa-user-plus"></i> Add Pekerjaan
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
              <th>Pekerjaan ID</th>
              <th>Nama Pekerjaan</th>
              <th>Satuan</th>
              <th>Price</th>
            </tr>
          </thead>
          <!-- <tfoot>
            <tr class="text-center">
				<th>No</th>
              	<th>Pekerjaan ID</th>
              	<th>Nama Pekerjaan</th>
              	<th>Satuan</th>
              	<th>Price</th>	
            </tr>
          </tfoot> -->
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data->pekerjaan_id?></td>
              <td><?=$data->nama_pekerjaan?></td>
              <td><?=$data->satuan?></td>
              <td><?=$data->price?></td>
              </td>
              <td class="text-center" colspan="2">
                <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#edit_modal<?=$data->pekerjaan_id; ?>">
                    <i class="fas fa-user-edit"></i>
                  </button>
                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->pekerjaan_id;?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Pekerjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_pekerjaan/proses_add_data'); ?>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama Pekerjaan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" autofocus="" id="nama_pekerjaan" name="nama_pekerjaan" required="" autofocus="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Satuan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="satuan" id="satuan">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Price</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" name="price" id="price">
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

<!-- Akhir Modal Edit-->

<!-- Modal Hapus Data-->

<!-- Akhir Modal Hapus Data -->
