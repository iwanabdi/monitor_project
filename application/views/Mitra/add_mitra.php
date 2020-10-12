<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Tambah Mitra</h5>
			<div class="right">
				<a href="<?= site_url('master_mitra')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_mitra/proses_add_data')?>" method="POST">
	    	<div class="card-body">
	    		<div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" autofocus required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Alamat</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="alamat" name="alamat" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Kota</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="kota" name="kota" required="">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telepon</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="14" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Fax</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="10" oninput="validAngka(this)" class="form-control" name="fax" id="fax" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">NPWP</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="15" maxlength="15" oninput="validAngka(this)" class="form-control" name="npwp" id="npwp" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Email</label>
		          <div class="col-sm-9">
		            <input type="email" class="form-control" name="email" id="email" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Password</label>
		          <div class="col-sm-9">
		            <input type="password" class="form-control" name="password" id="password" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Create By</label>
		          <div class="col-sm-9">
		            <input type="text" name="create_by" class="form-control" id="mitra_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
