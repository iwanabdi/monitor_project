<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="right">
				<a href="<?= site_url('C_survey')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
    </div>
    <div class="col-0">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
    <div class="col-12 py-2 border-bottom-secondary">
      <div class="py-2 mx-2 row">
        <div class="mr-auto text-gray-800">
          <p class="mb-1">Project Activation ID</p>
          <h3><?= $row->project_id?></h3>
        </div>
        <div class="ml-auto row">
          <div class="border-left-secondary text-gray-800" style="height: 42px;">
            <h6 class="ml-2 mr-2">Project Manager</h6>
            <h6 class="ml-2 mr-2"><i class="fas fa-lock"><?= $row->nama_pegawai?></i></h6>
          </div>
          <div class="border-left-secondary text-gray-800" style="height: 42px;">
            <h6 class="ml-2 mr-2">Mitra</h6>
            <h6 class="ml-2 mr-2"><i class="fas fa-lock">#nama_mitra</i></h6>
          </div>
          <div class="border-left-secondary text-gray-800" style="height: 42px;">
            <h6 class="ml-2 mr-2">Status</h6>
            <h6 class="ml-2 mr-2"><i class="fas fa-lock">
              <?php
                if ($row->status_project==1) {
                 echo "Disposisi";
                }
                else if ($row->status_project==2) {
                  echo "Survey";
                }
                else if ($row->status_project==3) {
                  echo "Proges";
                 }
                else if ($row->status_project==4) {
                  echo "Testcom";
                }
                else if ($row->status_project==5) {
                  echo "Laporan Mitra";
                }
                else if ($row->status_project==6) {
                  echo "QC OK";
                }
                else if ($row->status_project==7) {
                  echo "BAPS";
                }
                else if ($row->status_project==8) {
                  echo "Close";
                }
              ?></i>
            </h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  &nbsp;
  <
  <div class="row">
    <div class="col-12">
    <!-- Collapsable Card General -->
      <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#general" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="general">
          <h6 class="m-0 font-weight-bold text-primary">General Information</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="general">
          <div class="card-body row">
            <div class="col-lg-4">
              <table class="table mr-auto text-gray-800">
                <tr>
                  <td>Product</td>
                  <td><i class="fas fa-lock"></i><span class="ml-2"><?=$row->nama_product,' ',$row->bandwith,' ',$row->satuan?></span></td>
                </tr>
                <tr>
                  <td>Service ID</td>
                  <td><i class="fas fa-lock"></i><span class="ml-2"><?=$row->SID?></span></td>
                </tr>             
              </table>
            </div>
            <div class="col-lg-4">
              <table class="table m-auto text-gray-800">
                <tr>
                  <td>Created Date</td>
                  <td><i class="fas fa-lock"></i><span class="ml-2"><?=$row->create_on?></span></td>
                </tr>
                <tr>
                  <td>IO Number</td>
                  <td>
                    <?php 
                      if ($row->IO!=null) {
                        echo "<i class='fas fa-lock'></i><span class='ml-2'>".$row->IO;
                      }else {
                        echo "<a href='".site_url('project/genio/'.$row->project_id)."' class='btn btn-success' id='btn'><i class='fas fa-plus'>
                        </i> Generate IO</a>";
                      }
                    ?>
                  </span></td>
                </tr>          
              </table>
            </div>
            <div class="col-lg-4">
              <table class="table ml-auto text-gray-800">
                <tr>
                  <td>BAI Date</td>
                  <td><i class="fas fa-lock"></i><span class="ml-2">isinya tanggal testcom</span></td>
                </tr>
                <tr>
                  <td>Aging (days)</td>
                  <td><i class="fas fa-lock"></i><span class="ml-2"><?=$row->aging?></span></td>
                </tr>            
              </table>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->

    <!-- Collapsable Card Customer Information -->
    <!-- <div class="row"> -->
      <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#CustomerInformation" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="CustomerInformation">
          <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="CustomerInformation">
          <div class="card-body">
            <div class="col-lg-0">
              <table class="table ml-auto text-gray-800">
                <tr>
                  <td width=15%>Customer Name</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->nama_customer?></span></td>
                </tr>
                <tr>  
                  <td>Keterangan</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->keterangan?></span></td>
                </tr>            
                <tr>
                  <td>Alamat Originating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?='jalan ',$row->jalan_ori,', ',$row->kota_ori,', ',$row->provinsi_ori?></span></td>
                </tr>
                <tr>
                  <td>PIC Originating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->pic_ori,' - ',$row->no_telp_ori?></span></td>
                </tr>
                <tr>
                  <td>Alamat Terminating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?='jalan ',$row->jalan_ter,', ',$row->kota_ter,', ',$row->provinsi_ter?></span></td>
                </tr>
                <tr>
                  <td>PIC Terminating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->pic_ter,' - ',$row->no_telp_ter?></span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->

    <!-- Collapsable Card Survey -->
    <!-- <div class="row"> -->
      <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#ProjectInitiation" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="ProjectInitiation">
          <h6 class="m-0 font-weight-bold text-primary">Survey</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="ProjectInitiation">
          <div class="col-lg-0">
              <table class="table ml-auto text-gray-800">
                <tr>
                  <td width=15%>Survey ID</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->nama_customer?></span></td>
                </tr>
              </table>
            </div>
        </div>
      </div>
    <!-- </div> -->

    <!-- Collapsable Card Purchase Order (PO) -->
    <!-- <div class="row"> -->
      <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#PurchaseOrder" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="PurchaseOrder">
          <h6 class="m-0 font-weight-bold text-primary">Purchase Order (PO)</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="PurchaseOrder">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.h!
          </div>
        </div>
      </div>
    <!-- </div> -->

    <!-- Collapsable Card Test & Commissioning -->
    <!-- <div class="row"> -->
      <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#TestCom" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="TestCom">
          <h6 class="m-0 font-weight-bold text-primary">Test & Commissioning</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="TestCom">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Begin Page Content -->
