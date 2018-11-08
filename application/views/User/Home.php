
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
   <div class="container-fluid">
    <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="<?php echo base_url()?>Unit/5"> <i class="icon-thumbs-up"></i> Entri Selesai</a></li>
        <li class="bg_lg span3"> <a href="<?php echo base_url()?>Unit/2"> <i class="icon-envelope"></i>Form Entri Aduan</a> </li>
        <li class="bg_ly"> <a href="<?php echo base_url()?>Unit/3"> <i class="icon-inbox"></i>Data Inventaris</a> </li>
        <li class="bg_lo"> <a href="<?php echo base_url()?>Unit/4"> <i class="icon-group"></i>Data Cost Center</a> </li>
      </ul>
    </div>
    <hr>
    <!-- ENTRI SAYA -->
    <div class="row-fluid">
      <div class="span12">
             
             <div  id="addnotif" class="alert alert-info alert-block" hidden> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Ada Entri Yang Telah Selesai!</h4>
                Ada entri yang telah diselesaikan , silahkan lihat di daftar <a href="<?php echo base_url()?>Unit/5">entri selesai</a>
              </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Entry Saya</h5>
    <!--         <?php var_dump($entri); ?> -->
          </div>
          <div class="widget-content"> 
            <table class="table table-bordered data-table">
               <thead>
                  <th style="width:20px">No</th>
                  <th>OPK</th>
                  <th>Inventaris</th>
                  <th>Jenis Kendaraan</th>
                  <th>Aduan</th>
                  <th>No Ekstensi</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </thead>
               <tbody>
                  <?php $size = sizeof($entri);
                        for($i=0;$i<$size;$i++){
                  ?>
                      <tr>
                          <td style="text-align: center;"><?php echo $i+1; ?></td>
                         <td><center><?php echo $entri[$i]['nomor']; ?></td>
                         <td><center><a href="<?php echo base_url();?>DataentryUser/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]['no_inventaris']; ?></a></td>
                         <td><center><?php echo $entri[$i]['jenis_kendaraan']; ?></td>
                         <td><center><?php echo $entri[$i]['aduan']; ?></td>
                         <td><center><?php echo $entri[$i]['no_ex']; ?></center></td>
                         <?php 
                               if($entri[$i]['id_status'] == 0){
                            ?>
                                 <td><center><p style="color:red">Aduan</p></td>
                                 <td><center><a href="<?php echo base_url();?>DataentryUser/editAduan/<?php echo $entri[$i]['nomor']?>"><button class="btn btn-primary">Edit</button></a><a href="<?php echo base_url();?>DataentryUser/hapusAduan/<?php echo $entri[$i]['nomor']?>"><button class="btn btn-danger">Hapus</button></a></center></td>
                          <?php 
                               }elseif($entri[$i]['id_status'] == 1){
                          ?>
                                <td><center><p style="color:green">Proses</p></td>
                                <td><center><a <a href="<?php echo base_url();?>DataentryUser/lihatDataProses/<?php echo $entri[$i]['nomor']?>"><button class="btn btn-warning">Lihat</button></a></td>
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