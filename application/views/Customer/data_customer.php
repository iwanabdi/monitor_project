<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-8">
      <h1 class="h3 mb-2 text-gray-800">Master Customer</h1>
      <p class="mb-4">Data Semua Customer yang aktif</p>
    </div>
    <div class="col-4">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  <hr>
  </div>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="row card-header col-12 mx-auto">
      <div class="col-10 p-0 p-2">
        <h5 class="m-0 font-weight-bold text-primary">Data Customer</h5>
      </div>
      <?php if ($this->session->userdata('jabatan')<= 0) {?>
				<div class="col-2 p-0">
        <a href="<?= site_url('master_customer/add')?>" class="btn btn-success btn-block" id="btn">
        <i class="fas fa-user-plus"></i> Add Customer
        </a>
      </div>
			<?php }?>
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <?php print_r($row->result()) ?> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama Customer</th>
              <th>Phone</th>
              <th>Fax</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>NPWP</th>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>
                <th>Opsi</th>
              <?php }?>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <!-- <th>ID</th> -->
              <th>Nama Customer</th>
              <th>Phone</th>
              <th>Fax</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>NPWP</th>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>
                <th>Opsi</th>
              <?php }?>
            </tr>
          </tfoot>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data)  {?>
            <tr>
              <td><?=$no++;?></td>
              <!-- <td><?=$data->customer_id?></td> -->
              <td><?=$data->nama_customer?></td>
              <td><?=$data->phone?></td>
              <td><?=$data->fax?></td>
              <td><?=$data->alamat?></td>
              <td><?=$data->email?></td>
              <td><?=$data->npwp?></td>
              <?php if ($this->session->userdata('jabatan')<= 0) {?>
								<td class="text-center" colspan="2">
									<a href="<?= site_url('master_customer/edit/'.$data->customer_id)?>" class="btn btn-warning btn-circle">
										<i class="fas fa-user-edit"></i>
									</a>
									<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapus_modal<?=$data->customer_id;?>">
											<i class="fas fa-user-times"></i>
									</button>
								</td>
							<?php }?>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Hapus Data-->

<?php $no = 1;
foreach ($row->result() as $key => $data) : $no++; ?>
<div class="modal fade" id="hapus_modal<?=$data->customer_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('master_customer/hapus_data');?>
          <input type="hidden" id="id" name="id" value="<?=$data->customer_id?>">
          <p>Anda akan menghapus data "<?=$data->nama_customer ?>"</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-danger" type="submit">Hapus</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Hapus Data -->
