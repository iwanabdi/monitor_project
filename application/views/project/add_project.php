<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Project</h5>
				<div class="right">
					<a href="<?= site_url('project')?>" class="btn btn-warning">
					<i class="fas fa-undo-alt"></i> Back
					</a>
				</div>
	    </div>
    	<form action="<?= site_url('project/proses_add_data')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <input type="hidden" name="customer_id" id="customer_id" required>
		          <label class="col-sm-3 col-form-label">Pilih Customer</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_customer" id="nama_customer" disabled="" required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihcustomer" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>	
				<div class="form-group row">
		          <input type="hidden" name="alamat_id" id="alamat_id" required="">
		          <label class="col-sm-3 col-form-label">Pilih Alamat HO/Originating</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_alamat" id="nama_alamat" disabled="" required="">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihalamat" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>
        <div class="form-group row">
		          <input type="hidden" name="alamat_id" id="alamat_id" required="">
		          <label class="col-sm-3 col-form-label">Pilih Alamat Terminating</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_alamat" id="nama_alamat" disabled="" required="">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#pilihalamat" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
				</div>	
				<div class="form-group row">
		          <input type="hidden" name="product_id" id="product_id" required>
		          <label class="col-sm-3 col-form-label">Pilih Product</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="product_lengkap" id="product_lengkap" disabled="" required>
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#piliproduct" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
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
              foreach($customer->result() as $i => $data)  {?>
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

<!-- Modal alamat-->
<div class="modal fade" id="pilihalamat" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Alamat</h5>
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
                <th>Jalan</th>
                <th>Kota</th>
								<th>Provinsi</th>	
								<th>Koordinat</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($alamat->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->alamat_id?></td>
                <td><?=$data->nama_customer?></td>
				<td><?=$data->jalan?></td>
				<td><?=$data->kota?></td>
				<td><?=$data->provinsi?></td>
                <td><?=$data->koordinat?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectalamat"
                data-id="<?= $data->alamat_id?>" 
                data-alamat="<?= $data->jalan,', ',$data->kota,', ',$data->provinsi?>"
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

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#selectalamat', function() {
      var alamat_id = $(this).data('id');
      var alamat_lengkap = $(this).data('alamat');
      $('#alamat_id').val(alamat_id);
      $('#nama_alamat').val(alamat_lengkap);
      $('#pilihalamat').modal('hide');
    })
  })
</script>
<!-- Akhir Modal alamat Data -->

<!-- Modal product-->
<div class="modal fade" id="piliproduct" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Product</h5>
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
                <th>Nama Product</th>
                <th>Bandwith</th>
				<th>Satuan</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($product->result() as $i => $data)  {?>
              <tr>
                <td><?=$data->product_id?></td>
                <td><?=$data->nama_product?></td>
				<td><?=$data->bandwith?></td>
				<td><?=$data->satuan?></td>
                <td class="text-center">
                <button class="btn btn-info" id="selectproduct"
                data-proid="<?= $data->product_id?>" 
                data-product="<?= $data->nama_product,' ',$data->bandwith,$data->satuan?>"
                data-pilih="<?= $data->nama_product?>">Pilih
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
    $(document).on('click', '#selectproduct', function() {
      var product_id = $(this).data('proid');
      var product_lengkap = $(this).data('product');
      $('#product_id').val(product_id);
      $('#product_lengkap').val(product_lengkap);
      $('#piliproduct').modal('hide');
    })
  })
</script>
<!-- Akhir Modal product Data -->
