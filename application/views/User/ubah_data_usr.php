<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <center><h2>Profile Saya</h2></center>
     <div class="row-fluid">
      <div class="span9">

      
        <div style = "margin-left: 302px;" class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Ubah Password</h5>
          </div>
          <div class="widget-content">
          <form id="formentry" class="form-horizontal">
              
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text"  value="<?php echo $account->username; ?>" class="span11" disabled/>
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">Password Lama :</label>
              <div class="controls">
                <input type="password" id="password_lama" class="span11" />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Password Baru :</label>
              <div class="controls">
                <input type="password" id="password_baru" class="span11" />
              </div>
                 <div id="passnotif1" hidden><p style="color:red">Password Harus Sama </p></div> 
            </div>

            <div class="control-group">
              <label class="control-label">Konfirmasi Password Baru :</label>
              <div class="controls">
                <input type="password" id="konfirmasi_password_baru" class="span11" />
              </div>
                <div id="passnotif" hidden><p style="color:red">Password Harus Sama </p></div>
            </div>

              <div class="form-actions">          
              <button type="button" class="btn btn-success" id="ubah">Kirim</button>
              <input type="reset" name="" class="btn btn-warning">
            </div> 
          </form>
          </div>       
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     $("#ubah").click(function(){

         if($("#password_lama").val() == "" || $("#password_baru").val() == "" || $("#konfirmasi_password_baru").val() == ""){
            alert("data belum valid");
         }
         else if($("#password_baru").val() != $("#konfirmasi_password_baru").val()){
            alert("password harus sama");
         }
         else{
              var postData = {
                                 "username"      : "<?php echo $account->username; ?>",
                                 "password_baru" : $("#password_baru").val(),
                                 "password_lama" : $("#password_lama").val(),
                                 "id_account"    : "<?php echo $account->id_account; ?>"       
                             };

              var dataString = JSON.stringify(postData);
             $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>DataentryUser/ubah_data",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                               
                                            }
                                           else if(data == 1){            
                                              window.location.href = "<?php echo site_url();?>Operator";  
                                            }
                                           else{
                                                alert("Password lama tidak sama");
                                            }
                              },
                                error : function (request) {
           
                                    }
                    }) 
             }

     })
  })
</script>

