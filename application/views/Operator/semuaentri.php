<?php  $size = sizeof($entri); 
?>


<div id="content">
  <div id="content-header">
    <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
    <h1>Agenda</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
         <?php if($waktu1 == "" && $waktu2 == ""){?>
           <input type="date" id="awal" > s.d. <input type="date" id="sampe"> 
         <?php
          }else{?>
             <input type="date" id="awal" value="<?php echo $waktu1?>"> s.d. <input type="date" id="sampe" value="<?php echo $waktu2?>"> 
          <?php 
            
            }?>
         <button style="margin-top: -10px;
    margin-left: 10px;" id="cari" class="btn btn-danger">cari</button><button style="margin-top: -10px;
    margin-left: 10px;" id="refresh" class="btn btn-warning">refresh table</button>
        <div class="widget-box">
       
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>E-book Agenda</h5>
          </div>
          <div class="widget-content">
              <table class="table table-bordered data-table">
                <thead>
                   <!-- <th>Nomor</th> -->
                   <th>Nomor</th>
                   <th style="    width: 50px;">Tanggal</th>
                   <th>OPK</th>
                   <th>Inventaris</th>
                   <th>Cost Center</th>
                   <th>User</th>
                   <th>Vendor</th>
                   <th style=" width:50px">Ext</th>
                   <th>Pekerjaan</th>
                 
                </thead>
                <tbody>
                    <?php 
                       for($i=0;$i<$size;$i++){
                    ?>
                      <tr>
                         <td style="text-align: center;"><?php echo $i+1;?></td>
                          <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                          ?> 
                         <!--  <td><center><?php echo $i+1; ?></td>  -->
                         <td><center><?php echo $strip; ?></td>
                         <td><center><?php echo $entri[$i]['nomor']; ?></td>
                         <td><center><a href="<?php echo base_url();?>Dataentry/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]['no_inventaris']; ?></a></td>
                        
                         <td><center><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $entri[$i]['cost_center']?>"><?php echo $entri[$i]['cost_center']; ?></a></td>
                         <td><center><?php echo $entri[$i]['nama_user']; ?></td>
                         <td><center><?php echo $entri[$i]['nama_vendor']; ?></center></td>
                         <td><center><?php echo $entri[$i]['no_ex']; ?></center></td>
                         <td><?php echo $entri[$i]['pekerjaan']; ?></td>
                       
                      </tr>
                    <?php } ?> 
                </tbody>
              </table>
          </div>
          <button id="cetak" class="btn btn-success">cetak</button>
        </div>

          <div class="widget-box" hidden>      
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Contoh</h5>
          </div>
          <div class="widget-content">
          <div id="agenda">
             <h2>Buku Agenda</h2>
              <?php 
                   if($waktu1 != '' && $waktu2 != ""){
                     $createDate1 = new DateTime( $waktu1); 
                          $strip1 = $createDate1->format('d-m-Y');

                     $createDate2 = new DateTime( $waktu2); 
                          $strip2 = $createDate2->format('d-m-Y');
              ?>
                  <h4>Waktu : <?php echo $strip1;?> sampai <?php echo $strip2;?></h4>
              <?php
                   }
                   else{?>
                 <h4>Semua Waktu</h4>
              <?php 
                   }
              ?>
             <table border="2" cellpadding="12">
               <tr>
                 <th>Tanggal</th>
                 <th>OPK</th>
                 <th>Jenis Kendaraan</th>
                 <th>No. Inventaris</th>
                 <th>No. Polisi</th>
                 <th>User</th>
                 <th>Cost Center</th>
                 <th>Vendor</th>
                 <th>No.Ext</th>
                 <th>pekerjaan</th>
               
               </tr>
               <?php 
                  for($i=0;$i<$size;$i++){
               ?>
               <tr>
                  <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                  ?> 
                 <td width="65"><?php echo $strip; ?></td>
                 <td><center><?php echo $entri[$i]['nomor']; ?></td>
                 <td><center><?php echo $entri[$i]['jenis_kendaraan']; ?></td>
                 <td><center><?php echo $entri[$i]['no_inventaris']; ?></td>
                 <td width="65"><center><?php echo $entri[$i]['no_polisi']; ?></td>
                 <td><center><?php echo $entri[$i]['nama_user']; ?></td>
                 <td><center><?php echo $entri[$i]['cost_center']; ?></td>
                 <td><center><?php echo $entri[$i]['nama_vendor']; ?></td>
                 <td><center><?php echo $entri[$i]['no_ex']; ?></td>
                 <td ><?php echo $entri[$i]['pekerjaan']; ?></td>
                      
               </tr>
               <?php } ?>
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
      $("#cari").click(function(){
          var awal = $("#awal").val();
          var akhir = $("#sampe").val();

          if(awal == "" || akhir == ""){
               alert("waktu harus lengkap untuk mencari jarak kedua waktu");
          }
          else{
                 window.location.href="<?php echo base_url()?>Dataentry/allEntri/"+awal+"/"+akhir;
          }
      })

      $("#cetak").click(function(){
          var awal = $("#awal").val();
          var akhir = $("#sampe").val();

          if(awal == "" && akhir == ""){
             var r = confirm("Cetak Seluruh Agenda Tanpa Melakukan Filter?...");
             if (r == true) {
                   w=window.open();
                   w.document.write($('#agenda').html());
                   w.print();
                   w.close(); 
             } else {
                 
             }

          }else{
                   w=window.open();
                   w.document.write($('#agenda').html());
                   w.print();
                   w.close(); 
          }          
      })

      $("#refresh").click(function(){
           window.location.href="<?php echo base_url()?>Dataentry/allEntri/";
      })

    
    
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

<!-- Include Required Prerequisites -->


