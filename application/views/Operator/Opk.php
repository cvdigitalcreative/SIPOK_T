<style type="text/css">.cool{
  border-collapse:collapse; 
  border:1px solid black;
  }
</style>
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <center><h2>Mencetak OPK...</h2></center>
     <div class="row-fluid">
      <div class="span9">

        <div class="widget-box" style="margin-left: 260px">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data LHPK</h5>
          </div>
          <div  class="widget-content">
            <?php if(sizeof($entri) > 0){?>
               <form id="formentry" class="form-horizontal">

                 <div class="control-group">
                    <label class="control-label">Manajer Sarana & Umum  </label>
                     <div class="controls">
                       <input type="text"   id="Manajer" class="span8" placeholder="Masukkan Manajer Sarana dan Umum" />
                    </div>             
                 </div>

                 <div class="control-group">
                    <label class="control-label">Nomor Badge  </label>
                     <div class="controls">
                       <input type="text"   id="Badge_Manajer" class="span8" placeholder="Masukkan Nomor Badge Manajer Sarana dan Umum" />
                    </div>             
                 </div>

                 <button class="btn btn-primary" id="cetak">Cetak</button>
                 <input type="reset" class="btn btn-warning" name="">

               </form>
            <?php }else{?>
                   <h4>Maaf , Record Tidak Ditemukan... :(</h4>
              <?php }?>
             <div id="spk" hidden>
             <table border="0" cellpadding="0" style="margin-left:45px; width:80%;" >
               <tr>
                 <td><b>PT.PUSRI SRIWIDJAJA PALEMBANG</b><hr width="69%" align="left"></td>
                 <td><b>Nomor Order</b></td>
                 <td>:</td>
                 <td><?php echo $entri[0]['nomor']; ?></td>
               </tr>
             </table>
             
             <table border="0" cellpadding="0" style="margin-left:180px; width:80%;" >
               <tr>
                 <td><b>SEKSI TRANSPORT</b></td>
                 <td><b>Tanggal</b></td>
                 <td>:</td>
                   <?php $createDate = new DateTime( $entri[0]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                 <td><?php echo $strip; ?></td>
               </tr>
             </table>
                  <table align="center" border="0" cellpadding="1" style="width: 700px;"> 
<tr>     <td colspan="3" align="center">
<span><b><u>ORDER - PERBAIKAN KENDARAAN</u></b></span><br><br><br></td><br><br><br></table>

<table border="0" style="margin-left:45px;">
<tr>
  <td>Kepada</td>
  <td>:</td>
  <td><?php echo $entri[0]['nama_vendor']; ?></td>
</tr><br>
<tr>
  <td>Dari</td>
  <td>:</td>
  <td>PT PUSRI (Departemen Sarana & Umum)</td>
</tr><br>
<tr>
  <td>Hal</td>
  <td>:</td>
  <td>SERVICE / PERBAIKAN KENDARAAN</td>
</tr></table>

<table align="center" border="0" cellpadding="1" style="width: 700px;"> 
<tr>     <td colspan="3" align="center">
<span style="font-family: sans-serif;">Harap dapat dilakukan perbaikan kendaraan dinas milik PT Pusri dengan rincian sbb :</span><br><br><br></td><br><br><br></table><br>

<table class="cool" border="1" cellspacing="0" cellpadding="3" style="margin-left:45px; width:88%; border-style: solid; ">
  <?php 
    $size = sizeof($entri);
    for($i=0;$i<$size;$i++){
  ?>
  <tr>
    <td><center><?php echo $i+1?>.</td>
    <td><?php echo $entri[$i]['pekerjaan']?> (<?php echo $entri[$i]['quantity']?> <?php echo $entri[$i]['satuan']?>) - (<?php echo $entri[$i]['keterangan']?>) (<?php echo $entri[$i]['nama_spare_part']?>)</td>
  </tr>
  <?php } ?>
</table><br><br><br>

<table border="1" cellpadding="2" cellspacing="0" style="width: 88%; margin-left:45px;">
  <tr>
    <td style="border-right:0px;">USER</td>
    <td style="border-left:0px; border-right:0px;">:</td>
    <td colspan="5" style="border-left:0px; border-right:0px;"><?php echo $entri[0]['org_name']; ?></td>
  </tr><br>
  <tr>
    <td style="border-right:0px;">JENIS KENDARAAN</td>
    <td style="border-left:0px; border-right:0px;">:</td>
    <td style="border-left:0px; border-right:0px;"><?php echo $entri[0]['jenis_kendaraan']; ?></td>
    <td style="border-left:0px; border-right:0px;">No.POLISI</td>
    <td style="border-left:0px; border-right:0px;">:</td>
    <td style="border-left:0px; border-right:0px;"><?php echo $entri[0]['no_polisi']; ?></td>
  </tr>
  <tr>
    <td style="border-right:0px;">COST CENTRE</td>
    <td style="border-left:0px; border-right:0px;">:</td>
    <td style="border-left:0px; border-right:0px;"><?php echo $entri[0]['cost_center']; ?></td>
    <td style="border-left:0px; border-right:0px;">No.INVENTARIS</td>
    <td style="border-left:0px; border-right:0px;">:</td>
    <td style="border-left:0px; border-right:0px;"><?php echo $entri[0]['no_inventaris']; ?></td>
  </tr>
</table>

<table align="center" border="0" cellpadding="1" style="width: 620px;"> 
<tr>     <td colspan="3" align="left">
<span style="font-family: sans-serif;">Demikian untuk dilaksanakn dengan sebaik-baiknya atas perhatian dan kerjasamanya diucapkan terima kasih.</span><br><br><br></td><br><br><br></table><br>

<table border="0" style="width:63%; margin-left:45px;">
<tr>
<td>Manajer Sarana & Umum</td>
</tr>
</table><br><br><br><br>

<table>
  <div style="margin-left:80px;" id="manajer"></div>
  <hr width="25%" align="left" style="margin-left:45px; color:black;">
</table>

<table border="0" style="width:63%; margin-left:45px;">
<tr>
  <td><div id="badge" ></div></td>
</tr>
</table><br><br><br>

<table border="0" style="margin-left:45px;">
  <tr>
    <td>Lampiran 1</td>
  </tr>
</table>

             </div>
          </div>
       </div>
     </div>
   </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
        
         $("#cetak").click(function(){
          MSU = $("#Manajer").val();
          Badge_MSU = $("#Badge_Manajer").val();
          
          $("#manajer").text(MSU);
          $("#badge").text("Badge No."+Badge_MSU);
      

          w=window.open();
          w.document.write($('#spk').html());
          w.print();
          w.close();
      })
  })
</script>