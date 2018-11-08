<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Tutup Entri</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- DEKSRIPSI SINGKAT DATA ENTRI STATUS PROSES -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data Entri</h5>
          </div>
          <div class="widget-content">
             <table class="table table-bordered">
                 <tr>
                   <th><b>No.Inventaris :</b></th>
                   <td><?php echo $entri[0]['no_inventaris']; ?></td>
                   <th><b>Cost Center :</b></th>
                   <td colspan="2"><?php echo $entri[0]['cost_center']; ?></td>
                 </tr>
                 <tr>
                   <th><b>Jenis Kendaraan :</b></th>
                   <td><?php echo $entri[0]['jenis_kendaraan']; ?></td>
                   <th><b>User :</b></th>
                   <td colspan="2"><?php echo $entri[0]['nama_user']; ?></td>
                 </tr>
                 <tr>
                   <th><b>Aduan :</b></th>
                   <td colspan="4"><i>"<?php echo $entri[0]['aduan']; ?>"</i></td>
                 </tr>
                 <tr>
                   <th><b>Pekerjaan</b></th>
                   <th><b>Nama Spare Part</b></th>
                   <th><b>Quantity</b></th>
                   <th><b>Satuan</b></th>
                   <th><b>Keterangan</b></th>
                 </tr>
                 <?php $size=sizeof($entri); 
                       for($i=0;$i<$size;$i++){
                 ?>
                 <tr>
                   <td><center><?php echo $entri[$i]["pekerjaan"];?></td>
                   <td><center><?php echo $entri[$i]["nama_spare_part"];?></td>
                   <td><center><?php echo $entri[$i]["quantity"];?></td>
                   <td><center><?php echo $entri[$i]["satuan"];?></td>
                   <td><center><?php echo $entri[$i]["keterangan"];?></td>
                 </tr>
                 <?php } ?>
                 <tr>
                   <th colspan="5"><b>Vendor Perbaikan</b></th>
                 </tr>
                 <tr>
                   <td colspan="5"><center><?php echo $entri[0]['nama_vendor']; ?></center></td>
                 </tr>
             </table>
          </div>
        </div>
       </div>
    </div>
    <!-- DEKSRIPSI SINGKAT DATA ENTRI STATUS PROSES -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Tutup Entri</h5>
          </div>
          <div class="widget-content">
               <form  class="form-horizontal">

                 <div class="control-group">
                    <label class="control-label">Biaya Total Perbaikan :</label>
                    <div class="controls">
                       <input type="number"  id="biaya" class="span11" placeholder="Masukkan Biaya Total Perbaikan" />
                   </div>
                </div>

                 <div class="control-group">
                    <label class="control-label">Upload File :</label>
                    <div class="controls">
                       <input type="file"  name="kopelan" id="kopelan" class="span11" placeholder="Masukkan Biaya Total Perbaikan" />
                   </div>
                </div>

                 <div class="form-actions">          
                   <button type="button" class="btn btn-success" id="kirim">Selesai</button>
                </div> 

              </form>
          </div>
         </div>
      </div>
    </div>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>

    <script type="text/javascript">

     toastr.options.preventDuplicates = true;
     toastr.options.timeOut = 500;
     
      $(document).ready(function(){

         $("#kirim").click(function(){
             if($("#biaya").val() == "" || $("#kopelan").val() == ""){
                toastr.warning("Maaf data yang anda inputkan belum lengkap :(","DATA BELUM LENGKAP");
             }
             else{

                 var biaya = $("#biaya").val();
                 var file_data = $('#kopelan').prop('files')[0];
                 var form_data = new FormData();
                 form_data.append('file', file_data);  
               
                  $.ajax({
                             url: '<?php echo base_url();?>Dataentry/tutupEntry/input_file',
                        dataType: 'text',
                           cache: false,
                     contentType: false,
                     processData: false,
                            data: form_data,                         
                            type: 'post',
               success: function(data){
                    
                         $.post("<?php echo base_url();?>Dataentry/tutupEntry/input_biaya",{biaya:biaya,id_file:data,opk:<?php echo $entri[0]['nomor']; ?>},
                           function(data){
                                 if(data == 1){
                                      window.location.href = "<?php echo site_url();?>Dataentry/selesai"; 
                                  }
                                else{

                                  }
                      });
                    
               }
              });
           }
         })
      })
    </script>