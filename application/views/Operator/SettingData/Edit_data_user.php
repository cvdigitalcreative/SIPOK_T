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
              <li class="active"><a data-toggle="tab" href="#tab2" id="user">Data User</a></li>
              <li><a data-toggle="tab" href="#tab3" id="vendor">Data Vendor</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
            <a href="<?php echo base_url();?>/Settingdata/dataUser">kembali</a><br><br>
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
              <form>
                      <div class="control-group">
                             <label class="control-label">Cost Center :</label>
                                  <div class="controls">
                                     <input type="text"   id="cost_center" value="<?php echo $user[0]['cost_center']?>" class="span8"   disabled/>
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiCostCenter"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">User :</label>
                               <div class="controls">
                                 
                                 <?php 
                                  $size = sizeof($user);
                                  for($i=0;$i<$size;$i++){?>
                                     <input type="text"   id="user_update" value="<?php echo $user[$i]['org_name']?>" class="span8"   onchange="validasiNoInventaris('user_update','validasiUser','User')" placeholder="" /> 
                                <?php } ?>
                                </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiUser"></p>
                                 </div>
                               </div> 
              </form>
                       <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_update_data_user">Kirim</button>
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

        $("#kirim_update_data_user").click(function(){
             user = $("#user_update").val();
             cost_center = $("#cost_center").val();

             if(user.length == 0){
                 $("#validasiUser").text("User harus diisi");
             }
             else{
                $("#validasiUser").text(""); 
                 var postData = {
                                      "user"             : $("#user_update").val(),
                                      "cost_center"      : $("#cost_center").val(),
                                      "user_l"           : "<?php echo $user[0]['org_name']?>"
                                      
                             };
               var dataString = JSON.stringify(postData);
                    $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/editData/User",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 alert("belum valid");    
                                            }
                                           else if(data == 1){
                                                 toastr.success("Data User telah ditambahkan","Berhasil :)");   
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
                       window.location.href = "<?php echo site_url();?>Settingdata/dataUser";   
                    }    
             }
         })

  });
</script>