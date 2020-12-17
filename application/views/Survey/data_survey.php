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
						
							<th>Upload File</th>			  
            </tr>
          </thead>
          <tbody>
            <?php
						foreach ($row->result() as $key => $data)  {?>
					
							<tr>
								<td><a href="<?= site_url('C_MitraProject/detail/'.$data->project_id)?>"><?=$data->project_id?></a></td>
								<td><?=$data->nama_customer?></td>
					
								<td><?=$data->jalan_ter,', ',$data->kota_ter,', ',$data->provinsi_ter?></td>
							
								<td class="text-center" colspan="2">
									
									<!-- <input type="hidden" name="project_id" id="project_id" value="<?=$data->project_id?>">
									<a href="<?= site_url()?>" type="submit" class="btn btn-warning btn-circle" name="submit" data-id="<?=$data->project_id?>">
											<i class="fas fa-user-times"></i>
									</a> -->

									<button type="button" class="btn btn-info btn-square" data-toggle="modal" title="File Map" 
									data-target="#select_map<?= $data->project_id;?>" data-backdrop="static" data-keyboard="false" data-id="<?=$data->project_id?>">
											<i class="fas fa-file-upload"></i> Map
						</button>
									<button type="button" class="btn btn-info btn-square" data-toggle="modal" title="File Excel"
									data-target="#select_excel<?= $data->project_id;?>" data-backdrop="static" data-keyboard="false" data-id="<?=$data->project_id?>">
											<i class="fas fa-file-excel"></i> Excel
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
<?php foreach ($row->result() as $key => $data)  {?>
<div class="modal fade" id="select_map<?=$data->project_id?>" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<?php echo form_open_multipart('C_survey/upload_map/')?>
						<input type="hidden" name="id" name = "id" value="<?=$data->project_id?>">
						<label for="berkas">File Map</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="map">
								<label class="custom-file-label" for="inputGroupFile01">Masukan File</label>
							</div>		
						</div>
					</div>
					<div class="card-footer">
							<!-- <div class="form-group row"> -->
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Upload</button>
					</div>
					<?php echo form_close()?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>

<!-- Modal survey-->
<?php foreach ($row->result() as $key => $data)  {?>
<div class="modal fade" id="select_excel<?=$data->project_id?>" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<?php echo form_open_multipart('C_survey/upload_excel/')?>
								<input type="hidden" name="id" name = "id" value="<?=$data->project_id?>">
								<label for="berkas">File Excel</label>
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="excel">
										<label class="custom-file-label" for="inputGroupFile01">Masukan File Excel</label>
									</div>
								</div>
								<div class="card-footer">
										<!-- <div class="form-group row"> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Upload</button>
								</div>

							<?php echo form_close()?>
			

					
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>



<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select_map', function() {
      var pegawai_id = $(this).data('id');
      $('#pegawai_id').val(pegawai_id);
      var project_id = $(this).data('project_id');
      $('#project_id').val(project);
      document.getElementById("pilihpm").submit();
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select_excel', function() {
      var pegawai_id = $(this).data('id');
      $('#pegawai_id').val(pegawai_id);
      var project_id = $(this).data('project_id');
      $('#project_id').val(project);
      document.getElementById("pilihpm").submit();
    })
  })
</script>
<!-- Akhir Modal dispos Data -->
