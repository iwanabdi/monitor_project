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
							<td style="text-align: left;" width="80%"><?= $row->nama_pegawai?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td style="text-align: left;">
								<?php if ($row->jabatan == 0) {
										echo "SPV";
									} else if($row->jabatan == 1) {
										echo "PM";
									} else if($row->jabatan == 2) {
										echo "Admin";
									} else if($row->jabatan == 3) {
										echo "Gudang";
									} else if($row->jabatan == 4) {
										echo "QC";
									} else{
										echo "Developer";
									}
									?>
							</td>
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
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Nama Customer</h3>Alamat Customer</td>
            <td class="desc">PA NODE ID</td>
            <td class="desc">NO. IO</td>
            <td class="desc">SERVICE ID</td>
            <td class="desc">TANGGAL MULAI</td>
            <td class="desc">TANGGAL SELESAI</td>
          </tr>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Nama Customer</h3>Alamat Customer</td>
            <td class="desc">PA NODE ID</td>
            <td class="desc">NO. IO</td>
            <td class="desc">SERVICE ID</td>
            <td class="desc">TANGGAL MULAI</td>
            <td class="desc">TANGGAL SELESAI</td>
          </tr>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Nama Customer</h3>Alamat Customer</td>
            <td class="desc">PA NODE ID</td>
            <td class="desc">NO. IO</td>
            <td class="desc">SERVICE ID</td>
            <td class="desc">TANGGAL MULAI</td>
            <td class="desc">TANGGAL SELESAI</td>
          </tr>
        </tbody>
			</table>
			<h3><i>*Sebelum & Sesudah melakukan pekerjaan di JB & PoP, Harap menginformasikan ke SERPO Terkait / TIM Pemeliharaan. PIC FS Jatim HP (08113408687)</i></h3>
			<h3>Petugas Lapangan :</h3>

      <div id="notices">
        <div class="notice">Tidak Safety, Lebih Baik Pulang</div>
      </div>
    </main>
    <footer>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
  </body>
</html>
