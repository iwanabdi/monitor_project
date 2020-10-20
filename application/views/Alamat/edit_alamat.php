<!-- Begin Page Content -->
<div class="container-fluid">

  	<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Edit Alamat</h5>
			<div class="right">
				<a href="<?= site_url('master_alamat')?>" class="btn btn-warning">
				<i class="fas fa-undo-alt"></i> Back
				</a>
			</div>
	    </div>
	    <?php $no = 1;
		foreach ($row as $key => $data) : $no++; ?>
    	<form action="<?= site_url('master_alamat/proses_edit_data')?>" method="POST">
	    	<div class="card-body">

		        <input type="hidden" id="id" name="id" value="<?= $data->alamat_id?>">
				<div class="form-group row">
		          <input type="hidden" name="customer_id2" id="id<?=$no?>" value="<?=$data->customer_id?>">
		          <label class="col-sm-3 col-form-label">Pilih Customer</label>
		          <div class="col-sm-9">
		            <div class="input-group">
		              <input type="text" class="form-control" name="nama_customer2" id="nama<?=$no?>" required="" disabled="" value="<?=$data->nama_customer?>">
		              <div class="input-group-append">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" 
		                data-target="#editcustomer<?=$no?>" data-backdrop="static" data-keyboard="false"><i class="fas fa-search"></i>
		                </button>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Provinsi</label>
		          <div class="col-sm-9">
		            <select name="provinsi" id="provinsi" class="form-control custom-select" data-live-search="true" required>
		            	<option selected value="<?= $data->provinsi?>" nama_provinsi="<?=$data->provinsi?>"><?=$data->provinsi?>
		            		
		            	</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Kota</label>
		          <div class="col-sm-9">
		            <select name="kota" id="kota" class="form-control custom-select" data-live-search="true" required>
		            	<option selected value="<?= $data->kota?>" nama_kota="<?=$data->kota?>"><?=$data->kota?>
		            		
		            	</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Jalan</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="jalan" name="jalan" required="" value="<?= $data->jalan;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Negara</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="negara" id="negara" required 
		            value="<?= $data->negara;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Koordinat</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="koordinat" id="koordinat" required value="<?= $data->koordinat;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Type</label>
		          <div class="col-sm-9">
					<select name="type" id="type" class="form-control custom-select" required="">
		              <option disabled value="">Pilih Type</option>
		              <option value="0" <?php if($data->type == 0): ?> selected <?php endif?>>HO</option>
		              <option value="1" <?php if($data->type == 1): ?> selected <?php endif?>>Originating</option>
					  <option value="2" <?php if($data->type == 2): ?> selected <?php endif?>>Terminating</option>
		            </select>
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">PIC</label>
		          <div class="col-sm-9">
		            <input type="text" class="form-control" name="kontak" id="kontak" required value="<?= $data->kontak;?>">
		          </div>
						</div>
						<div class="form-group row">
		          <label class="col-sm-3 col-form-label">No Telpon</label>
		          <div class="col-sm-9">
		            <input type="tel" minlength="9" maxlength="14" oninput="validAngka(this)" class="form-control" name="no_telp" id="no_telp" value="<?= $data->no_telp;?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <label class="col-sm-3 col-form-label">Update By</label>
		          <div class="col-sm-9">
		            <input type="text" name="update_by" class="form-control" id="alamat_id" value="<?= $this->session->userdata('nama_pegawai');?>" disabled></input>
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
</div>

<!-- Modal Edit customer-->
<div class="modal fade" id="editcustomer<?=$no?>" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <table class="table table-bordered" width="100%" id="dataTable2" cellspacing="0">
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
                <button class="btn btn-info" id="edit"
                data-id_edit="<?= $data->customer_id?>" 
                data-nama_edit="<?= $data->nama_customer?>">Pilih
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
    $(document).on('click', '#edit', function() {
      var customer_id1 = $(this).data('id_edit');
      var nama_customer1 = $(this).data('nama_edit');
      $('#id<?=$no?>').val(customer_id1);
      $('#nama<?=$no?>').val(nama_customer1);
      $('#editcustomer<?=$no?>').modal('hide');
    })
  })
</script>

<?php endforeach; ?>

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
	$(document).ready(function(){
		var nama_provinsi = $("option:selected",this).attr('nama_provinsi');
		$.ajax({
			type:'post',
			url:'<?= site_url('assets/api/Provinsi.php')?>',
			data:'nama_provinsi='+nama_provinsi,
			success:function(hasil_provinsi)
			{
				$("select[name=provinsi]").html(hasil_provinsi);
				console.log(nama_provinsi);
			}
		})

		$("select[name=provinsi]").on("change",function(){
			var id_provinsi = $("option:selected",this).attr("id_provinsi");
			$.ajax({
				type:'post',
				url:'<?= site_url('assets/api/Kota.php')?>',
				data:'id_provinsi='+id_provinsi,
				success:function(hasil_kota)
				{
					$("select[name=kota]").html(hasil_kota);
					console.log(id_provinsi);
				}
			})
		})

	})
</script>
