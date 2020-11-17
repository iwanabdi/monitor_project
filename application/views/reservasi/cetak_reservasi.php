<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/invoice/reservasi.css" media="all" />
<!------ Include the above in your HEAD tag ---------->
<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="<?=base_url();?>assets/invoice/logo_icon.png" width="150px" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            PT Indonesia Comnets Plus
                        </h2>
                        <h5>Wisma Mulia, 50th Floor
                        <br>Jalan Jendral Gatot Subroto No. 42
                        <br>Jakarta 12710
                        </h5>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h4 class="to">FORM PEMESANAN (RESERVATION SLIP)</h4>
                        <h5 class="address">NOMOR : <?= $rows->reservasi_no?>
                        <br>
                        <br> PLANT : 2003 SBU Surabaya
                        <br>MOV. TYPE : 961 GI for Activation
                    </div>
                    <div class="col invoice-details">
                        <br>
                        <br>
                        <br>
                        <br>
                        <h5 class="name">COST CENTER : <?= $rows->io?></h5>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                  <thead>
                    <tr>
                      <th>
                        <h4>NO WORK ORDER</h4>
                        <?= $rows->no_wo?>
                      </th>
                      <th>
                        <h4>LOKASI</h4>
                        <?= $rows->lokasi?>
                      </th>
                    </tr>
                  </thead>
                </table>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                      <tr>
                          <th class="text-center">No Material</th>
                          <th class="text-center">Nama Material</th>
                          <th class="text-center">Jumlah</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Gudang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($row->result() as $key => $data) {
                        $no = 1;?>
                      <tr>
                        <!-- <td class="no"><?= $no++;?></td> -->
                        <td class="unit text-center"><?= $data->material_id;?></td>
                        <td class="unit text-center"><?= $data->nama_material;?></td>
                        <td class="unit text-center"><?= $data->qty;?></td>
                        <td class="unit text-center"><?= $data->create_on;?></td>
                        <td class="tgl"></td>
                      </tr>
                     <?php }?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
                <!-- <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div> -->
            </main>
            <footer>
                Disclaimer 
                <br>Reservation that has not been picked up more than 3 days from requirement date will be automatically deleted from the system
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<script type="text/javascript">
   $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>