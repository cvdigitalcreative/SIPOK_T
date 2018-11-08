

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
     <!-- CONTENT -->
      <div class="container-fluid">
      <hr>
         <div class="row-fluid">
            <div class="span12">
                   <h4>TUTUP ENTRI '<?php echo $entri[0]['no_inventaris']?>' DENGAN KERUSAKAN '<?php echo $entri[0]['kerusakan']?>'</h4>
                    <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                         <h5>Form Entry</h5>
                   </div>
                    <div class="widget-content nopadding">
                      <form id="formentry" class="form-horizontal">
                      <div class="control-group">
                         <label class="control-label">Nama Spare Part :</label>
                           <div class="controls">
                               <input type="text"  id="nama_spare_part" class="span11" placeholder="Masukkan Nama Spare Part" />
                          </div>
                      </div>
                       <div class="control-group">
                         <label class="control-label">Harga Satuan :</label>
                           <div class="controls">
                               <input type="text"  id="harga_satuan" class="span11" placeholder="Masukkan Harga Satuan" />
                          </div>
                      </div>
                       <div class="control-group">
                         <label class="control-label">Jumlah Spare Part  :</label>
                           <div class="controls">
                               <input type="text"  id="jumlah" class="span11" placeholder="Masukkan Satuan Spare Part" />
                          </div>
                      </div>
                        <div class="form-actions">      
                          <button type="button" class="btn btn-success" id="tambah">Tambah</button>
                        </div> 
                      </form>
                    </div>
                    </div>

                     <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                         <h5>Data Kerusakan</h5>
                   </div>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered" >
                        <thead>
                          <th>Kerusakan</th>
                          <th>Nama Spare Part</th>
                          <th>Harga Satuan</th>
                          <th>Jumlah</th>
                          <th>Biaya</th>
                          <th>Aksi</th>
                        </thead>
                        <tbody>
                          <tr>
                           <?php $size = sizeof($perbaikan);  ?>
                           <td rowspan="<?php echo $size+1; ?>"><?php echo $entri[0]["kerusakan"]; ?></td>
                            <?php 
                                 if($size > 0){
                                    if($size == 1){
                                       ?>
                                             <td><?php echo $perbaikan[0]["nama_spare_part"]?></td>
                                             <td><?php echo $perbaikan[0]["biaya_satuan"]?></td>
                                             <td><?php echo $perbaikan[0]["satuan"]?></td>
                                             <td><?php echo $perbaikan[0]["biaya_total"]?></td>
                                             <td><a href="<?php echo base_url(); ?>Dataentry/hapusPerbaikan/<?php echo $perbaikan[0]['id_perbaikan']?>/<?php echo $perbaikan[0]['id_entri']?>">Hapus</a></td>
                                             </tr>             
                                       <?php 
                                    }
                                    else{
                                        
                                        for($i=0;$i<$size;$i++){
                                     
                                      ?>     
                                             <tr>
                                                 <td><?php echo $perbaikan[$i]["nama_spare_part"]?></td>
                                                 <td><?php echo $perbaikan[$i]["biaya_satuan"]?></td>
                                                 <td><?php echo $perbaikan[$i]["satuan"]?></td>
                                                 <td><?php echo $perbaikan[$i]["biaya_total"]?></td>
                                                 <td><a href="<?php echo base_url(); ?>Dataentry/hapusPerbaikan/<?php echo $perbaikan[$i]['id_perbaikan']?>/<?php echo $perbaikan[$i]['id_entri']?>">Hapus</a></td>
                                             </tr>              
                                      <?php
                                      } 
                                    }
                                 }
                                 else{
                                  ?>
                                  
                                  <?php 
                                 }
                            ?>
                        </tbody>
                      </table>   
                     
                    </div>
                    <div class="form-actions">      
                          <button type="button" class="btn btn-primary" id="tutup">Selesai</button>
                        </div> 
                    </div>
                   
               </div>
            </div>
          </div>
       </div>
     <!-- CONTENT -->
 </div>
 <script type="text/javascript">
     $(document).ready(function(){
        
 
        $("#tambah").click(function(){
               var valid = 0;

               var nama_spare_part = $("#nama_spare_part").val();
               var harga_satuan = $("#harga_satuan").val();
               var jumlah = $("#jumlah").val();
               
               if(nama_spare_part.length != 0 && harga_satuan.length != 0 && jumlah.length != 0){
                  valid++;
               }

               if(valid == 1){
                    biaya = harga_satuan * jumlah;

                    $.post("<?php echo base_url();?>Dataentry/tutupConfirm/<?php echo $entri[0]['nomor']?>/tambah",{nama_spare_part:nama_spare_part,harga_satuan:harga_satuan,jumlah:jumlah,biaya:biaya},
                      function(data){
                        if(data == 1){
                            location.reload();
                        }
                      });
               }
               else{
                  alert("data belum lengkap");
               }
        })

        $("#tutup").click(function(){
           var size = <?php echo $size; ?>;
            if(size > 0){
               window.location.href="<?php echo base_url();?>Dataentry/gantiStatus/2/<?php echo $entri[0]['nomor']?>";
            }
            else{
              alert("Data Belum Lengkap");
            }           
        })
     })
 </script>