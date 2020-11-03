<link type="text/css" rel="stylesheet" href="<?= base_url();?>assets/tail.select/css/bootstrap4/tail.select-funky.css" />
<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Surat Tugas</h5>
			<div class="right">
				<div id="notif"></div>
			</div>
	    </div>
    	<form action="<?= site_url('C_stg/add_stg')?>" method="POST" id="SimpanData">
	    	<div class="card-body">
				<!-- row pilih mitra -->
				<div class="form-group row">
				  <input type="hidden" name="pm_id" id="pm_id"> 
				  <label class="col-sm-3 col-form-label">Pilih Team Leader</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_pm" id="nama_pm" readonly required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihpm" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
					</div>
				  </div>
				</div>	
		        <div class="form-group row">
				  <input type="hidden" name="mitra_id" id="mitra_id"> 
				  <label class="col-sm-3 col-form-label">Pilih Mitra</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" readonly required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihmitra" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
					</div>
				  </div>
				</div>	
				<!-- akhir row pilih mitra -->

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Project dan Tanggal</label>
					<div class="col-sm-9">
						<table class="table ml-auto text-gray-800" id="tableLoop">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Project</th>
									<th class="text-center">Target Date</th>
									<th width="200px"><button type="button" class="btn btn-info btn-block" id="add_project"><i class="fas fa-plus-circle"></i> Add Project</button></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
	    	</div>
			<div class="card-footer">
			<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Buat</button>
			<button type="reset" class="btn btn-warning"><i class="fas fa-archive"></i> Clear</button>
			<a href="<?=site_url('C_stg')?>"><button type="button" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> BACK</button></a>
			</div>
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
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      let mitra_id = $(this).data('id');
      let nama_mitra = $(this).data('nama');
      $('#mitra_id').val(mitra_id);
      $('#nama_mitra').val(nama_mitra);
      $('#pilihmitra').modal('hide');
    });
  });
</script>
<!-- akhir modal mitra -->


<!-- Modal PM -->
<div class="modal fade" id="pilihpm" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Project Manager</h5>
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
                <th>Nama Project Manager</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
			<?php
              foreach($pegawai->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->pegawai_id?></td>
                <td><?=$data->nama_pegawai?></td>
                <td class="text-center">
					<button class="btn btn-info" id="selectpm"
					data-id="<?= $data->pegawai_id?>" 
					data-nama="<?= $data->nama_pegawai?>"
					data-pilih="<?= $data->nama_pegawai?>">Pilih
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
  $(document).ready(function() {
    $(document).on('click', '#selectpm', function() {
      let pm_id = $(this).data('id');
      let nama_pm = $(this).data('nama');
      $('#pm_id').val(pm_id);
      $('#nama_pm').val(nama_pm);
      $('#pilihpm').modal('hide');
    });
  });
</script>
<!-- akhir modal PM -->
<!-- -------------------------------------------------------------------------------------------------------------------->

<!-- JAVASCRIPT TAIL SELECT -->
<script src="https://cdnjs.cloudflare.com/ajax//libs//popper.js/1.14.7/umd/popper.min.js"></script>
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
		var No = $("#tableLoop tbody tr").length+1;
		var Baris = '<tr>';
				Baris += '<td  class="text-center">'+No+'</td>';
				Baris += '<td>';
					Baris += '<select name="project[]" id="project[]" class="form-control custom-select project" required>\
									<option selected disabled value="">--Pilih Project--</option>\
									<?php foreach ($project->result() as $key => $data) {?>\
										<option value="<?= $data->id_dstg;?>"><?=$data->project_id;?></option>\
									<?php }?>\
								</select>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<input type="date" name="tgl_stg[]" id="tgl_stg[]" value="<?= date('Y-m-d');?>" class="form-control tgl_stg" required>';
				Baris += '</td>';
				Baris += '<td class="text-center">';
					Baris += '<button type="button" class="btn btn-sm btn-danger" id="HapusBaris" title="Hapus Baris"><i class="fas fa-times-circle"></i></button>';
				Baris += '</td>';
			Baris += '</tr>';

		$("#tableLoop tbody").append(Baris);
		$("#tableLoop tbody tr").each(function(){
			$(this).find('td:nth-child(2) select').focus();
		});
	}

	$(document).on('click', '#HapusBaris', function(e) {
		e.preventDefault();
		var No = 1;
		$(this).parent().parent().remove();
		$('tableLoop tbody tr').each(function() {
			$(this).find('td:nth-child(1)').html(No);
			No++;
		});
	});

	$(document).ready(function () {
		$("#SimpanData").submit(function (e) {
			e.preventDefault();
			stg();
		});
	});

	function stg() {
		$.ajax({
			url: $("#SimpanData").attr('action'),
			type: 'POST',
			cache: false,
			dataType: "json",
			data: $("#SimpanData").serialize(),
			success:function(data){
				if (data.success == true) {
					$('.project').val('');
					$('.tgl_stg').val('<?= date('Y-m-d')?>');
					$('#notif').fadeIn(800, function () {
						$('#notif').html(data.notif).fadeOut(5000).delay(800);
					window.open('<?= base_url('C_stg/cetak_pdf');?>');
					});
				}
				else{
					$('#notif').html('<div class="alert alert-danger">Surat Tugas Gagal Dibuat</div>')
				}
			},
			error:function(error) {
				alert(error);
			}
		})
	}

</script>
