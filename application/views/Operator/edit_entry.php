<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <!-- MULAI FORM -->
<script type="text/javascript">
     function isNull(value,id){
         if(value.length == 0){
            $("#"+id).text("Filed ini harus diisi");
            $("#"+id).show();
            return true;
         }
         else{
            return false;
         }         
      }

      function validasi(id,idpesan,isfixlength,fixlength=0){
          var value = $("#"+id).val();
        
          if(isfixlength == "true"){
             if(isNull(value,idpesan) == false){
               if(value.length != fixlength){
                   $("#"+idpesan).text("Panjang harus "+fixlength+" karakter");
                    $("#"+idpesan).show();
               }
               else{
                   $("#"+idpesan).hide();
               }
            }
          }
          else{
            if(isNull(value,idpesan) == false){
               $("#"+idpesan).hide();
            }
          }
      }

      function validasiGeneral(id,idpesan){
          value = $("#"+id).val();
          if(value != 0){
             $("#"+idpesan).hide();
          }
      }

</script>

  <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span10">
        <h3>Silahkan Lakukan Perubahan Data</h3>
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
          <h5>Form Perubahan Entry</h5>
        </div>
        <div class="widget-content nopadding">
          <form id="formentry" class="form-horizontal">

          <div class="control-group">
              <label class="control-label">Nomor Inventaris :</label>
              <div class="controls">
                <input type="text" id="no_inven" class="span11" value="<?php echo $entri['nomor_inventaris']; ?>" onchange="validasi('no_inven','validasiInventaris','true',17)" placeholder="Masukkan Nomor Inventaris Kendaraan" disabled/>
              </div>
              
              <div style="margin-left: 58px;">
                 <p style="color:red" id="validasiInventaris"></p>
              </div>

            </div>

             <div class="control-group">
              <label class="control-label">Jenis Kendaraan :</label>
              <div class="controls">
                <input type="text" name="jenis_kendaraan" value="<?php echo $kendaraan['jenis_kendaraan']?>" id="jenis_kendaraan" onchange="validasiGeneral('jenis_kendaraan','validasiKendaraan')" class="span11" placeholder="Masukkan Jenis Kendaraan" disabled />
              </div>
              <div style="margin-left: 58px;">
                 <p style="color:red" id="validasiKendaraan"></p>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Nomor Polisi :</label>
              <div class="controls">
                <input type="text" name="no_pol" id="no_pol" value="<?php echo $kendaraan['nomor_polisi']?>" class="span11" placeholder="Masukkan Nomor Polisi Kendaraan" disabled/>
              </div>
            </div>

            <a style="margin-left: 22px;color: white" href="<?php echo base_url();?>/Settingdata/editData/<?php echo $entri['nomor_inventaris']; ?>/form_edit_kendaraan">
                <div class="control-group" style="padding: 10px;background-color: cadetblue;font-size: initial;">
                        Edit Data Kendaraan
                </div></a>
            
            <div class="control-group">
              <label class="control-label">Pengguna :</label>
              <div class="controls">
                <input type="text" name="user" id="user"  value="<?php echo $unitkerja['user']; ?>" class="span11" onchange="validasiGeneral('user','validasiPengguna')" placeholder="Unit kerja atau Departement" disabled/>
              </div>
              
            </div>
            
            <div class="control-group">
              <label class="control-label">Cost Center :</label>
              <div class="controls">
                <input type="text" name="costcenter" id="costcenter" value="<?php echo $unitkerja['cost_center']; ?>" class="span11" placeholder="Masukkan Cost Center" disabled/>
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">Nomor Ekstensi :</label>
              <div class="controls">
                <input type="text" name="no_ext" id="no_ext" value="<?php echo $unitkerja['no_ext']; ?>" onchange="validasi('no_ext','validasiNomorExtensi','true',4)" class="span11" placeholder="Masukkan Nomor Ekstensi" disabled/>
              </div>
            </div>

          <a style="margin-left: 22px;color: white" href="<?php echo base_url();?>/Operator/settingdata">
                <div class="control-group" style="padding: 10px;background-color:darkolivegreen;font-size: initial;">
                        Edit Data User
                </div></a>
           
            <div class="control-group">
              <label class="control-label">Vendor Perbaikan:</label>
              <div class="controls">
                <select id="vendor">
                  <?php 

                         $size = sizeof($nama_vendor);

                         for($i=0;$i<$size;$i++){     
                            
                            if($nama_vendor[$i]["nama_vendor"] == $entri['n_vendor']){
                               echo '<option value="'.$nama_vendor[$i]["id_vendor"].'" selected>'.$nama_vendor[$i]["nama_vendor"].'</option>';
                            }
                            else{
                               echo '<option value="'.$nama_vendor[$i]["id_vendor"].'">'.$nama_vendor[$i]["nama_vendor"].'</option>';
                            } 
                      }
                   ?>
                </select>
              </div>
            </div>

              <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
              <link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />
              <link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />
              <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />
              <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
              
              <div class="row-fluid">
              <div class="widget-box">
              <div class="widget-content">
              <div class="control-group">
              <label class="control-label">Kerusakan</label>
              <div class="controls">
                <!-- <textarea class="span11" id="kerusakan" value="pecah ban" onchange="validasiGeneral('kerusakan','validasiKerusakan')"></textarea> -->
                 <textarea id="kerusakan" class="textarea_editor span10" onchange="validasiGeneral('kerusakan','validasiKerusakan')" rows="6" placeholder="Enter text ..."> <?php echo $entri['kerusakan']; ?></textarea>
              </div>


              <div style="margin-left: 58px;">
                 <p style="color:red" id="validasiKerusakan"></p>
              </div>
              </div>
              </div>
              </div>
              </div>
              <script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
              <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
              <script src="<?php echo base_url(); ?>js/wysihtml5-0.3.0.js"></script> 
              <script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script> 
              <script src="<?php echo base_url(); ?>js/bootstrap-wysihtml5.js"></script> 
              <script>
                       $('.textarea_editor').wysihtml5();
              </script>
            
           
            <div class="form-actions">
              <!-- <input type="submit" name="submit" class="btn btn-success"> gak bisa pakek submit ? --> 
              <button type="button" class="btn btn-success" id="kirim">Kirim</button>
              <input type="reset" name="" class="btn btn-warning">
            </div>
          </form>

        </div>
      </div>
    </div>
    </div>
    </div>
<!-- AKHIR FORM -->


<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>  

<script type="text/javascript">
toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;
   $(document).ready(function(){
      
      $("#kirim").click(function(){
           
           var success = 0;

           var no_inven        = $("#no_inven").val();
           var jenis_kendaraan = $("#jenis_kendaraan").val();
           var nomor_pol       = $("#no_pol").val();
           var Pengguna        = $("#user").val();     
           var vendor          = $("#vendor").val();
           var costcenter      = $("#costcenter").val();
           var no_ext          = $("#no_ext").val();
           var kerusakan       = $("#kerusakan").val();
           

        
           kirimKeServer();

         

           function kirimKeServer(){            
                   var postData = {
                                     "nomor_inventaris_baru" : no_inven,
                                      "nomor_inventaris_lama" : "<?php echo $entri['nomor_inventaris']; ?>",
                                      "jenis_kendaraan_baru"  : jenis_kendaraan,
                                      "jenis_kendaraan_lama"  : "<?php echo $kendaraan['jenis_kendaraan']?>",
                                      "nomor_polisi_baru"     : nomor_pol,
                                      "nomor_polisi_lama"     : "<?php echo $kendaraan['nomor_polisi']?>",
                                      "pengguna_baru"         : Pengguna,
                                      "pengguna_lama"         : "<?php echo $unitkerja['user']; ?>",
                                      "vendor_baru"           : vendor,
                                      "vendor_lama"           : "<?php echo $entri['id_vendor']; ?>",
                                      "costcenter_baru"       : costcenter,
                                      "costcenter_lama"       : "<?php echo $unitkerja['cost_center']; ?>",
                                      "nomor_ekstensi_baru"   : no_ext,
                                      "nomor_ekstensi_lama"   : "<?php echo $unitkerja['no_ext']; ?>",
                                      "kerusakan_baru"        : kerusakan,
                                      "kerusakan_lama"        : "<?php echo $entri['kerusakan']; ?>"
                                    };

                    var dataString = JSON.stringify(postData);
                     $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Operator/4",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 alert("belum valid");    
                                            }
                                           else if(data == 1){            
                                                 toastr.success("Data Entry telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);  
                                            }
                                           else{
                                                alert("ERROR");
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })  
                     function myTimeout1() {
                         window.location.href = "<?php echo site_url();?>Operator";   
                    }       
           }
      })

   })
</script>
