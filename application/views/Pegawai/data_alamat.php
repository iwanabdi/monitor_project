<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master Alamat</h1>
  <p class="mb-4">Edit atau tambah data untuk Alamat disini</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-10 p-0 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Data Alamat</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#modal_alamat">
        <i class="fas fa-user-plus"></i> Add Alamat
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
			  <th>ID</th>
              <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
              <th>Kontak</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
			<th>No</th>
			  <th>ID</th>
              <th>Jalan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Negara</th>
              <th>Koordinat</th>
              <th>Type</th>
              <th>Kontak</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data->alamat_id?></td>
              <td><?=$data->kota?></td>
              <td><?=$data->jalan?></td>
              <td><?=$data->provinsi?></td>
              <td><?=$data->negara?></td>
              <td><?=$data->koordinat?></td>
              <td><?=$data->type?></td>
              <td><?=$data->kontak?></td>
              <td class="text-center" width="15%">
                <button class="btn btn-warning btn-circle">
                    <i class="fas fa-user-edit"></i>
                  </button>
                <button class="btn btn-danger btn-circle">
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
<!-- Modal material -->
<div class="modal fade" id="modal_material" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Jalan</label>
          <input type="text" name="nama_material" class="form-control">
        </div>
        <div class="form-group">
          <label>Kota</label>
          <input type="text" name="kota" class="form-control">
        </div>
        <div class="form-group">
          <label>Provinsi</label>
          <input type="text" name="provinsi" class="form-control">
        </div>
        <div class="form-group">
          <label>Negara</label>
          <input type="text" name="negara" class="form-control">
        </div><div class="form-group">
          <label>Koordinat</label>
          <input type="text" name="koordinat" class="form-control">
        </div><div class="form-group">
          <label>Type</label>
          <input type="text" name="type" class="form-control">
        </div><div class="form-group">
          <label>Kontak</label>
          <input type="text" name="kontak" class="form-control">
        </div>
        
        
        <div class="form-group">
          <label>Create By</label>
          <input type="number" name="create_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('pegawai_id');?>" disabled></input>
        </div>
        <!-- <div class="form-group">
          <label>Create On</label>
          <input type="date" name="nama" class="form-control">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Tambahkan</button>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal -->
