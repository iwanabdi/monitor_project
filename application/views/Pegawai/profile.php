  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile</h1>
    <p class="mb-4">Lengkapi data atau ubah data Anda disini</p>

    <!-- Content Row -->
    <div class="row">

      <div class="col-xl-8 col-lg-8">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="mx-auto font-weight-bold text-primary">Data</h6>
          </div>
          <div class="card-body">
              <form class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="<?php echo $this->session->userdata('nama_pegawai')?>">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="email"
                  placeholder="<?php echo $this->session->userdata('email')?>">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" name="no_telp" id="no_telp"
                  placeholder="<?php echo $this->session->userdata('no_telp')?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <hr>
                <a href="#" class="btn btn-primary btn-user btn-block">
                  Ubah
                </a>
              </form>
          </div>
        </div>
      </div>

      <!-- Donut Chart -->
      <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="mx-auto font-weight-bold text-primary">Image</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie">
              <!-- <canvas id="myPieChart"></canvas> -->
            </div>
            <hr>
              <a href="#" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-flag"></i>
                </span>
                <span class="text">Pilih Gambar</span>
              </a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->