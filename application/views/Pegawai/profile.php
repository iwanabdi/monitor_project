  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-8">
        <h1 class="h3 mb-2 text-gray-800">Profile</h1>
        <p class="mb-4">Lengkapi data atau ubah data Anda disini</p>
      </div>
      <div class="col-4">
        <?= $this->session->flashdata('pesan');?>
      </div>
    </div>
    <!-- Content Row -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="mx-auto font-weight-bold text-primary">Data</h6>
          </div>
          <div class="card-body was-validated">
            <!-- <form name="f1" class="user was-validated" action="<?= site_url('profile_pegawai/proses_edit_profile');?>"> -->
            <?php echo form_open_multipart('profile_pegawai/proses_edit_profile'); ?>
              <input type="hidden" id="id" name="id" value="<?= $row['pegawai_id']?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required=""  value="<?= $row['nama_pegawai'];?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="no_telp" id="no_telp" 
                  value="<?= $row['no_telp'];?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="email" id="email" 
                  value="<?= $row['email'];?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" id="password" placeholder="********" disabled="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <div class="form-check">
                    <input class="form-check-input" onclick="myFunction(!this.checked)" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      <span>Centang untuk mengubah password Anda!</span>
                    </label>
                  </div>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah
              </button>
            <!-- </form> -->
            <?php echo form_close(); ?>
          </div>
        </div>

  </div>
  <!-- /.container-fluid -->

<script>
function myFunction(status) {
    // var x = $('#cek').val();
    status != status
      document.getElementById("password").disabled = status;
      document.getElementById("password").value = "";
    // var x = document.getElementById("password");
    // x.disabled = true;
}
</script>