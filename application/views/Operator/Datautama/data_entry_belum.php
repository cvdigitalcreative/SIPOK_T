<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  
   <div class="widget-box" id="tabdata">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li><a data-toggle="tab" href="#" id="aduan">Aduan</a></li>
              <li class="active"><a data-toggle="tab" href="<?php echo base_url();?>Operator/belum" id="belum">Belum</a></li>
              <li><a data-toggle="tab" href="#" id="proses">Diproses</a></li>
              <li><a data-toggle="tab" href="#" id="selesai">Selesai</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">

<!-- TAB 1 -->
<div id="tab1" class="tab-pane active">
    <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
   <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Data Entry</h5>        
          </div>
          <div class="widget-content nopadding">         
            <table id="datatabel" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th title="Sorting"><center>Nomor</center></th>
                  <th><center>Tanggal</th>
                  <th><center>OPK</th>
                 <!--  <th><center>Jenis Kendaraan</th> -->
                  <th><center>No. Inventaris</th>
               <!--    <th><center>No. Polisi</th> -->
                 <!--  <th><center>User</th> -->
                  <th><center>Cost Center</th>
                  <th><center>Nomor Ekstensi</th>
                  <th><center>Pekerjaan</th>
                  <th style="width:50px"><center>Aksi</th>
              </tr>
              </thead>
            <?php
                 $size = sizeof($entri);
            ?>        
            <tbody>
               <?php 
                      
                    $no_inven = " ";
                    for($i=0;$i<$size;$i++){
                            
                            if($no_inven != $entri[$i]["nomor"] ){
                               ?>
                           <tr>
                              <td><center><?php echo $i+1; ?></td>
                               <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                              <td><center><?php echo $strip;?></td>
                              <td><center><?php echo $entri[$i]["nomor"]; ?></td>
                              <td><center><a href="<?php echo base_url();?>Settingdata/dataKendaraan/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]["no_inventaris"];?></a></td>
                           <!--    <td><center><?php echo $entri[$i]["no_polisi"];?></td> -->
                             <!--  <td><center><?php echo $entri[$i]["org_name"];?></td> -->
                              <td><center><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $entri[$i]['cost_center']?>"><?php echo $entri[$i]["cost_center"];?></a></td>
                              <td><center><?php echo $entri[$i]["no_ex"];?></td>
                              <td><?php echo $entri[$i]["pekerjaan"];?></td>
                              <td>
                              <div class="btn-group">
                               <button class="btn btn-primary">Aksi</button>
                               <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                               <ul class="dropdown-menu">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Hapus</a></li>
                                    <li><a href="#">LHPK</a></li>
                               </ul>
                            </div>
                            </td>
                          </tr>
                               <?php 
                               $no_inven = $entri[$i]["nomor"]; 
                            }else{?>
                          <tr>
                              <td><p hidden>lost</p></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>  
                              <td><center><?php echo $entri[$i]["pekerjaan"];?></td>
                              <td></td>
                          </tr>
                            <?php 

                            }
                     } 

                     ?>
               </tbody>

            </table>  
          </div>    
        </div>
        </div>
       </div>
     </div>
  </div>
  <!-- AKHIR TAB 1 -->
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){

    
      $("#proses").click(function(){
          window.location.href = "<?php echo site_url();?>Operator/proses";
      })   
        $("#belum").click(function(){
          window.location.href = "<?php echo site_url();?>Operator/belum";
      }) 
      $("#selesai").click(function(){
          window.location.href = "<?php echo site_url();?>Operator/selesai";
      })  
       $("#aduan").click(function(){
          window.location.href = "<?php echo site_url();?>Operator";
      })  
  });
</script>
<!--end-main-container-part-->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.tables.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script>
