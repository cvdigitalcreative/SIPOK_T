
<?php   $data= array(); 
        $sizet = sizeof($tahun);
       ?>
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
              <li><a data-toggle="tab" href="#" id="proses">Proses</a></li>
              <li class="active"><a data-toggle="tab" href="#" id="selesai">Selesai</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">

<!-- TAB 1 -->
<div id="tab1" class="tab-pane active">
    <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
           <select id="tahun">
          <?php 
            for($i=0;$i<$sizet;$i++){
              if($tahun[$i]['tahun'] == $tahun_filter){
               ?>
              <option value="<?php echo $tahun[$i]['tahun']; ?>" selected><?php echo $tahun[$i]['tahun']; ?></option>
               <?php
              }else{?>
               <option value="<?php echo $tahun[$i]['tahun']; ?>"><?php echo $tahun[$i]['tahun']; ?></option>    
             <?php
                }
            } ?>
          </select>
   <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Data Entry</h5>        
          </div>
          <div class="widget-content nopadding">         
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th title="Sorting"><center>Nomor</center></th>
                  <th><center>Tanggal</th>
                  <th><center>OPK</th>
                  <th><center>No. Inventaris</th>
                  <th><center>User</th>
                  <th><center>Cost Center</th>
                  <th><center>Nomor Ekstensi</th>
                  <th><center>Pekerjaan</th>
                </tr>
              </thead>
               <?php
                 $size = sizeof($entri);
              ?>       
              <tbody>
                  <?php             
                    $no_inven = " ";
                    for($i=0;$i<$size;$i++){
                            ?>     
                      <tr>
                              <td style="text-align: center;"><?php echo $i+1; ?>
                              </td>
                               <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                              <td><center><?php echo $strip;?></td>
                              <td style="width:70px"><center><a id="nomor<?php echo $i; ?>" style="cursor: pointer"><?php echo $entri[$i]["nomor"]; ?></a>
                                  <div id="show<?php echo $i; ?>" hidden>
                                  <a href="<?php echo base_url()?>Dataentry/unduhFile/<?php echo $entri[$i]['nomor']?>"><button class="btn btn-mini btn-inverse">Unduh File</button></a>
                               </div>
                              </td>
                              <td><center><a href="<?php echo base_url();?>Dataentry/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]["no_inventaris"];?></a>
                              </td>
                                <?php array_push($data,$entri[$i]['nomor']); ?>
                              <td><center><?php echo $entri[$i]["nama_user"]; ?></td>
                              <td><center><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $entri[$i]['cost_center']?>"><?php echo $entri[$i]["cost_center"];?></a></td>
                              <td><center><?php echo $entri[$i]["no_ex"];?></td>
                              <td><?php echo $entri[$i]["pekerjaan"];?></td>
                          
                          </tr>

                  <?php 
                     } 
                     $data = json_encode($data);
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
      
      size = <?php echo $size; ?>;
      arrEntri = <?php echo $data; ?>;
      
       for(let i = 0; i < size; i++) {
        $("#show"+i).hide();
        $('#nomor' + i).click( function(){
          $("#show"+i).toggle(500);
           
        });
      }

      $("#tahun").change(function(){
         var tahun = $("#tahun").val();
         window.location.href = "<?php echo site_url();?>Dataentry/selesai/"+tahun;
      })

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
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script>

