<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Edit Pegawai</h5>
			<div class="right">
				<a href="<?= site_url('master_pegawai')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
    	<form action="<?= site_url('master_pegawai/proses_edit_data')?>" method="POST">
	    	<div class="card-body">
	    		<input type="hidden" id="id" name="id" value="<?= $row->pegawai_id?>">

		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required=""value="<?= $row->nama_pegawai;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telepon</label>
		          <div class="col-sm-9">
		            <input type="tel" min="0" maxlength="13" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp" 
		            value="<?= $row->no_telp;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Email</label>
		          <div class="col-sm-9">
		            <input type="email" class="form-control" name="email" id="email" value="<?= $row->email;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Jabatan</label>
		          <div class="col-sm-9">
		            <select name="jabatan" id="jabatan" class="form-control custom-select"
		            <?= $row->jabatan == -1 ? 'disabled' : "" ?>>
		              <option value="0" <?php if ($row->jabatan == 0): ?>
		                selected
		              <?php endif ?>>SPV              
		              </option>
		              <option value="1" <?php if ($row->jabatan == 1): ?>
		                selected
		              <?php endif ?>>PM              
		              </option>
		              <option value="2" <?php if ($row->jabatan == 2): ?>
		                selected
		              <?php endif ?>>Admin              
		              </option>
		              <option value="3" <?php if ($row->jabatan == 3): ?>
		                selected
		              <?php endif ?>>Gudang              
		              </option>
		              <option value="4" <?php if ($row->jabatan == 4): ?>
		                selected
		              <?php endif ?>>QC              
		              </option>
		              <?php if ($this->session->userdata('jabatan') == -1 && $row->jabatan == -1):?>
		                <option value="-1" selected>Developer</option>
		              <?php endif ?>
		            </select>
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
<!-- 		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Update By</label>
		          <div class="col-sm-9">
		            <input type="text" name="update_by" class="form-control" id="pegawai_id" 
		            value="<?= $this->session->userdata('nama_pegawai');?>" disabled>
		          </div>
		        </div> -->

	    	</div>

	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>

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