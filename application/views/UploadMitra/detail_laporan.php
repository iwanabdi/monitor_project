<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="right">
				<a href="<?= site_url('C_LaporanMitra')?>" class="btn btn-warning">
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

  <div class="row">
    <div class="col-12">
    <!-- Collapsable Card File Upload File Survey-->
		<div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#file_upload_laporan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="file_upload">
          <h6 class="m-0 font-weight-bold text-primary">Status Upload</h6>
				</a>
				
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="file_upload_laporan">
          <div class="card-body row">

						<?php if(is_null($row_laporan)){
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
							if($row_laporan->file_pdf){
												echo '<div class="col-xl-6 col-md-6 mb-4">
																<div class="card border-left-success shadow h-100 py-2">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File PDF</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_laporan->file_pdf.'</div>
																			</div>
																			<div class="col-auto">
																			<a href="../../assets/survey/'.$row_laporan->file_pdf.'" download>
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
																				<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File PDF</div>
																				<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
											}
							if($row_laporan->file_gdb){
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-success shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File GDB</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_laporan->file_gdb.'</div>
															</div>
															<div class="col-auto">
															<a href="../../assets/survey/'.$row_laporan->file_gdb.'" download>
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
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File GDB</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">File Belum Di Upload</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
							}

							if($row_laporan->file_bom){
								echo '<div class="col-xl-6 col-md-6 mb-4">
												<div class="card border-left-success shadow h-100 py-2">
													<div class="card-body">
														<div class="row no-gutters align-items-center">
															<div class="col mr-2">
																<div class="text-xs font-weight-bold text-success text-uppercase mb-1">File BOM</div>
																<div class="h5 mb-0 font-weight-bold text-gray-800">'.$row_laporan->file_bom.'</div>
															</div>
															<div class="col-auto">
															<a href="../../assets/survey/'.$row_laporan->file_bom.'" download>
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
																<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">File Bom</div>
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


      </div>
		<!-- </div> -->
  </div>

</div>
<!-- Begin Page Content -->
