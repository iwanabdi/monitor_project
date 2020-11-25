<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Surat Tugas Aktivasi</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_url();?>assets/invoice/logo_icon.png">
      </div>
      <div id="logo1">
        <img src="<?=base_url();?>assets/invoice/logo_k3.png">
			</div>
			<div id="invoice">
					<h1 class="invoice"><u>Surat Tugas Aktivasi</u></h1>
          <h2 class="invoice"><?= $row->no_stg;?></h2>
          <!-- <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div> -->
			</div>
		</header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <h2 class="to">Yang bertanda tangan di bawah ini :</h2>
					<table style="border-spacing: 3;font-size: 1.5em; margin-bottom: 20px; white-space: nowrap;padding: 20px;">
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
          <h2 class="to">Mengijinkan masuk lokasi ICON+ (POP, Server ICON+ Area PLN) untuk pekerjaan kabel Fiber Optik Outdoor &Indoor, instalasi perangkat dan Testcom untuk Aktivasi berikut :
          
        </div>
        <!-- <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div> -->
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
          <?php foreach ($invoice->result() as $key => $data) {
            $no = 1;
            ?>
          <tr>
            <td class="no"><?= $no++;?></td>
            <td class="desc"><h3 style="text-transform: uppercase;"><?= $data->nama_customer;?></h3><?= $data->alamat;?></td>
            <td class="desc"><?= $data->project_id;?></td>
            <td class="desc"><?= $data->IO;?></td>
            <td class="desc"><?= $data->SID;?></td>
            <td class="tgl"><?= $data->create_on;?></td>
            <td class="tgl"><?= $data->target_date;?></td>
          </tr>
         <?php }?>
          
        </tbody>
			</table>
			<h3><i>*Sebelum & Sesudah melakukan pekerjaan di JB & PoP, Harap menginformasikan ke SERPO Terkait / TIM Pemeliharaan. PIC FS Jatim HP (08113408687)</i></h3>
			<h3><u>Pengawas dari ICON+ :</u></h3>
      <ul>
        <li><b>
          <?= $row->nama_pegawai;?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          (HP. <?= $row->no_telp?>)
        </b></li>
      </ul>
      <b>
      <span>Kepada yang berwenang dimohon bantuannya agar dapat membantu kelancaran pekerjaan tersebut.</span><br>Note: Adapun ijin pelaksanaan pekerjaan di area ICON+ (Area PLN) adalah pada hari Senin sampai Jum'at Jam 08.00 s/d 16.00 jika melewati wakti tersebut, harus melaporakan kepada salah satu penanggung jawab di atas pada hari yang bersangkutan.
      <br>
      <br>
      <span>Demikian Surat Tugas ini disampaikan agar dapat digunakan dengan semestinya.</span>
      <br>
      <br>
      <span>Surabaya, <?= $row->create_on;?></span>
      <span><br>SPV Bidang Aktivasi SBU Regional Jawa Bagian Timur
      <br>
      <span><br><img width="100px" src="<?=base_url();?>assets/invoice/logo_icon.png"></span>
      <br>
      <br>
      <span><br><?= $row_spv->nama_pegawai;?></span>

      <br>
      <br>
    </main>
    <footer>
      <div id="notices">
        <div class="notice">Tidak Safety, Lebih Baik Pulang</div>
      </div>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
  </body>
</html>
