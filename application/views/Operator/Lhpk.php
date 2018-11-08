
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <center><h2>Cetak LHPK...</h2></center>
     <div class="row-fluid">
      <div class="span9">

        <div class="widget-box" style="margin-left: 260px">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data LHPK</h5>
          </div>
          <div class="widget-content">
          <?php if(sizeof($entri) > 0){?>
              <form id="formentry" class="form-horizontal">
                 
                  <div class="control-group">
                    <label class="control-label">Superintendent Pelayanan  </label>
                     <div class="controls">
                       <input type="text"   id="SP" class="span8" placeholder="Masukkan Superintendent Pelayanan RT" />
                    </div>             
                 </div>

                 <div class="control-group">
                    <label class="control-label">Nomor Badge Superintendent Pelayanan  </label>
                     <div class="controls">
                       <input type="text"   id="Badge_SP" class="span8" placeholder="Masukkan Nomor Badge Superintendent Pelayanan RT" />
                    </div>             
                 </div>

                 <div class="control-group">
                    <label class="control-label">Kasi Transport  </label>
                     <div class="controls">
                       <input type="text"   id="KT" class="span8" placeholder="Masukkan Kasi Transport" />
                    </div>             
                 </div>

                   <div class="control-group">
                    <label class="control-label">Nomor Badge Kasi Transport  </label>
                     <div class="controls">
                       <input type="text"   id="Badge_KT" class="span8" placeholder="Masukkan Nomor Badge Kasi Transport" />
                    </div>             
                 </div><br>
                 <button class="btn btn-primary" id="cetak">Cetak</button>
                 <input type="reset" class="btn btn-warning" name="">
                <!--   <a style="margin-left: 364px;" href="<?php echo base_url();?>Dataentry/kerjakanAduan/<?php echo $entri[0]['nomor']?>">Kembali</a> -->
              </form>
              <?php }else{?>
                   <h4>Maaf , Record Tidak Ditemukan... :(</h4>
              <?php }?>


          </div>
          </div>
          </div>
          </div>
  </div>
 </div>
<!--End-breadcrumbs-->
   
      <div id="spk" hidden>
      <center>
         <img src="<?php echo base_url();?>img/kop.jpg" alt="Smiley face" ></center>
         <h3><center>LAPORAN HASIL PEMERIKSAAN KERUSAKAN (LHPK)</center></h3>
         <h4><center>SEKSI TRANSPORT</center></h4>
         
         <center>
             <table width="600px">
               <tr>
                 <td>User</td>
                 <td>:</td>
                 <td><u><?php echo $entri[0]['nama_user']; ?></u></td>
               </tr>
               <tr>
                 <td>No. Polisi</td>
                 <td>:</td>
                 <td><u><?php echo $entri[0]['no_polisi']; ?></u></td>
               </tr>
               <tr>
                 <td>Jenis Kendaraan</td>
                 <td>:</td>
                 <td><u><?php echo $entri[0]['jenis_kendaraan']; ?></u></td>
               </tr>
               <tr>
                 <td>Cost Centre</td>
                 <td>:</td>
                 <td><u><?php echo $entri[0]['cost_center']; ?></u></td>
               </tr>
             </table>
             <br>
             <br>
             <table border="1" cellpadding="10" width="800">
               <tr>
                 <td rowspan="2"><b><center>NO</b></td>
                 <td rowspan="2"><b><center>URAIAN PEKERJAAN</b></td>
                 <td colspan="2"><b><center>VOLUME</b></td>
                 <td rowspan="2"><b><center>KETERANGAN</b></td>
               </tr>
               <tr>               
                 <td><b><center>QTY</b></td>
                 <td><b><center>SAT</b></td>
               </tr>
               <?php $size = sizeof($entri); 
                 for($i=0;$i<$size;$i++){
               ?>
               <tr>
                 <td><center><?php echo $i+1;?></td>
                 <td><center><?php echo $entri[$i]['pekerjaan']; ?></td>
                 <td><center><?php echo $entri[$i]['quantity']; ?></td>
                 <td><center><?php echo $entri[$i]['satuan']; ?></td>
                 <td><center><?php echo $entri[$i]['keterangan']; ?></td>
               </tr>
               <?php } ?>
             </table>
             <br><br>
             <table cellpadding="2"  width="800">
               <tr>
                 <td><center>Menyetujui</td>
                 <td><center>Diperiksa Oleh : </td>
                 <td><center>User</td>
               </tr>
               <tr>
                 <td><center>Superintendent Pelayanan & RT</td>
                 <td><center>Kasi Transport</td>
                 <td></td>
               </tr>
               <tr>
                 <td height="70"></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <td><center><div id="nama_SP"></div></td>
                 <td><center><div id="nama_KT"></div></td>
                 <td><center>__________________</td>
               </tr>
               <tr>
                 <td><center><div id="badge_SP_form"></div></td>
                 <td><center><div id="badge_KT_form"></div></td>
                 <td><center>Badge No. </td>
               </tr>
             </table>
    <br><br>
             <div style="margin-left: 550px;">
                <p>Palembang, <br> &nbsp;&nbsp;&nbsp;&nbsp;Rekanan</p>
                <br>
                <br>
                <br>
                 __________________
             </div>
         </center>

        
       
      </div>



<script type="text/javascript">
	$(document).ready(function(){
  
      $("#cetak").click(function(){
          SP = $("#SP").val();
          Badge_SP = $("#Badge_SP").val();
          KT = $("#KT").val();
          Badge_KT = $("#Badge_KT").val();

          $("#badge_SP_form").text("Badge No."+Badge_SP);
          $("#nama_SP").text(SP);
          $("#nama_KT").text(KT);
          $("#badge_KT_form").text("Badge No."+Badge_KT);

          w=window.open();
          w.document.write($('#spk').html());
          w.print();
          w.close();
      })


     
         

	})
</script>