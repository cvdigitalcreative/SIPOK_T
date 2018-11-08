<?php
      $size = sizeof($entri);
?>    
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url()?>Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
   <div class="container-fluid">
    <div class="container-fluid">
     <?php if($size > 0){ ?>
        <h3>Entri untuk Vendor <?php echo $entri[0]['nama_vendor']; ?></h3>
     <?php 
     }
     else{ ?>
        <h3>Tidak ditemukan entri untuk vendor ini</h3>
     <?php

     }
     ?>
    <div class="quick-actions_homepage">
    </div>
    <hr>
    <!-- ENTRI SAYA -->
    <div class="row-fluid">
      <div class="span12">
        <link rel="stylesheet" href="<?php echo base_url()?>css/uniform.css" />
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data Entry</h5><br>
          </div>
          <div class="widget-content"> 
      
             <table class="table table-bordered  data-table">
                <thead>

                   <th>Nomor</th>
                   <th>Tanggal</th>
                   <th>OPK</th>
                   <th>No Inventaris</th>
                   <th>User</th>
                   <th>Cost Center</th>
                   <th>No. Ext</th>
                   <th>Pekerjaan</th>
                   <th>cek</th>
                </thead>
                <tbody>
                  <?php             
                    for($i=0;$i<$size;$i++){
                            ?>     
                      <tr id="baris<?php echo $i; ?>">
                              <td style="text-align: center;"><?php echo $i+1; ?>
                              </td>
                               <?php $createDate = new DateTime($entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                              <td><center><?php echo $strip;?></td>
                              <td id="<?php echo $entri[$i]["nomor"]; ?>"><center><?php echo $entri[$i]["nomor"]; ?></td>
                              <td><center><a href="<?php echo base_url();?>Dataentry/riwayat/<?php echo $entri[$i]["no_inventaris"];?>"><?php echo $entri[$i]["no_inventaris"];?></a></td>
                              <td><center><?php echo $entri[$i]["nama_user"]; ?></td>
                              <td><center><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $entri[$i]['cost_center']?>"><?php echo $entri[$i]["cost_center"];?></a></td>
                              <td><center><?php echo $entri[$i]["no_ex"];?></td>
                              <td><?php echo $entri[$i]["pekerjaan"];?></td>
                              <?php 
                                 $enum = 0;
                                 for($j=0;$j<sizeof($tagihan);$j++){
                                    if($entri[$i]['nomor'] == $tagihan[$j]['id_entri']){
                                    $enum++;
                                    ?>
                                       <td style="background-color: yellow;"><center><input type="checkbox"  id="nomor<?php echo $i;?>" value="<?php echo $entri[$i]['nomor'] ?>" style="opacity: 10;"></td>
                                    <?php 
                                    }                            
                                 }

                                 if($enum == 0){
                                 ?>
                                    <td><center><input type="checkbox"  id="nomor<?php echo $i;?>" value="<?php echo $entri[$i]['nomor'] ?>" style="opacity: 10;"></td>
                                 <?php
                                 }                               
                              ?>                       
                          </tr>
                  <?php 
                     } 
                  ?>            
                </tbody>
              </table>
                  <input id="nomorsurat" type="text" name="" style="margin-top: 10px;" placeholder="Masukkan Nomor Surat">
               <button class="btn btn-warning" id="tagihan" >Tambahkan Ke Tagihan</button>
               </div>
          </div>
        </div>
     </div>
    </div>
  </div>
 </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
       $("#tagihan").click(function(){
          size = "<?php echo $size?>";
          var opk = [];
          for(let i=0;i<size;i++){
            if ($('#nomor'+i).is(":checked"))
            {
               opk.push($("#nomor"+i).val());
            }
          }

          if(opk.length == 0){
             alert("Anda belum mencentang entri manapun untuk membuat nota");
          }
          else{
                
                if($("#nomorsurat").val() != ""){
                    opk.push($("#nomorsurat").val());
                    
                    var dataString = JSON.stringify(opk);
                    $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Dataentry/buatNota/",
                                data  : {myData : dataString},
                              success : function(data){
                                 if(data == 1){
                                    <?php $this->session->set_tempdata("notif","berhasil"); ?>
                                    window.location.href="<?php echo base_url()?>Dataentry/agendatagihan";
                                 }  
                                 else{
                                   alert(data);
                                 }                                                         
                              },
                         beforeSubmit : function(data){},    
                                error : function (request) {}
                    })
                }
                else{
                   alert("nomor surat harus diisi");
                }
                  
              
              function toRp(angka){
                  var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
                  var rev2    = '';
                   for(var i = 0; i < rev.length; i++){
                      rev2  += rev[i];
                      if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                       rev2 += '.';
                      }
                   }
                    return 'Rp.' + rev2.split('').reverse().join('') + ',00';
            }
          }
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
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script>
