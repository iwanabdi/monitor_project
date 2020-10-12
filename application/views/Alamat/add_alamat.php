<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Alamat</h5>
			<div class="right">
				<a href="<?= site_url('master_alamat')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_alamat/proses_add_data')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <input type="hidden" name="customer_id" id="customer_id">
		          <label class="col-sm-3 col-form-label">Pilih Customer</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_customer" id="nama_customer" disabled="" required="">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihcustomer" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Jalan</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="jalan" name="jalan" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Kota</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="kota" name="kota" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Provinsi</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="provinsi" name="provinsi" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Negara</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="negara" id="negara" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Koordinat</label>
		          <div class="col-sm-9">
		            <a href="#collapseCardExample" class="d-block card-header py-2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
				      <label class="m-0 font-weight-bold text-primary">Kordinat Alamat</label>
				    </a>
				    <!-- Card Content - Collapse -->
				    <div class="collapse" id="collapseCardExample">
				      <div class="card-body">
				        <div class="form-group">
				          <!-- <div class="col-sm-9"> -->
				            <input type="text" class="form-control" name="koordinat" id="koordinat" value="-8.5830695,116.3202515">
				          <!-- </div> -->
				        </div>
				        <div id="googleMap" style="width:100%;height:380px;"></div>
				      </div>
				    </div>
		          </div>
		        </div>

		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Type</label>
		          <div class="col-sm-9">
					<select name="type" id="type" class="form-control custom-select" required="">
	                	<option selected disabled value="">Pilih Type</option>
		            	<option value="0">HO</option>
		            	<option value="1">Originating</option>
						<option value="2">Terminating</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">PIC</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="kontak" id="kontak" required>
		          </div>
						</div>
						<div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telpon</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="9" maxlength="14" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp">
		          </div>
						</div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled>
		          </div>
		        </div>
	    	</div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
    	</form>
  </div>
  <!-- End Card -->

</div>
<!-- End Container -->

<!-- Modal customer-->
<div class="modal fade" id="pilihcustomer" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Customer</h5>
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
                <th>Nama Customer</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($rowcustomer->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->customer_id?></td>
                <td><?=$data->nama_customer?></td>
                <td class="text-center">
                <button class="btn btn-info" id="select"
                data-id="<?= $data->customer_id?>" 
                data-nama="<?= $data->nama_customer?>"
                data-pilih="<?= $data->nama_customer?>">Pilih
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

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
	function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-8.5830695,116.3202515),
            zoom:10,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
    	var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var customer_id = $(this).data('id');
      var nama_customer = $(this).data('nama');
      $('#customer_id').val(customer_id);
      $('#nama_customer').val(nama_customer);
      $('#pilihcustomer').modal('hide');
    })
  })
</script>
<!-- Akhir Modal customer Data -->



<script language='javascript'>
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
}
</script>