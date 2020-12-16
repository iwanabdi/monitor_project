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
				<h1>PT. INDONESIA COMNET PLUS ( ICON + ) <br> Kawasan PLN Cawang,<br>
					Jl. Mayjend Sutoyo No. 1 Cililitan Jakarta Timur<br> 13640 Indonesia</h1>
			</div>
			<div id="txtpurchase">
				<h1>PURCHASE ORDER</h1>
					<div id="barcode">
						<!-- <?= $rows?> -->
		        		<!-- <img src="<?=base_url();?>assets/invoice/barcode.png"> -->
					</div>
			</div>
		</header>
    <main>
      <div id="details" class="clearfix">
			<div class="kotak">
				<div class="txtvendor">
					<h3>Vendor : <?= $vendor->mitra_id;?></h3>
					<h3><span><?= $vendor->nama_mitra;?></span></h3>
					<h3><span><?= $vendor->alamat;?></span></h3></br></br></br></br></br></br></br></br></br></br>
					<h3><span><?= $vendor->kota;?></span></h3>
					<h3>Phone : <?= $vendor->no_telp;?></h3>
					<h3>Fax : <?= $vendor->fax;?></h3>
				</div>
			</div>

			<div class="kotak2"> 
				<table class="table1">
					<tr>
						<th colspan="2" width="50%">PO Number</th>
						<th colspan="2">PO Date</th>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;"><?= $row->po_no?></td>
						<td colspan="2" style="text-align:center;"><?= $row->create_on?></td>
					</tr>
					<tr>
						<th>Revisi Date</th>
						<th>Revisi No</th>
						<th colspan = "2">Buyer</th>
					</tr>
					<tr>
						<td style="text-align: center;"><?= $row->update_on?></td>
						<td style="text-align: center;"><?= $row->rev?></td>
						<td colspan="2" style="text-align:center;">KP-Logistik</td>
					</tr>
					<tr>
						<th colspan="2">PR Number</th>
						<th colspan="2">Stand Alone Contract No</th>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;"><?= $row->pr_no?></td>
						<td colspan="2" style="text-align:center;"></td>	
					</tr>
				</table>
			</div> 
			
			<div id="kotak3">
				<div class="txtinvoice">
					<h3>Invoice To : </h3>
					<h3>PT. Indonesia Comnets Plus (ICON+)</h3>
					<h3>Jl. KH Abdul Rochim No 1 Kuningan Barat, Mampang</h3>
					<h3>Jakarta Selatan 12710</h3>

				</div>
			</div>
			<div id="kotak4">
				<div class="txtship">
					<h3>Ship To : </h3>
					<h3>SBU Surabaya</h3>
					<h3>Jl. Ketintang Baru 1 No. 1-3</h3>
					<h3>Surabaya 60231</h3><br>
				</div>
			</div>

			<div class="kotak5">
				<table width="980px" style="border-collapse: collapse;border-spacing: 0;">
					<tr>
						<th style="text-align: left" width="30%">Project Name</th>
						<th style="text-align: left"><?= $vendor->project_name;?>
						</th>
					</tr>
				</table>
			</div>
			<!-- <div class="kotak5">
				<table width="980px" style="border-collapse: collapse;border-spacing: 0;">
					<tr>
						<th style="text-align: left" width="30%">Additional Instructions : </th>
						<th style="text-align: left">No PA : SPA/ACT/2008/0005458</th>
					</tr>
				</table>
			</div> -->
			<div class="kotak5">
					<table width="980px" style="border-collapse: collapse;border-spacing: 0;">
						<tr>
							<th>No</th>
							<th>Pekerjaan</th>
							<th>Keterangan</th>
							<th>Qty</th>
							<th>UoM</th>
							<th>Dev Date</th>
							<th>Unit Price (IDR)</th>
							<th>Total (IDR)</th>
						</tr>
						<?php $grand = 0;?>
						<?php foreach ($data_po->result() as $key => $data){
							$no = 1;?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $data->pekerjaan_id;?></td>
								<td><?= $data->nama_pekerjaan;?></td>
								<td><?= $data->qty;?></td>
								<td><?= $data->satuan;?></td>
								<td><?= $data->create_on;?></td>
								<td>Rp. <?= $data->price;?></td>
								<td>Rp. <?= $data->total;?></td>
							</tr>
							<?php $grand += $data->total;?>
						<?php } ?>
						<tr>
							<td colspan="6" style="border: 0px;"></td>
							<td style="text-align: center;"><b>GRAND TOTAL</td>
							<td><b>Rp. <?= $grand;?></b></td>
						</tr>
						
					</table>
			</div>
			<div class="kotak5">
				<table width="980px" style="border-collapse: collapse;border-spacing: 0;">
					<th style="text-align: left;">NOTE:
						<li>Rincian Lingkup pekerjaan, harga, spesifikasi teknik (bila ada), cara pembayaran, dan syarat-syarat lainnya akan diuraikan dalam lampiran PO SAP.</li>
						<li>Sebagai bukti persetujuan atas syarat-syarat diatas, diharapkan surat penunjukan ini ditandatangani diatas materai Rp. 6000,- dan dibubuhi cap perusahaan, dan dikembalikan kepada Divisi Pengadaan dan logistik selambat-lambatnya 5 hari kerja setelah tanggal surat ini.</li>
					</th>
				</table>
			</div>
			<div class="kotak5">
				<table style="float: right; margin-right: -36px;border-collapse: collapse;border-spacing: 0;">
					<tr>
						<th class="tak">Diterbitkan Oleh :</th>
						<th class="tak">Diterima dan Disetujui :</th>
					</tr>
					<tr>
						<td style="text-align: center;">PT. Indonesia Comnet Plus</td>
						<td>Tanggal : <br>
							<hr>
							Perusahaan : 
						</td>
					</tr>
					<tr>
						<td style="height: 100px;"></td>
						<td style="height: 100px;text-align:center;"> (Materai Rp. 6000) </td>
					</tr>
				</table>
			</div>
		</div>
    </main>
  </body>
</html>
<!-- <script type="text/javascript">
	alert("Klik OK Untuk Simpan File / Print File !!!")
	window.print();
</script> -->
