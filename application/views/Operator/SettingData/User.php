
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
               <table class="table table-bordered data-table">
                 <thead>
                    <th>Nomor</th> 
                    <th>Cost Center</th>
                   <th>User</th>
                   <th>Aksi</th>
                 </thead>
                 <tbody>
                   <?php $size = sizeof($user); 
                    for($i=0;$i<$size;$i++){
                    ?>
                       <tr>
                          <td style="text-align: center;"><?php echo $i+1; ?></td>
                         <td><center><?php echo $user[$i]["cost_center"]; ?></td>
                           <td><center><?php echo $user[$i]["org_name"]; ?></td>
                         <td><center><a href="<?php echo base_url();?>Settingdata/editDataUser/<?php echo $user[$i]["cost_center"]?>/<?php echo $user[$i]['id_user']?>"><button style="width: 60px;" class="btn btn-primary">Edit</button></a>&nbsp;<a href="<?php echo base_url();?>Settingdata/hapusDataUser/<?php echo $user[$i]['id_user']?>"><button style="width: 60px;" class="btn btn-danger"><center>Hapus</button></a></td>
                       </tr>
                    <?php } ?>
                 </tbody>
               </table>
                <p>jumlah user : <?php echo $size;?></p>
                <div id="btnAksi">
                     <button class="btn btn-success" id="btn_tambah_user">Tambah Data User</button>
                     <button class="btn btn-danger" id="btn_semby_tambah_user">Sembunyikan Form</button>
                 </div>
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
                  <form id="formtambahuser" class="form-horizontal">
                    <div class="control-group">
                             <label class="control-label">User :</label>
                                  <div class="controls">
                                     <input type="text"   id="pengguna" class="span11"   onchange="validasiNoInventaris('pengguna','validasiUser','User')" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiUser"></p>
                                 </div>
                        </div>
                          <div class="control-group">
                          <label class="control-label">Cost Center</label>
                             <div class="controls">
                                <input type="text" id="cost_center" onchange="validasiNoInventaris('cost_center','validasiCostCenter','Cost Center')" autocomplete="off" class="span8" placeholder="Cost Center…" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                        <?php 
                          $size = sizeof($form);
                          if($size > 0){
                               $t = 'data-source="[&quot;'.$form[0]["cost_center"].'&quot;';
                          for($i=1;$i<$size;$i++){
                            $t .= ',&quot;'.$form[$i]["cost_center"].'&quot;';
                          }
                          $t .= ']"';
                          echo $t;
                          }
                       ?>
                             >
                    </div>
                     <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiCostCenter"></p>
                                 </div>
                </div>
                         <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_data_user">Kirim</button>
                              <input type="reset" name="" class="btn btn-warning">
                        </div> 
                  </form>
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
      $("#formtambahuser").hide();
      $("#btn_semby_tambah_user").hide();
      
      no_inven_field = 1;
      $("#btn_tambah_user").click(function(){
          $("#formtambahuser").fadeIn();
          $("#btn_semby_tambah_user").show();
          $("#btn_tambah_user").hide();    
          $("#user").focus();
      });

      $("#btn_semby_tambah_user").click(function(){
          $("#formtambahuser").fadeOut();
          $("#btn_semby_tambah_user").hide();
          $("#btn_tambah_user").show();   
      });
      
    

      $("#kirim_data_user").click(function(){
          var i = 0;

          user = $("#pengguna").val();
          cost_center = $("#cost_center").val();
         
          
          if(user.length == 0){
              $("#validasiUser").text("User harus diisi");
          }
          else{
              $("#validasiUser").text("");
              i++;
          }

          if(cost_center.length == 0){
             $("#validasiCostCenter").text("Cost Center tidak boleh kosong");
          }
          else{
             $("#validasiCostCenter").text("");
             i++;
          }

        

          if(i == 2){
              var postData = {
                                      "user"             : $("#pengguna").val(),
                                      "cost_center"      : $("#cost_center").val(),
                                      
                             };
               var dataString = JSON.stringify(postData);
                    $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/tambahData/User",
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
                                                alert("data sudah ada ");
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })
                     function myTimeout1() {
                       window.location.href = "<?php echo site_url();?>Settingdata/dataUser";   
                    }    
          } 
          else{
             //TOASTR WARNING
          }





      })

      $("#kendaraan").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataKendaraan";
      });
       $("#user").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataUser";
      });
      $("#vendor").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataVendor";
      });
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


        