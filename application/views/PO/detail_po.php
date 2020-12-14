<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Purchase Order</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice/po.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?=base_url();?>assets/invoice/logo_icon.png" >
			</div>
			<div id="alamat">
				<h1>PT. INDONESIA COMNET PLUS ( ICON + ) , <br> Kawasan PLN Cawang , <br>
					Jl. Mayjend Sutoyo No. 1 Cililitan Jakarta Timur ,<br> 13640 Indonesia</h1>
			</div>
			<div id="txtpurchase">
				<h1>PURCHASE ORDER</h1>
			</div>
			<div id="barcode">
        <img src="<?=base_url();?>assets/invoice/barcode.png" >
			</div>

		</header>
    <main>
      <div id="details" class="clearfix">
				<!-- <div class="tengah">
							<div class="kiri">

							</div>
							<div class="kanan">

							</div>


				</div> -->
				<div class="kotak">
							<div class="txtvendor">
								<h3>Vendor : </h3> <br>
								<h3>JAVAND</h3><br>
								<h3>alamat</h3><br>
								<h3>surabata</h3><br>
								<h3>Phone : </h3>
								<h3>Fax : </h3><br>
							</div>	
				</div>

				<div class="kotak2"> 
							<table class="table1">
								<tr>
									<th>PO Number</th>
									<th>PO Date</th>
									<th> </th>
									<th>Page</th>
								</tr>
								<tr>
									<td>4600081123</td>
									<td>10.08.2020</td>
									<td></td>
									<td>1</td>
								</tr>
								<tr>
									<td>Revisi Date</td>
									<td>Revisi No</td>
									<td colspan = "2">Buyer</td>
									
								</tr>
								<tr>
									<td>31.08.2020</td>
									<td>1</td>
									<td colspan = "2">KP-Logistik</td>
								</tr>
								<tr>
									<td>PR Number</td>
									<td colspan = "3">Stand Alone Contract No</td>
								</tr>
								<tr>
									<td>20059029</td>
									<td colspan = "3"></td>	
								</tr>
							</table>
				</div> 
				

				<div id="kotak3">
					<div class="txtinvoice">
						<h3>Invoice To : </h3><br>
						<h3>PT. cacpek </h3><br>
						<h3>Alamat Capek : </h3><br>

					</div>
				</div>

				
				<div id="kotak4">
					<div class="txtship">
						<h3>Ship To : </h3><br>
						<h3>PT. cacpek </h3><br>
						<h3>Alamat Capek : </h3><br>
						<h3>Alamat Capek : </h3><br>

					</div>
				</div>
				<div class="kotak5">
							<div id="kiri"> <h3>Sunardi - Komplek PLN Gitet Krian Driyorejo Gresik/Komplek PLN Gitet Krian Driyorejo Gresik</h3>	</div>
							<div id="kanan"> <h3>Project Name</h3></div>
				</div>
        <!-- <div id="client">
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
          </h2>
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
          $no  = 1; 
          foreach ($invoice->result() as $key => $data) {?>
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
      <br> -->
    </main>
    <footer>
      <div id="notices">
        <div class="notice">Tidak Safety, Lebih Baik Pulang</div>
      </div> -->
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
  </body>
</html>
<!-- <script type="text/javascript">
	alert("Klik OK Untuk Simpan File / Print File !!!")
	window.print();
</script> -->
