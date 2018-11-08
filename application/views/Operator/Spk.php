
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <center><h2>Mencetak SPK.....</h2></center>
     <div class="row-fluid">
      <div class="span12">

        <div class="widget-box" hidden>
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data LHPK</h5>
          </div>
          <div  class="widget-content">
             <div id="spk" hidden>
              
                      <h2>
                      <table style="margin-left: 10px" cellpadding="2">
                          <tr>
                              <td rowspan="2"><img src="<?php echo base_url();?>img/logopusri.png" style="width: 47px;margin-top: 20px" alt="Smiley face"></h2></td>
                              <td width="200"></td>
                              <td><h2 style="margin-top: 30px"><center><u>SURAT PERINTAH KERJA(SPK)</u></center></h2><center>PERBAIKAN  KENDARAAN PT PUPUK SRIWIDJAJA PALEMBANG</center></td>
                          </tr>
                          <tr>                            
                          </tr>
                      </table>
                   <center>
                      <table border="1" cellpadding="4" width="1000">
                          <tr>
                              <td colspan="2"><b>No. Inv.</b> <?php echo $entri[0]['no_inventaris']; ?> </td>
                              <td><b>User</b> <?php echo $entri[0]['nama_user']; ?></td>
                              <td colspan="3"><b>Telp:</b> <?php echo $entri[0]['no_ex']; ?></td>
                          </tr>
                          <tr>
                              <td><b>No.Polisi</b></td>
                              <td ><b>No Rangka & No.Mesin</b></td>
                              <td ><b>Tipe Kendaraan & Thn.Produk</b></td>
                              <td colspan="3"><b>Cost Center</b></td>
                          </tr>
                          <tr>
                              <td><?php echo $entri[0]['no_polisi']; ?></td>
                              <td><?php echo $entri[0]['no_rangka']?> <?php echo $entri[0]['no_mesin']; ?></td>
                              <td><?php echo $entri[0]['jenis_kendaraan']; ?> <?php echo $entri[0]['tahun']; ?></td>
                              <td colspan="3"><?php echo $entri[0]['cost_center']; ?></td>
                          </tr>
                          <tr>
                              <td colspan="2"><b>No.SPK: </b><?php echo $entri[0]['nomor']; ?></td>
                                <?php $createDate = new DateTime( $entri[0]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                              <td colspan="4"><b>Tanggal: </b><?php echo $strip; ?></td>
                          </tr>
                          <tr>
                              <td colspan="6"><b>Kepada: </b><?php echo $entri[0]['nama_vendor']; ?></td>
                          </tr>
                      </table>
                        <br>
                        <center><b>JENIS KERUSAKAN</b></center>
                      <table border="1" width="1000" cellpadding="5">
                      <?php 
                         $size = sizeof($entri);
                         for($i=0;$i<$size;$i++){
                      ?>
                          <tr>
                              <td><?php echo $entri[$i]['pekerjaan']; ?> (<?php echo $entri[$i]['quantity']; ?> <?php echo $entri[$i]['satuan']; ?>) (<?php echo $entri[$i]['nama_spare_part']; ?>)</td>
                          </tr>
                          <?php } ?>
                      </table>
                      <br>
                        <b style="margin-left: 400px">Palembang,</b>
                      <br><br>
                      <table cellpadding="2" width="1000">
                          <tr>
                              <td>Diajukan Oleh :<br><b>Staf Pemel. Transport</b></td>
                              <td>Diserahkan Oleh :<br><b>User Kendaraan</b></td>
                              <td>Diterima Oleh :<br><b>Mekanik</b></td>
                              <td>Disetujui Oleh :<br><b>Staf Senior Transport</b></td>
                          </tr>
                          <tr>
                              <td height="60"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                           <tr>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                          </tr>
                      </table>
                      <br><br>
                      <b><u>LAPORAN SELESAI PERBAIKAN KENDARAAN</u></b><br><br><b style="margin-left: 400px">Tanggal Selesai : </b><br><b style="margin-left: -700px">Penggantian Suku Cadang: </b>
                      <table border="1" width="1000" cellpadding="2">
                          <tr>
                              <td><b>No</b></td>
                              <td><b>Nama Suku Cadang</b></td>
                              <td><b>No.Suku Cadang</b></td>
                              <td><b>Jumlah & Satuan</b></td>
                              <td><b>Keterangan</b></td>
                          </tr>
                          <?php for($i=0;$i<6;$i++){?>
                           <tr>
                               <td><center><?php echo $i+1;?></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                           </tr>
                          <?php }?>
                      </table>
                      <b style="margin-left: 400px">Palembang,</b>
                      <br><br>
                      <table cellpadding="2" width="1000">
                          <tr>
                              <td>Dikoreksi Oleh :<br><b>Staf Pemel. Transport</b></td>
                              <td>Diterima Oleh :<br><b>User Kendaraan</b></td>
                              <td>Diterima Oleh :<br><b>Mekanik</b></td>
                              <td>Disetujui Oleh :<br><b>Staf Senior Transport</b></td>
                          </tr>
                          <tr>
                              <td height="60"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                           <tr>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                              <td>_________________<br>Badge :</td>
                          </tr>
                      </table>
                      <br>
                      <table cellpadding="2" width="400px" style="margin-right: 750px;">
                         <tr>
                            <td>Putih</td>
                            <td>:</td>
                            <td>Lampiran Tagihan Rekanan</td>
                         </tr>
                         <tr>
                            <td>Kuning</td>
                            <td>:</td>
                            <td>File Rekanan</td>
                         </tr>
                         <tr>
                            <td>Biru</td>
                            <td>:</td>
                            <td>File User</td>
                         </tr>
                          <tr>
                            <td>Merah</td>
                            <td>:</td>
                            <td>File Pool Transport</td>
                         </tr>
                      </table>
                       
                 </center>
             </div>
          </div>
        </div>
     </div>
  </div>
 </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
        
        w=window.open();
        w.document.write($('#spk').html());
        w.print();
        w.close();

         window.location.href = "<?php echo site_url();?>Operator/proses";

	})
</script>