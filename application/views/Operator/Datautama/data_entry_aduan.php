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
              <li class="active"><a data-toggle="tab" href="#tab1"  id="aduan">Aduan</a></li>
              <li ><a data-toggle="tab" href="#tab2"  id="proses">Proses</a></li>
              <li><a data-toggle="tab" href="#tab3" id="selesai">Selesai</a></li>
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
                  <th title="Sorting"><center>Nomor</th>
                  <th><center>OPK</th>
                  <th><center>No. Inventaris</th>
                  <th><center>Cost Center</th>
                 <th><center>User</th> 
                  <th><center>No. Ekstensi</th>
                  <th><center>Aduan</th>
                  <th><center>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                       $size = sizeof($entri);
                       for($i=0;$i<$size;$i++){
                ?> 
                  <tr>
                     <td style="text-align: center;"><?php echo $i+1; ?></td>
                     <td><center><?php echo $entri[$i]["nomor"];?></td>
                     <td><center><a href="<?php echo base_url();?>Dataentry/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]["no_inventaris"];?></a></td>
                     <td><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $entri[$i]['cost_center']?>"><?php echo $entri[$i]["cost_center"]; ?></a></td>
                    <td><?php echo $entri[$i]["nama_user"]; ?></td> 
                     <td><center><?php echo $entri[$i]["no_ex"]; ?></td>
                     <td><?php echo $entri[$i]["aduan"];?></td>
                     <td><center><a href="<?php echo base_url();?>Dataentry/kerjakanAduan/<?php echo $entri[$i]["nomor"];?>"><button class="btn btn-primary">kerjakan</button></a></td>
                  </tr>
                <?php 

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
      $("#selesai").click(function(){
          window.location.href = "<?php echo site_url();?>Dataentry/selesai";
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
