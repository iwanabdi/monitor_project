<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Customer</h5>
			<div class="right">
				<a href="<?= site_url('master_customer')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_customer/proses_add_data')?>" method="POST">
	    	<div class="card-body">
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_customer" name="nama_customer" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Phone</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="9" maxlength="14" oninput="validAngka(this)" class="form-control" name="phone" id="phone">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Fax</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="10" oninput="validAngka(this)" class="form-control" name="fax" id="fax">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Alamat</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="alamat" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Email</label>
		          <div class="col-sm-9">
		            <input type="email" class="form-control" name="email" id="email" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">NPWP</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="15" maxlength="15" oninput="validAngka(this)" class="form-control" name="npwp" id="npwp">
		          </div>  
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="pegawai_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
</div>

<script language='javascript'>
function validAngka(a)
{
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
}
</script>