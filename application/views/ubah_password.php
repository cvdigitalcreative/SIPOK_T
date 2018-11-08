
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
<!-- Awal form -->

<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span10">

        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
          <h5>Ubah Password Operator</h5>
        </div>
        <div class="widget-content nopadding">
          <form id="formentry" class="form-horizontal">

          <div class="control-group">
              <label class="control-label">Password Lama :</label>
              <div class="controls">
                <input type="text" id="last_pass" class="span11" value="<?php echo $acc[0]["password"]?>" onchange="" placeholder="Masukkan Password Lama" />
              </div>

            </div>

             <div class="control-group">
              <label class="control-label">Password Baru :</label>
              <div class="controls">
                <input type="text" name="password_baru" value="" id="new_pass" onchange="" class="span11" placeholder="Masukkan Password Baru" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Konfirmasi Password :</label>
              <div class="controls">
                <input type="text" name="confirm" id="confirm" value="" class="span11" placeholder="Konfirmasi Password Baru" />
              </div>
            </div>
            
            <div class="form-actions">
              <!-- <input type="submit" name="submit" class="btn btn-success"> gak bisa pakek submit ? --> 
              <button type="button" class="btn btn-success" id="kirim">Ubah</button>
              <input type="reset" name="" class="btn btn-warning">
            </div>
          </form>

        </div>
      </div>
    </div>
    </div>
    </div>
<!-- AKHIR FORM -->

<script type="text/javascript">
   $(document).ready(function(){
      
      $("#kirim").click(function(){
           

           var last_pass        = $("#last_pass").val();
           var new_pass         = $("#new_pass").val();
           var confirm_pass     = $("#confirm").val();
           
           kirimKeServer();

           function kirimKeServer(){
               
                   var postData = {
                                      "last_pass"     : last_pass,
                                      "new_pass"      : new_pass,
                                      "confirm_pass"  : confirm_pass   
                                  }

                    var dataString = JSON.stringify(postData);
                     $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Kepala/4",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 alert("belum valid");    
                                            }
                                           else{            
                                                alert("sukses");
                                                window.location.href = "<?php echo site_url();?>Kepala/2";    
                                                
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })   
           }
      })

   })
</script>