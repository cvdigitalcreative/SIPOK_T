<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url()?>Unit" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
   <div class="container-fluid">
    <div class="container-fluid">
    <div class="quick-actions_homepage">
    </div>
    <hr>
    <!-- ENTRI SAYA -->
    <div class="row-fluid">
      <div class="span12">
        <h2>Lihat Entri (proses)</h2>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Entry <?php echo $entri[0]['nomor']?></h5>
           </div>
          <div class="widget-content">
            <table class="table table-bordered">
                 <tr>
                   <th><b>No.Inventaris :</b></th>
                   <td><?php echo $entri[0]['no_inventaris']; ?></td>
                   <th><b>Cost Center :</b></th>
                   <td colspan="2"><?php echo $entri[0]['cost_center']; ?></td>
                 </tr>
                 <tr>
                   <th><b>Jenis Kendaraan :</b></th>
                   <td><?php echo $entri[0]['jenis_kendaraan']; ?></td>
                   <th><b>User :</b></th>
                   <td colspan="2"><?php echo $entri[0]['nama_user']; ?></td>
                 </tr>
                 <tr>
                   <th><b>Aduan :</b></th>
                   <td colspan="4"><i>"<?php echo $entri[0]['aduan']; ?>"</i></td>
                 </tr>
                 <tr>
                   <th><b>Pekerjaan</b></th>
                   <th><b>Nama Spare Part</b></th>
                   <th><b>Quantity</b></th>
                   <th><b>Satuan</b></th>
                   <th><b>Keterangan</b></th>
                 </tr>
                 <?php $size=sizeof($entri); 
                       for($i=0;$i<$size;$i++){
                 ?>
                 <tr>
                   <td><center><?php echo $entri[$i]["pekerjaan"];?></td>
                   <td><center><?php echo $entri[$i]["nama_spare_part"];?></td>
                   <td><center><?php echo $entri[$i]["quantity"];?></td>
                   <td><center><?php echo $entri[$i]["satuan"];?></td>
                   <td><center><?php echo $entri[$i]["keterangan"];?></td>
                 </tr>
                 <?php } ?>
                 <tr>
                   <th colspan="5"><b>Vendor Perbaikan</b></th>
                 </tr>
                 <tr>
                   <td colspan="5"><center><?php echo $entri[0]['nama_vendor']; ?></center></td>
                 </tr>
             </table>
               <button class="btn btn-warning" id="back" >Kembali</button>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     $("#back").click(function(){
       window.location.href="<?php echo base_url()?>Unit"
     })
  })
</script>