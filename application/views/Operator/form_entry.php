<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->


<!-- MULAI FORM -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/wysithtml5/bootstrap-wysihtml5.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>  

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />
<!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" /> -->

<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>




<script type="text/javascript">
toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;
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
       <h2>Form Penambahan Entri</h2>
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
          <h5>Form Entry</h5>
        </div>
        <div class="widget-content nopadding">
          <form id="formentry" class="form-horizontal">
        <div class="control-group">
              <label class="control-label">Nomor Inventaris</label>
              <div class="controls">
                <input type="text" id="no_inven" autocomplete="off" placeholder="Nomor Inventaris…" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                 <?php    
                          $size = sizeof($kendaraan);
                          if($size > 0){
                             $t = 'data-source="[&quot;'.$kendaraan[0]["no_inventaris"].'&quot;';
                          for($i=1;$i<$size;$i++){
                            $t .= ',&quot;'.$kendaraan[$i]["no_inventaris"].'&quot;';
                          }
                          $t .= ']"';
                          echo $t;
                          }
                 ?>
                 >
              </div>
            </div>
             
             <div id="data_utama">
               
             </div>
             <!-- <div class="control-group">
              <label class="control-label">Jenis Kendaraan :</label>
              <div class="controls">
                <input type="text" name="jenis_kendaraan" value="becak" id="jenis_kendaraan" onchange="validasiGeneral('jenis_kendaraan','validasiKendaraan')" class="span11" placeholder="Masukkan Jenis Kendaraan" />
              </div>
              <div style="margin-left: 58px;">
                 <p style="color:red" id="validasiKendaraan"></p>
              </div>
            </div>-->

            
            
           
          <div id="tambahForm">
           
            <div class="control-group">
              <label class="control-label">Vendor Perbaikan:</label>
              <div class="controls">
                <select id="vendor">
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
                 <textarea id="kerusakan" class="textarea_editor span10" onchange="validasiGeneral('kerusakan','validasiKerusakan')" rows="6" placeholder="Enter text ..."></textarea>
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
              <button type="button" class="btn btn-success" id="kirim">Kirim</button>
              <input type="reset" name="" class="btn btn-warning">
            </div> 
        </div>
        <div class="form-actions">
        <div id="btn_buat">
          <a href="<?php echo base_url();?>/Operator/settingdata">Buat Data Kendaraan</a>
        </div>
        </div>
          </form>

        </div>
      </div>
    </div>
    </div>
    </div>
<!-- AKHIR FORM -->


<!-- <script src="<?php echo base_url(); ?>OperatorJS/Operator.js"></script>  KALO MAU PAKEK JAVASCRIPT -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>  

<script type="text/javascript">
toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;
   $(document).ready(function($){
  
    $("#tambahForm").hide();
    $("#btn_buat").show();
    
    var label = ["Jenis_Kendaraan","Nomor_Polisi","User","Cost_Center","Nomor_Ekstensi"];
    var sizelabel = label.length;

    $("#no_inven").focusout(function(){ //BUG SEWAKTU USER PILIH DENGAN MOUSE
       var no_inventaris = $("#no_inven").val();

        $.post("<?php echo base_url();?>Form_entri/galihDatakeform",{no_inven : $("#no_inven").val()},
            function(data){
                var duce = jQuery.parseJSON(data);
                if(duce.length == 1){
                    $("#data_utama").show();
                    id_unitkerja = duce[0]["id_unitkerja"];
                    var list = [duce[0]["jenis_kendaraan"],duce[0]["no_polisi"],duce[0]["user"],duce[0]["cost_center"],duce[0]["no_ex"]];

                    container = $("#data_utama");
                    container.empty();
                    ket = "";
                    for(i=0;i<sizelabel;i++){
                     ket = '';
                     ket += '<div class="control-group">';
                     ket += '<label class="control-label">'+label[i]+' :</label>';
                     ket += '<div class="controls">';
                     ket += '<input type="text" name="'+label[i]+'" value="'+list[i]+'" id="'+label[i]+'" class="span11" placeholder="Masukkan '+label[i]+'" disabled/>';
                     ket += '</div>';
                     ket += '</div>';

                     if(i==1){
                        ket += '<a style="margin-left: 22px;color: white" href="<?php echo base_url();?>/Settingdata/editData/'+no_inventaris+'/form_edit_kendaraan">';
                        ket += '<div class="control-group" style="padding: 10px;background-color: cadetblue;font-size: initial;">';
                        
                        ket += 'Edit Data Kendaraan';
                     
                        ket += '</div></a>';
                     }
                      if(i == 4){
                        ket += '<a style="margin-left: 22px;color: white" href="<?php echo base_url();?>/Settingdata/editData/'+id_unitkerja+'/form_edit_user">'
                        ket += '<div class="control-group" style="padding: 10px;background-color:darkolivegreen;;font-size: initial;">';
                        
                        ket += 'Edit Data User';
                     
                        ket += '</div></a>';
                      }
                     container.append(ket);
                    }

                    container = $("#data_utama");
                    ket = "";
                    ket += '<div class="control-group">';

                    $("#tambahForm").show();
                    $("#btn_buat").hide();
                }
                else{
                   $("#tambahForm").hide();
                   $("#data_utama").hide();
                   $("#btn_buat").show();
                }
             
        })
    })
    

     

      $.post("<?php echo base_url();?>Settingdata/lihatVendors",{},
            function(data){
             var duce = jQuery.parseJSON(data);
             var size = duce.length;
             dat = "";
             var container = $("#vendor");

             for(i=0;i<size;i++){
               dat = "";
               dat += '<option value="'+duce[i]["id_vendor"]+'">'+duce[i]["nama_vendor"]+'</option>';
               container.append(dat);
             }
        })
      $("#kirim").click(function(){
           
           var success = 0;

           var no_inven        = $("#no_inven").val();
           var jenis_kendaraan = $("#Jenis_Kendaraan").val();
           var nomor_pol       = $("#Nomor_Polisi").val();
           var Pengguna        = $("#User").val();     
           var vendor          = $("#vendor").val();
           var costcenter      = $("#Cost_Center").val();
           var no_ext          = $("#Nomor_Ekstensi").val();
           var kerusakan       = $("#kerusakan").val();
           
           // alert(kerusakan);           

           kirimKeServer();

         

           function kirimKeServer(){
              
                   var postData = {
                                      "nomor_inventaris" : no_inven,
                                      "jenis_kendaraan"  : jenis_kendaraan,
                                      "nomor_polisi"     : nomor_pol,
                                      "pengguna"         : Pengguna,
                                      "vendor"           : vendor,
                                      "costcenter"       : costcenter,
                                      "nomor_ekstensi"   : no_ext,
                                      "kerusakan"        : kerusakan    
                                  }

                    var dataString = JSON.stringify(postData);
                     $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Operator/3",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                toastr.error("Gagal","Data belum valid"); 
                                            }
                                           else if(data == 1){            
                                                 toastr.success("Data Entry telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);      
                                            }
                                           else{
                                                toastr.error(data,"Something Error");
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
