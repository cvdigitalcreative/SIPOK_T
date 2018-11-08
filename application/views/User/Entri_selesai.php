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
        <h2>Entri Selesai</h2>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Entri Selesai</h5>
           </div>
          <div class="widget-content">
            <table class="table table-bordered data-table">
               <thead>
                  <th style="width:20px">No</th>
                  <th>Tanggal</th>
                  <th>OPK</th>
                  <th>Inventaris</th>
                  <th>Jenis Kendaraan</th>
                  <th>Aduan</th>
                  
               </thead>
               <tbody>
                  <?php $size = sizeof($entri);
                        for($i=0;$i<$size;$i++){
                  ?>
                      <tr>
                         <td style="text-align: center;"><?php echo $i+1; ?></td>
                         <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?>
                         <td><center><?php echo $strip; ?></td> 
                         <td><center><?php echo $entri[$i]['nomor']; ?></td>
                         <td><center><a href="<?php echo base_url();?>DataentryUser/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]['no_inventaris']; ?></a></td>
                         <td><center><?php echo $entri[$i]['jenis_kendaraan']; ?></td>
                         <td><center><?php echo $entri[$i]['aduan']; ?></td>
                         <?php 
                               if($entri[$i]['id_status'] == 0){
                            ?>
                                 <td><center><p style="color:red">Aduan</p></td>
                                 <td><center><a href="<?php echo base_url();?>DataentryUser/editAduan/<?php echo $entri[$i]['nomor']?>"><button class="btn btn-primary">Edit</button></a><button class="btn btn-danger">Hapus</button></center></td>
                          <?php 
                               }elseif($entri[$i]['id_status'] == 1){
                          ?>
                                <td><center><p style="color:green">Proses</p></td>
                                <td><center><button class="btn btn-warning">Lihat</button></td>
                          <?php 
                               }
                         ?>
                      </tr>
                  <?php } ?>
               </tbody>
            </table>
          </div>
         </div>
       </div>
     </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.tables.js"></script>