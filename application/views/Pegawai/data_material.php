<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master Material</h1>
  <p class="mb-4">Edit atau tambah data untuk Material disini</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-10 p-0 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Data Material</h5>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#modal_material">
        <i class="fas fa-user-plus"></i> Add Material
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
              <th>Nama Material</th>
              <th>Brand</th>
              <th>Stok</th>
              <th>Storage</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama Material</th>
              <th>Brand</th>
              <th>Stok</th>
              <th>Storage</th>
              <th>Opsi</th>
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
        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Material</label>
          <input type="text" name="nama_material" class="form-control">
        </div>
        <div class="form-group">
          <label>Brand</label>
          <input type="text" name="brand" class="form-control">
        </div>
        <div class="form-group">
          <label>Stok</label>
          <input type="number" name="stok" class="form-control">
        </div>
        <div class="form-group">
          <label>Storage</label>
          <input type="text" name="storage" class="form-control">
        </div>
        
        
        <div class="form-group">
          <label>Create By</label>
          <input type="number" name="create_by" class="form-control" id="material_id" value="<?= $this->session->userdata('pegawai_id');?>" disabled></input>
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
