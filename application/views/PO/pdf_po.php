<!DOCTYPE html>
<html>
<head>
	<title>PDF PO</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/invoice/style.css" media="all" />
    <style type="text/css">
		.kotak{
			border:1px solid black;
			/*width: 50%;*/
			border-collapse: collapse;
			/*margin-bottom: 10px;*/
			/*margin-top: 10px;*/
			/*height: 215px;*/
		}
		.kotak .txtvendor{
		  	font-family: sans-serif;
			margin-left: 10px;
			line-height: 1em;
		}
		.kotak .txtvendor span{
		  	text-transform: uppercase;
		}
		.kotak .txtinvoice{
		  	font-family: sans-serif;
			margin-left: 10px;
		}
		.kotak2{
			
		  /*width: 50%;*/
		  /*margin-top: 375px;*/
			/*margin-top: 0.5em;*/
			/*margin-left: 40px;*/

		}
		#kotak3{
		  	font-family: sans-serif;
			border:1px solid black;
			width: 45%;
		  	float: left;
			/*margin-bottom: -1px;*/
			margin-top: 10px;
			height: 157px;
		}
		#kotak3 .txtinvoice{
			margin-left: 10px;
			float: left;
		}

		#kotak4{
		  font-family: sans-serif;
			border: 1px solid black;
			/*margin-top: -160px;*/
			/*margin-right: -30px;*/
		  /*margin-left: 50px;*/
		  	float: right;
			width: 50%;
			height: 157px;


		}
		#kotak4 .txtship{
			margin-left: 10px;
		}
		.kotak5{
		  	font-family: sans-serif;
			border: 1px solid black;
			margin-top: 10px;
			width: 100%;
			border-spacing: 0px;

		}
		.tak{
		  background-color: #F0F8FF;
		  padding-right: 50px;
		  padding-left: 50px;
		  text-align: center;
		}
		.table1 {
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
			width:100%;
		  	/*margin-right: -100px;*/
		}
		.table1, th, td {
			border: 1px solid black;
			/*padding: 5px 50px 5px 50px;*/
			/*margin-top: -500px;*/
			/*margin-left: 400px;*/
		}
    </style>
</head>
<body>
	<div style="width: 100%;">
	    <div style="width: 120px; float: left;">
	    	<img src="<?=base_url('assets/invoice/logo_icon.png');?>" width="100px" style="border: 1px solid black;">
	    </div>
	    <div style="width: 340px; float: left;">
	    	<h4>PT. INDONESIA COMNET PLUS ( ICON + ) <br> Kawasan PLN Cawang,<br>
			Jl. Mayjend Sutoyo No. 1 Cililitan Jakarta Timur<br> 13640 Indonesia</h4>
	    </div>
	    <div style="float: right;width: 180px;">
		<h4 style="padding-top:20px;font-size:18px;"><u>PURCHASE ORDER</u></h4>
	    </div>
	</div>
	<div style="width: 100%">
		<div class="kotak" style="float: left;width: 45%">
			<div class="txtvendor">
				<h5>Vendor : <?= $vendor->mitra_id;?><br>
				<span><?= $vendor->nama_mitra;?></span><br>
				<span><?= $vendor->alamat;?></span><br><br><br>
				<span><?= $vendor->kota;?></span><br>
				Phone : <?= $vendor->no_telp;?><br>
				Fax : <?= $vendor->fax;?></h5>
			</div>
		</div>
		<div class="kotak2" style="float:right;width: 50%;">
			<table class="table1">
				<tr>
					<th colspan="2" width="50%">PO Number</th>
					<th colspan="2" width="50%">PO Date</th>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center;"><?= $row->po_no?></td>
					<td colspan="2" style="text-align:center;"><?= $row->create_on?></td>
				</tr>
				<tr>
					<th width="50%">Revisi Date</th>
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
	</div>

	<div style="width: 100%;">
		<div id="kotak3">
			<div class="txtinvoice">
				<h5>Invoice To : <br>
				<span>PT. Indonesia Comnets Plus (ICON+)</span><br>
				<span>Jl. KH Abdul Rochim No 1 Kuningan Barat, Mampang</span><br>
				<span>Jakarta Selatan 12710</h5>

			</div>
		</div>
		<div id="kotak4">
			<div class="txtship">
				<h5>Ship To : <br>
				<span>SBU Surabaya</span><br>
				<span>Jl. Ketintang Baru 1 No. 1-3</span><br>
				<span>Surabaya 60231</h5>
			</div>
		</div>
	</div>

	<div style="width: 100%;">
		<div class="kotak5">
			<table class="table1" width="100%">
				<tr>
					<th style="text-align: left;" width="30%">Project Name</th>
					<th style="text-align: left"><?= $vendor->project_name?>
					</th>
				</tr>
			</table>
		</div>

		<div class="kotak5">
			<table class="table1" width="100%">
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
					<td colspan="6"></td>
					<td style="text-align: center;"><b>GRAND TOTAL</td>
					<td><b>Rp. <?= $grand;?></b></td>
				</tr>
				
			</table>
		</div>

		<div class="kotak5">
			<!-- <table width="100%" style="border-collapse: collapse;border-spacing: 0;"> -->
				<h5 style="text-align: left;margin-left: 10px;">NOTE: <br>
					- Rincian Lingkup pekerjaan, harga, spesifikasi teknik (bila ada), cara pembayaran, dan syarat-syarat lainnya akan diuraikan dalam lampiran PO SAP. <br>
					- Sebagai bukti persetujuan atas syarat-syarat diatas, diharapkan surat penunjukan ini ditandatangani diatas materai Rp. 6000,- dan dibubuhi cap perusahaan, dan dikembalikan kepada Divisi Pengadaan dan logistik selambat-lambatnya 5 hari kerja setelah tanggal surat ini.
				</h5>
			<!-- </table> -->
		</div>
	</div>

	<div style="width: 75%; float: right;">
		<div class="kotak5">
			<table style="float: right; border-collapse: collapse;border-spacing: 0;" width="100%">
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

</body>
</html>