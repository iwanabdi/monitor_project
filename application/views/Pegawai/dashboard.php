<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Card Pegawai -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pegawai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $this->fungsi->count_pegawai();?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-user-tie fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Mitra -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Customer</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $this->fungsi->count_customer();?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-users fa-2x "></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Mitra</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $this->fungsi->count_mitra();?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-handshake fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PROJECT -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Project</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $this->fungsi->count_project();?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-project-diagram fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <div class="row">
    <!-- Card line 1 -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card-img h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <img src="<?= base_url('assets/img/1.svg')?>" width="100%">
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card-img h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <img src="<?= base_url('assets/img/5.svg')?>" width="100%">
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card-img h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <img src="<?= base_url('assets/img/2.svg')?>" width="100%">
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Testing Dashboard -->
  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
        </div>
        <div class="card-body">
          <h4 class="small font-weight-bold">Disposisi <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Survey <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Progress <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Testcom <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Dokumen <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">QC <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">BAPS <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">CLOSE <span class="float-right">20%</span></h4>
          <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- END PROJECT -->
    </div>
  </div>

  <!-- <?php $count = count($this->fungsi->chart_project()) ?>
  <?php foreach ($this->fungsi->chart_project() as $key => $value): ?>
    <?php if (is_null($value->status_project !== 5)): ?>
      <?= $disposisi = "belum ada" ?>
    <?php endif ?>
  <?php endforeach ?>
</div> -->
<!-- /.container-fluid