<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
    <!-- CONTENT -->
   
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li><a data-toggle="tab" href="#tab1" id="kendaraan">Data Kendaraan</a></li>
              <li><a data-toggle="tab" href="#tab2" id="user">Data User</a></li>
              <li class="active"><a data-toggle="tab" href="#tab3" id="vendor">Data Vendor</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
            <a href="<?php echo base_url();?>/Settingdata/dataVendor">kembali</a><br><br>
              <script type="text/javascript">
                  
                  function validasiNoInventaris(id,msg,field=''){

                      if(id == "no_inventaris"){

                         if($("#no_inventaris").val().length != 17){

                             $("#validasiNoinven").text("Nomor Inventaris Harus 17 Karakter");
                         }
                         else{
                            $("#validasiNoinven").text("");
                         }
                      }
                      else{
                         if($("#"+id).val().length == 0){
                             $("#"+msg).text(field+" Harus diisi");
                         }
                         else{
                             $("#"+msg).text("");
                         }
                      }
                  }
              </script>
                       <form id="formeditvendor" class="form-horizontal">
                          <div class="control-group">
                               <label class="control-label">Nama Vendor :</label>
                                   <div class="controls">
                                      <input type="text"   id="nama_vendor" class="span11"  value="<?php echo $vendor[0]['nama_vendor']?>" onchange="validasiNoInventaris('nama_vendor',' validasiNamaVendor','Nama Vendor')" placeholder="" />
                                  </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNamaVendor"></p>
                                 </div>
                           </div>
                             <div class="control-group">
                               <label class="control-label">Alamat :</label>
                                   <div class="controls">
                                      <input type="text"   id="alamat_vendor" class="span11" value="<?php echo $vendor[0]['Alamat']?>"   placeholder="" />
                                  </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNamaVendor"></p>
                                 </div>
                           </div>
                             <div class="control-group">
                               <label class="control-label">No.Telp :</label>
                                   <div class="controls">
                                      <input type="text"   id="no_telp_vendor" class="span11" value="<?php echo $vendor[0]['No_telp']?>"  onchange="validasiNoInventaris('pengguna',' validasiUser','User')" placeholder="" />
                                  </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNamaVendor"></p>
                                 </div>
                           </div>
                       </form>
                       <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_update_data_vendor">Kirim</button>
                              <input type="reset" name="" class="btn btn-warning">
                      </div>
            </div>
          </div>
        </div>
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
     

       $("#kendaraan").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataKendaraan";
      });
       $("#user").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataUser";
      });
      $("#vendor").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataVendor";
      });
      
       $("#kirim_update_data_vendor").click(function(){
          var i = 0;

          nama_vendor = $("#nama_vendor").val();
        
         
          
          if(nama_vendor.length == 0){
              $("#validasiNamaVendor").text("Nama Vendor harus diisi");
          }
          else{
              $("#validasiNamaVendor").text("");
              i++;
          }

      
          if(i == 1){
              var postData = {
                                      "nama_vendor"             : $("#nama_vendor").val(),
                                      "alamat_vendor"           : $("#alamat_vendor").val(),
                                      "no_telp_vendor"          : $("#no_telp_vendor").val(),
                                      "nama_vendor_l"             : "<?php echo $vendor[0]['nama_vendor']?>",
                                      "alamat_vendor_l"           : "<?php echo $vendor[0]['Alamat']?>",
                                      "no_telp_vendor_l"          : "<?php echo $vendor[0]['No_telp']?>"
                             }; 
               var dataString = JSON.stringify(postData);
              
                    $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/editData/Vendor",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 alert("belum valid");    
                                            }
                                           else if(data == 1){
                                                 toastr.success("Data Vendor telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);               
                                            }
                                           else{
                                                alert("data sudah ada "+data);
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })
                     function myTimeout1() {
                       window.location.href = "<?php echo site_url();?>Settingdata/dataVendor";   
                    }    
          } 
          else{
          
          }





      })
       

  });
</script>