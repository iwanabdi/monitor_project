<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Table User Login</h1>
          <p class="mb-4">Edit atau tambah data untuk user login</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="row card-header col-12 mx-auto">
              <div class="col-10 p-0 p-2">
                <h5 class="m-0 font-weight-bold text-primary">DataTables Pegawai</h5>
              </div>
              <div class="col-2 p-0">
                <button type="button" class="btn btn-success btn-block" id="btn" data-toggle="modal" data-target="#modal_pegawai">
                <i class="fas fa-user-plus"></i> Add Pegawai
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
                      <th>Nama Pegawai</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Jabatan</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
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
                        }?>
                      </td>
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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="row card-header col-12 mx-auto">
              <div class="col-10 p-0 p-2">
                <h5 class="m-0 font-weight-bold text-primary">DataTables Mitra</h5>
              </div>
              <div class="col-2 p-0">
                <button type="button" class="btn btn-success btn-block"
                data-toggle="modal" data-target="#modal_mitra">
                <i class="fas fa-user-plus"></i> Add Mitra
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <?php print_r($row->result()) ?> -->
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Mitra</th>
                      <th>Nama Mitra</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>ID Mitra</th>
                      <th>Nama Mitra</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no = 1;
                    foreach ($row1->result() as $key => $data1)  {?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$data1->mitra_id?></td>
                      <td><?=$data1->nama_mitra?></td>
                      <td><?=$data1->email?></td>
                      <td><?=$data1->no_telp?></td>
                      <td><?=$data1->alamat?></td>
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
<!-- Modal Pegawai -->
<div class="modal fade" id="modal_pegawai" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_pegawai" class="form-control">
        </div>
        <div class="form-group">
          <label>Nomor Telelpon</label>
          <input type="number" name="no_telp" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="jabatan">Jabatan</label>
          <select id="jabatan" class="form-control">
            <option>SPV</option>
            <option>PM</option>
            <option>Admin</option>
            <option>Gudang</option>
            <option>QC</option>
          </select>
        </div>
        <div class="form-group">
          <label>Create By</label>
          <input type="number" name="create_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('pegawai_id');?>" disabled></input>
        </div>
        <!-- <div class="form-group">
          <label>Create On</label>
          <input type="date" name="nama" class="form-control">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal -->

<!-- Modal Mitra -->
<div class="modal fade" id="modal_mitra" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal -->
