<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Surat Tugas</h5>
	    </div>
    	<form action="<?= site_url('project/proses_add_data')?>" method="POST">
	    	<div class="card-body">
				<!-- row pilih mitra -->
				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled>
		          </div>
				</div>
		        <div class="form-group row">
				  <!-- input 1 -->
				  <input type="hidden" name="mitra_id" id="mitra_id" required> 
				  <!-- akhir input 1 -->
				  <label class="col-sm-3 col-form-label">Pilih Mitra</label>
				    <!-- input 2 -->
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" disabled="" required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihmitra" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
					</div>
				  </div>
				  <!-- akhir input 2 -->
				</div>	
				<!-- akhir row pilih mitra -->

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Project dan Tanggal</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<th>No</th>
									<th>Project</th>
									<th>Target Date</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_project"><i class="fas fa-plus-circle"></i> Add Project</button></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
	    	</div>
				<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
			</div>
			<!-- </div> -->
       
    	</form>
  </div>
  <!-- End Card -->

</div>



<!-- -------------------------------------------------------------------------------------------------------------------->
<!-- Modal Mitra -->

<div class="modal fade" id="pilihmitra" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<button class="btn btn-info" id="select"
					data-id="<?= $data->mitra_id?>" 
					data-nama="<?= $data->nama_mitra?>"
					data-pilih="<?= $data->nama_mitra?>">Pilih
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
  </div>
</div>

<script type="text/javascript">
	// function mitra
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      let mitra_id = $(this).data('id');
      let nama_mitra = $(this).data('nama');
      $('#mitra_id').val(mitra_id);
      $('#nama_mitra').val(nama_mitra);
      $('#pilihmitra').modal('hide');
    });
  });
  //akhir function mitra
</script>
<!-- akhir modal mitra -->
<!-- -------------------------------------------------------------------------------------------------------------------->

<!-- JAVASCRIPT TAIL SELECT -->
<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/tail.select/js/tail.select-full.js"></script>

<script type="text/javascript">

	$(document).ready(function () {
		for(i=1; i<=1; i++){
			add_project();
		}
		$('#add_project').click(function (e) {
			e.preventDefault();
			add_project();
		});

	});

	function add_project()
	{
		$(document).ready(function() {
			$("[data-toggle='tooltip'").tooltip();
		})
		var No = $("#tableLoop tbody tr").length+1;
		var Baris = '<tr>';
				Baris += '<td>'+No+'</td>';
				Baris += '<td>';
					Baris += '<select name="project[]" id="project[]" class="select-move form-control custom-select" search="true" required>\
									<option selected disabled value="">--Pilih Project--</option>\
									<?php foreach ($project->result() as $key => $data) {?>\
										<option value=<?= $data->project_id?>><?=$data->project_id?></option>\
									<?php }?>\
								</select>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="date" name="tgl_stg[]" id="tgl_stg[]" class="form-control" required>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<button type="button" class="btn btn-md btn-danger" data-toggle="tooltip" title="Hapus Baris"><i class="fas fa-times-circle"></i></button>';
				Baris += '</td>';
			Baris += '</tr>';

		$("#tableLoop tbody").append(Baris);
		$("#tableLoop tbody tr").each(function(){
			$(this).find('td:nth-child(2) input').focus();
		});
	}


</script>
