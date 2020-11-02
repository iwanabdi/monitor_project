<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Menu Survey</h1>
     
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
        <h5 class="m-0 font-weight-bold text-primary">Survey</h5>
      </div>
    </div>
    <div class="card-body">
		
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
							<th>Project ID</th>
							<th>Nama Customer</th>				
							<th>Alamat Terminating</th>
							<th>Create By</th>
							<th>Upload File</th>			  
            </tr>
          </thead>
          <tbody>
            <?php
						foreach ($row->result() as $key => $data)  {?>
					
							<tr>
								<td><a href="<?= site_url('C_survey/detail/'.$data->project_id)?>"><?=$data->project_id?></a></td>
								<td><?=$data->nama_customer?></td>
					
								<td><?=$data->jalan_ter,', ',$data->kota_ter,', ',$data->provinsi_ter?></td>
								<td><?=$data->create_by?></td>
								<td class="text-center">
									
									<!-- <input type="hidden" name="project_id" id="project_id" value="<?=$data->project_id?>">
									<a href="<?= site_url()?>" type="submit" class="btn btn-warning btn-circle" name="submit" data-id="<?=$data->project_id?>">
											<i class="fas fa-user-times"></i>
									</a> -->

									<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" 
									data-target="#selectpm" data-backdrop="static" data-keyboard="false" data-id="<?=$data->project_id?>">
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

<!-- Modal survey-->

<div class="modal fade" id="selectpm" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Upload File ( <?=$data->project_id?>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="table-responsive">
						<?php echo form_open_multipart('C_survey/upload/')?>
								<input type="hidden" name="id" name = "id "value="<?=$data->project_id?>">
								<label for="berkas">File Map</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input"name="berkas">
										<label class="custom-file-label" for="inputGroupFile01">Masukan File</label>
									</div>		
								>	
								</div>


								<label for="berkas">File Excel</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="berkas">
										<label class="custom-file-label" for="inputGroupFile01">Masukan File Excel</label>
									</div>
								
									
								</div>
								<div class="card-footer">
										<!-- <div class="form-group row"> -->
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Upload</button>
								</div>

							<?php echo form_close()?>
			

					
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#selectpm', function() {
      var pegawai_id = $(this).data('id');
      $('#pegawai_id').val(pegawai_id);
      var project_id = $(this).data('project');
      $('#project_id').val(project_id);
      document.getElementById("pilihpm").submit();
    })
  })
</script>
<!-- Akhir Modal dispos Data -->
