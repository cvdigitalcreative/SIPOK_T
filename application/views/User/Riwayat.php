<?php 
    $sizet = sizeof($tahun);
?>
<style type="text/css">
  #kartu.scroll {
    width: 1070px;
    height: 1000px;
    overflow: scroll;

}
</style>
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url()?>Unit" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    
 <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Riwayat Kendaraan</code></h5>

          </div>
          <div class="widget-content"> 
          <button class="btn btn-success" id="cetak">cetak</button>
           <select style="margin-top: 12px;" id="tahun">
              <option value="semua" >semua tahun</option>
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
          <input type="number" name="" placeholder="Bulan" id="bulan" value="<?php echo $bulan_filter; ?>" style="margin-top: 12px;width:100px;">
                <div id="kartu" class="scroll">
       <?php 
             $size = sizeof($entri);
             // var_dump($entri);
             if($size > 0){
       ?>

              <h2>KARTU RIWAYAT KENDARAAN POOL TRANSPORT</h2>
            <table cellpadding="2">
              <tr>
                <td>Jenis Mobil</td>
                <td>:</td>
                <td><?php echo $entri[0]["jenis_kendaraan"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Rangka</td>
                <td>:</td>
                <td><?php echo $entri[0]["no_rangka"]; ?></td>
              </tr>
              <tr>
                <td>Nomor Polisi</td>
                <td>:</td>
                <td><?php echo $entri[0]["no_polisi"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Nomor Mesin</td>
                <td>:</td>
                <td><?php echo $entri[0]["no_mesin"]; ?></td>
              </tr>
              <tr>
                <td>Nomor Inventaris</td>
                <td>:</td>
                <td><?php echo $entri[0]["no_inventaris"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Cost Center</td>
                <td>:</td>
                <td><?php echo $entri[0]["cost_center"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>telp</td>
                <td>:</td>
                <td><?php echo $entri[0]["no_ex"]; ?></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table>
            <br>
            <br>
            <table class="table table-bordered" border="1"  cellpadding="3">
               <thead>
                <th>Nomor</th>
                <th>TANGGAL</th>
                <th>No.Opk</th>
                <th>JENIS KERUSAKAN</th>
                <th>NAMA SPARE PART</th>
                <th>BIAYA TOTAL OPK</th>
                <th>PLEANER</th>
               </thead>
               <tbody>
               <?php 
                      
                       $nomor = "";
                       $span = 0;
                       $no = 1;
                    for($i=0;$i<$size;$i++){
                            
                            if($nomor != $entri[$i]["nomor"] ){
                               ?>
                               <tr>
                                 <td><center><?php echo $no; ?></td>
                             <?php $createDate = new DateTime( $entri[$i]['tanggal']); 
                                  $strip = $createDate->format('d-m-Y');
                                ?> 
                                 <td><center><?php echo $strip; ?></td>
                                 <td><center><?php echo $entri[$i]["nomor"]; ?></td>
                                 <td><?php echo $entri[$i]["pekerjaan"]; ?></td>
                                 <td><center><?php echo $entri[$i]["nama_spare_part"]; ?></td>
                                 <?php  
                                    $number_format = "Rp ".number_format($entri[$i]["biaya_total"],0,".",".");
                                ?>
                                 <td><center><?php echo $number_format; ?></td>
                                 <td><center><?php echo $entri[$i]["nama_vendor"]; ?></td>
                              </tr>
                               <?php
                               $span = 1;
                               $nomor = $entri[$i]["nomor"]; 
                                 $no++;
                            }else{?>
                           <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $entri[$i]["pekerjaan"]; ?></td>
                            <td><center><?php echo $entri[$i]["nama_spare_part"]; ?></td>
                            <td></td>
                            <td></td>
                          </tr>
                            <?php 
                            }

                     } 

                     ?>
               </tbody>
            </table>
            </div>
     

      <?php 
              }
              else{
       ?>
            <h2>Maaf Record Belum Ada :)</h2>
       <?php 

             }
       ?>

          </div>
        </div>
        </div>
        </div>
        </div>
        </div>

    <div>            
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     $("#tahun").change(function(){
         kirimFilterRiwayat($(this).val(),$("#bulan").val());
     })

     $("#bulan").change(function(){
       kirimFilterRiwayat($("#tahun").val(),$(this).val());
     })

     function kirimFilterRiwayat(tahun,bulan){
       if(bulan == 0){
          bulan = "";
       }
      
      if(tahun=="semua"){
           tahun = "";
           bulan = "";
       }
       window.location.href="<?php echo base_url();?>DataentryUser/riwayat/<?php echo $inven?>/"+tahun+"/"+bulan;
     }

     $("#cetak").click(function(){
            w=window.open();
            w.document.write($('#kartu').html());
            w.print();
            w.close();

     });
  })
</script>