<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="right">
				<a href="<?= site_url('project')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
    </div>
    <div class="right">
        <?php 
          if ($mitraterpilih == null ) {
            if ($this->session->userdata('pegawai_id')==$row->pegawai_id || $this->session->userdata('jabatan')==-1) {
           ?>
				<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilimitra" data-backdrop="static" data-keyboard="false">
        <i class="fas fa-plus"> Dispos Mitra</i></button>
          <?php }}?>
		</div>
		<div class="right">
				<a href="<?= site_url('reservasi/buat/'.$row->project_id)?>" class="btn btn-success">
				<i class="fas fa-plus"></i> Create Reservasi
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
            <h6 class="ml-2 mr-2"><i class="fas fa-lock">
            <?php
              if($mitraterpilih != null){
                echo $mitraterpilih->nama_mitra;
              }else {
                echo "Belum Ada Mitra";
              }
            ?>
            </i></h6>
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
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->jalan_ori,', ',$row->kota_ori,', ',$row->provinsi_ori?></span></td>
                </tr>
                <tr>
                  <td>Koordinat Originating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->koordiant_ori?></span></td>
                </tr>
                <tr>
                  <td>PIC Originating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->pic_ori,' - ',$row->no_telp_ori?></span></td>
                </tr>
                <tr>
                  <td>Alamat Terminating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->jalan_ter,', ',$row->kota_ter,', ',$row->provinsi_ter?></span></td>
                </tr>
                <tr>
                  <td>Koordinat Terminating</td>
                  <td><i class="fas fa-bars"></i><span class="ml-2"><?=$row->koordiant_ter?></span></td>
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
          <?php if(is_null($row_survey)){
								echo '<div class="col-xl-12 col-md-12 mb-4">
												<div class="card border-left-danger shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File Map & File Excel</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">Belum ada satupun file yang di upload</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
						}else{
							if($row_survey->file_map){
												echo '<div class="col-xl-6 col-md-6 mb-4">
																<div class="card border-left-success shadow h-100 py-2">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Map</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_survey->file_map.'</div>
																			</div>
																			<div class="col-auto">
																			<a href="../../assets/survey/'.$row_survey->file_map.'" download>
																			<i class="fas fa-cloud-download-alt fa-2x text-gray-800"></i>
																			</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
											}else{
												echo '<div class="col-xl-6 col-md-6 mb-4">
																<div class="card border-left-danger shadow h-100 py-2">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File Map</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
											}
							if($row_survey->file_excel){
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-success shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Excel</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_survey->file_excel.'</div>
															</div>
															<div class="col-auto">
															<a href="../../assets/survey/'.$row_survey->file_excel.'" download>
															<i class="fas fa-cloud-download-alt fa-2x text-gray-800"></i>
															</a>
															</div>
														</div>
													</div>
												</div>
											</div>';
							}else{
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-danger shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File Excel</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
							}

							}?>
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
          <?php
          if ($po != null) {?>
         <table class="table table-bordered" width="100%" cellspacing="0">
          <tr>
              <th>NO PO</th>
              <th>PRINT</th>
          </tr>
          <tr>
              <td> <?= $po->po_no ?> </td>
              <td><a href="<?=site_url('PO/pdf/'.$po->po_no)?>" class='btn btn-success' id='btn'><i class='fas fa-plus'></i> Print PO</a></td>
          </tr>
          </table>
          <?php } else { ?>
              <a href="<?=site_url('PO/req/'.$row->project_id)?>" class='btn btn-success' id='btn'><i class='fas fa-plus'></i> Request PO</a>
          </div>
          <?php } ?>
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
        <?php if(is_null($row_testcom)){
								echo '<div class="col-xl-12 col-md-12 mb-4">
												<div class="card border-left-danger shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File BAI & File Testcom</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">Belum ada satupun file yang di upload</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
						}else{
							if($row_testcom->file_bai){
												echo '<div class="col-xl-6 col-md-6 mb-4">
																<div class="card border-left-success shadow h-100 py-2">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File BAI</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_testcom->file_bai.'</div>
																			</div>
																			<div class="col-auto">
																			<a href="../../assets/survey/'.$row_testcom->file_bai.'" download>
																			<i class="fas fa-cloud-download-alt fa-2x text-gray-800"></i>
																			</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
											}else{
												echo '<div class="col-xl-6 col-md-6 mb-4">
																<div class="card border-left-danger shadow h-100 py-2">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File BAI</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
											}
							if($row_testcom->file_testcom){
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-success shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File Testcom</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_testcom->file_testcom.'</div>
															</div>
															<div class="col-auto">
															<a href="../../assets/survey/'.$row_testcom->file_testcom.'" download>
															<i class="fas fa-cloud-download-alt fa-2x text-gray-800"></i>
															</a>
															</div>
														</div>
													</div>
												</div>
											</div>';
							}else{
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-danger shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File Testcom</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
							}

							}?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Begin Page Content -->

<!-- Modal mitra-->
<div class="modal fade" id="pilimitra" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Mitra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
          <form action="<?= site_url('project/dispos_mitra')?>" method="post" id="pilimitra">
            <input type="hidden" name="project_id" id="project_id" value=<?=$row->project_id?>>
            <input type="hidden" name="mitra_id" id="mitra_id">
            <table class="table table-bordered" width="100%" id="dataTable1" cellspacing="0">
              <thead>
              <tr class="text-center">
                <th>ID</th>
                <th>Nama Mitra</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($mitra->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->mitra_id?></td>
                <td><?=$data->nama_mitra?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectpm" data-id=<?=$data->mitra_id;?>>Pilih</button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#selectpm', function() {
      var mitra_id = $(this).data('id');
      $('#mitra_id').val(mitra_id);
      document.getElementById("pilimitra").submit();
    })
  })
</script>
<!-- Akhir Modal product Data -->
