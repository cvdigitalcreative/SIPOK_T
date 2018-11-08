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
             <div id="addnotif" class="alert alert-info alert-block" hidden> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Ada Entri Yang Telah Selesai!</h4>
                Ada entri yang telah diselesaikan , silahkan lihat di daftar <a href="<?php echo base_url()?>Unit/5">entri selesai</a>
              </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Inventaris Saya</h5>
           </div>
          <div class="widget-content">
             <table class="table table-bordered data-table">
               <thead>
                <th>Nomor Inventaris</th>
                <th>Jenis Kendaraan</th>
                <th>Tahun</th>
                <th>No Polisi</th>
                <th>No Rangka</th>
                <th>No Mesin</th>
               </thead>
               <tbody>
                 <?php $size = sizeof($kendaraan);
                   for($i=0;$i<$size;$i++){
                 ?>
                  <tr>
                    <td><center><a href="<?php echo base_url();?>DataentryUser/riwayat/<?php echo $kendaraan[$i]["no_inventaris"];?>"><?php echo $kendaraan[$i]['no_inventaris']; ?></a></td>
                    <td><center><?php echo $kendaraan[$i]['jenis_kendaraan']; ?></td>
                    <td><center><?php echo $kendaraan[$i]['tahun']; ?></td>
                    <td><center><?php echo $kendaraan[$i]['no_polisi']; ?></td>
                    <td><center><?php echo $kendaraan[$i]['no_rangka']; ?></td>
                    <td><center><?php echo $kendaraan[$i]['no_mesin']; ?></td>
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
<script type="text/javascript">
  $(document).ready(function(){
     <?php  
        if($this->session->tempdata('notif') != NULL)
        {
            $this->session->unset_tempdata('notif');
        ?>
            $("#addnotif").fadeIn(1000);
        <?php 
          }
        else{
        ?>
            $("#addnotif").hide();
        <?php 
           }
        ?>    
  })
</script>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.tables.js"></script>