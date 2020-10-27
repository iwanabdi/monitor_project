<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Edit Customer</h5>
			<div class="right">
				<a href="<?= site_url('master_mitra')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_mitra/proses_edit_data')?>" method="POST">
	    	<div class="card-body">

	    		<input type="hidden" id="id" name="id" value="<?= $row->mitra_id?>">

		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required="" 
		            value="<?= $row->nama_mitra;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Alamat</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row->alamat;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Kota</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="kota" name="kota" value="<?=$row->kota;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telepon</label>
		          <div class="col-sm-9">
		            <input type="tel" min="9" maxlength="14" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp" value="<?= $row->no_telp;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Fax</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="10" oninput="validAngka(this)" class="form-control" name="fax" id="fax" value="<?= $row->fax;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">NPWP</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="15" maxlength="15" oninput="validAngka(this)" class="form-control" name="npwp" id="npwp" value="<?= $row->npwp;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Email</label>
		          <div class="col-sm-9">
		            <input type="email" class="form-control" name="email" id="email" value="<?= $row->email;?>" required>
		          </div>
		        </div>
		        <div class="form-group row">
					<label class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-9">
					  <input type="password" class="form-control" name="password" id="password" placeholder="********" disabled="">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-9">
					  <div class="form-check">
					    <input class="form-check-input" onclick="myFunction(!this.checked)" type="checkbox" value="" id="defaultCheck1">
					    <label class="form-check-label" for="defaultCheck1">
					      <span>Centang untuk mengubah password Anda!</span>
					    </label>
					  </div>
					</div>
				</div>

	    	</div>

	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>

	    </form>
	</div>
	<?= $this->session->flashdata('msg_email')?>
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

<script>
function myFunction(status) {
    // var x = $('#cek').val();
    status != status
      document.getElementById("password").disabled = status;
      document.getElementById("password").value = "";
    // var x = document.getElementById("password");
    // x.disabled = true;
}
</script>
