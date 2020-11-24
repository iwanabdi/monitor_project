<!DOCTYPE html>
<html>
<head>
	<title>PDF SURAT TUGAS</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice/style.css" media="all" />
</head>
<body>
	<div style="width: 100%;">
	    <div style="width: 600px; float: left;">
	    	<img src="<?=base_url('assets/invoice/logo_icon.png');?>" width="100px">
	    </div>
	    <div style="float: right;">
	    	<img src="<?=base_url('assets/invoice/logo_k3.png');?>" width="80px">
	    </div>
	</div>
    <div>
    	<b><h1 style="padding-top: -80px; margin-top: 50px;text-align:center;">
    		<u >Surat Tugas Ativasi</u>
    	</h1>
    	<h4 style="padding-top: -105px; margin-top: 100px;text-align:center;"><?= $row->no_stg;?></h4>
    	</b>
    </div>

      <div id="details" class="clearfix">
        <div id="client">
          <h4 class="to">Yang bertanda tangan di bawah ini :</h4>
					<table style="border-spacing: 3;margin-bottom: 20px; white-space: nowrap;padding: 20px;">
						<tr>
							<td width="20%">Nama</td>
							<td width="10%">:</td>
							<td style="text-align: left;" width="80%"><?= $row_spv->nama_pegawai?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td style="text-align: left;">SPV Bidang Aktivasi</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td style="text-align: left;">PT. Indonesia Comnet Plus (ICON+) SBU Regional Jawa Bagian Timur
								<br>JL. Ketintang Baru 1 No. 1-3, Surabaya 60231
							</td>
						</tr>
					</table>
          <h4 class="to">Mengijinkan masuk lokasi ICON+ (POP, Server ICON+ Area PLN) untuk pekerjaan kabel Fiber Optik Outdoor &Indoor, instalasi perangkat dan Testcom untuk Aktivasi berikut :
          </h4>
        </div>
      </div>
		<table class="table" border="0" cellspacing="0" cellpadding="0">
		    <thead>
		      <tr>
		        <th class="no">#</th>
		        <th class="unit">Customer Name</th>
		        <th class="unit">PA Node ID</th>
		        <th class="unit">No ID</th>
		        <th class="unit">Service ID</th>
		        <th class="unit">Mulai</th>
		        <th class="unit">Selesai</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php 
		      $no = 1;
		      foreach ($invoice->result() as $key => $data) {?>
		      <tr>
		        <td class="no"><?= $no++;?></td>
		        <td class="desc"><h3 style="text-transform: uppercase;color: #3989c6"><?= $data->nama_customer;?></h3><?= $data->alamat;?></td>
		        <td class="desc"><?= $data->project_id;?></td>
		        <td class="desc"><?= $data->IO;?></td>
		        <td class="desc"><?= $data->SID;?></td>
		        <td class="tgl"><?= $data->create_on;?></td>
		        <td class="tgl"><?= $data->target_date;?></td>
		      </tr>
		     <?php }?>
		    </tbody>
		</table>
		<h5><i>*Sebelum & Sesudah melakukan pekerjaan di JB & PoP, Harap menginformasikan ke SERPO Terkait / TIM Pemeliharaan. PIC FS Jatim HP (08113408687)</i></h5>
			<h5><u>Pengawas dari ICON+ :</u></h5>
      <ul style="padding-top: -20px;padding-bottom: -20px">
        <li><b>
          <h5><?= $row->nama_pegawai;?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          (HP. <?= $row->no_telp?>) 
      	  </h5></b>
    	</li>
      </ul>
      <b>
      <h5>Kepada yang berwenang dimohon bantuannya agar dapat membantu kelancaran pekerjaan tersebut.Note: Adapun ijin pelaksanaan pekerjaan di area ICON+ (Area PLN) adalah pada hari Senin sampai Jum'at Jam 08.00 s/d 16.00 jika melewati wakti tersebut, harus melaporakan kepada salah satu penanggung jawab di atas pada hari yang bersangkutan.</h5>
      <h5>Demikian Surat Tugas ini disampaikan agar dapat digunakan dengan semestinya.</h5>
      <h5>Surabaya, <?= $row->create_on;?>
      <br>SPV Bidang Aktivasi SBU Regional Jawa Bagian Timur</h5>
      <h5><img width="100px" src="<?=base_url();?>assets/invoice/logo_icon.png"></h5>
      <h5><?= $row_spv->nama_pegawai;?></h5>
      <footer>
      <div id="notices">
        <div class="notice">Tidak Safety, Lebih Baik Pulang</div>
      </div>
    </footer>
</body>
</html>