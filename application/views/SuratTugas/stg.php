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
		          <input type="hidden" name="project_id" id="project_id" required="">
		          <label class="col-sm-3 col-form-label">Pilih Project</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_alamat" id="nama_alamat" disabled="" required="">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihproject" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>

				<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Tentukan Target Date</label>
				</div>
				<div id="cetak"></div>

				<!-- <div class="form-group row">
				  <label class="col-sm-3 col-form-label"></label>
				  <label class="col-sm-9 col-form-label" >sukses</label>
				  
		         
				</div> -->
				
				<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
				<a href="<?= site_url('C_stg/coba')?>"><button type="button" class="btn btn-success" id="cetakkk"><i class="fas fa-paper-plane"></i> tes</button></a>
				
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
    })

	let daftarPilih = [];
	//akhir function mitra

	$(document).on('click', '#selectProject', function() {
	  
	  let isi = $('#selectProject').val;
	  console.log(isi);

	  let idproject = $(this).data('id');
	  daftarPilih.push(idproject)
	 
	//   if (idproject ==  20 && cekButton == ) {
	// 	document.getElementById(idproject + "").innerHTML = "Sudah Terpilih";
	//   }
	  
	//   daftarPilih.forEach(element => {
	// 	console.log(element);
	//   });
	  
	  
	  
	  
	  
	 
	//   if (cekButton == "Pilih") {
	// 	// document.getElementById("selectProject").innerHTML = "Sudah Terpilih";
	// 	let id = $(this).data('id');
	// 	idProject.push(id)
		
	//   }
	//   else{
	// 	// document.getElementById("selectProject").innerHTML = "Pilih";
	// 	let id = $(this).data('id');
	// 	idProject = idProject.filter(item => item !== value)

	//   }
     
    })
 
	$(document).on('click', '#min', function() {
      
	  let today = new Date();
	  let dd = today.getDate();
	  let mm = today.getMonth()+1; //January is 0!
	  let yyyy = today.getFullYear();
	  if(dd<10){
			  dd='0'+dd
		  } 
		  if(mm<10){
			  mm='0'+mm
		  } 

	  today = yyyy+'-'+mm+'-'+dd;
	  document.getElementById("datefield").setAttribute("min", today);

 	})


	$(document).on('click', '#saveProject', function() {
		$('#pilihproject').modal('hide');
		console.log(idProject);
		var text = "";
		idProject.forEach(element => {
			
			var head = `<div class='form-group row'>`;
			var label = `<label class='col-sm-3 col-form-label'></label>`;
			var input = "<div class='col-sm-9 input-group-append'>"+ element + 
			"<button type='button' class='btn btn-info btn-flat'>"
			+"<i class='far fa-clock'>"+"</i>"+
		        "</button>"+"</div>";
			var tutup = "</div>";
			text +=  head + label + input + tutup;
			

			// // var x;
			// for (let i = 1; i <= x; i++) {
			// 	text += head + label + i + "</label>" + input + "name='sn-" + i+"'" + tutup + "</div>";
			// }
			document.getElementById("cetak").innerHTML = text;
		});
		
	})

  })
</script>
<!-- akhir modal mitra -->
<!-- -------------------------------------------------------------------------------------------------------------------->
<!-- Modal Project -->

<div class="modal fade" id="pilihproject" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih project</h5>
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
                <th>ID Project</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
			<?php
              foreach($project->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->project_id?></td>
                <td class="text-center">
					<button class="btn btn-info" id="select"
					data-id="<?= $data->project_id?>">Pilih
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
