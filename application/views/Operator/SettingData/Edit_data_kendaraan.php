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
               <li class="active"><a data-toggle="tab" href="#tab1" id="kendaraan">Data Kendaraan</a></li>
              <li><a data-toggle="tab" href="#tab2" id="user">Data User</a></li>
              <li><a data-toggle="tab" href="#tab3" id="vendor">Data Vendor</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
            <a href="<?php echo base_url();?>/Settingdata/dataKendaraan">kembali</a>
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
               <?php 
                   $size = sizeof($kendaraan);
                   if($size > 0){
               ?>
               <form id="formtambahkendaraan" class="form-horizontal">
                    <div class="control-group">
                             <label class="control-label">Nomor Inventaris :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['no_inventaris']?>" id="no_inventaris" class="span11" onchange="validasiNoInventaris('no_inventaris','validasiNoinven')"  placeholder="" disabled/>
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoinven"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Jenis Kendaraan :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['jenis_kendaraan']?>" id="jenis_kendaraan" class="span11" onchange="validasiNoInventaris('jenis_kendaraan','validasiKendaraan','Jenis Kendaraan')" placeholder="Masukkan Jenis Kendaraan" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Nomor Polisi :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['no_polisi']?>" id="no_polisi" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoPol"></p>
                                 </div>
                        </div>
                         <div class="control-group">
                             <label class="control-label">Tahun :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['tahun']?>" id="tahun" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id=""></p>
                                 </div>
                        </div>
                         <div class="control-group">
                             <label class="control-label">Nomor Rangka :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['no_rangka']?>" id="rangka" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Nomor Mesin :</label>
                                  <div class="controls">
                                     <input type="text"  value="<?php echo $kendaraan[0]['no_mesin']?>" id="no_mesin" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                          <div class="control-group">
                          <label class="control-label">Cost Center</label>
                             <div class="controls">
                             <?php 
                                  $cost_center = "";
                                  if(sizeof($user_form) > 0){
                                    $cost_center = $user_form[0]['cost_center'];
                                  }
                             ?>
                                <input type="text" id="cost_center" autocomplete="off" value="<?php echo $cost_center; ?>" placeholder="" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                                     <?php 
                          $size = sizeof($user);
                          if($size > 0){
                               $t = 'data-source="[&quot;'.$user[0]["cost_center"]." || ".$user[0]["org_name"].'&quot;';
                          for($i=1;$i<$size;$i++){
                            $t .= ',&quot;'.$user[$i]["cost_center"]." || ".$user[$i]["org_name"].'&quot;';
                          }
                          $t .= ']"';
                          echo $t;
                          }
                       ?>
                                >
                            </div>
                       </div>
                          <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_update_data_kendaraan">Kirim</button>
                              <input type="reset" name="" class="btn btn-warning">
                        </div> 
               </form>
               <?php }else{
                ?>
                  <h2>Maaf data user tidak ditemukan :(</h2>
                <?php }?>
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
        $("#cost_center").change(function(){
            txt = $("#cost_center").val();
            txt = txt.split(" ||");
            $("#cost_center").val(txt[0]);
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

      $("#kirim_update_data_kendaraan").click(function(){
          if($("#no_inventaris").val().length > 18 || $("#jenis_kendaraan").val().length == 0){
               if($("#no_inventaris").val().length > 18){ 
                  $("#validasiNoinven").text("Nomor Inventaris Harus 17 Karakter");
               }
               if($("#jenis_kendaraan").val().length == 0){ 
                 $("#validasiKendaraan").text("Jenis Kendaraan Harus Diisi");
               }
          }
          else{
              var postData = {
                                      "nomor_inventaris"   : $("#no_inventaris").val(),
                                      "jenis_kendaraan"    : $("#jenis_kendaraan").val(),
                                      "nomor_polisi"       : $("#no_polisi").val(),
                                      "nomor_rangka"       : $("#rangka").val(),
                                      "nomor_mesin"        : $("#no_mesin").val(),
                                      "cost_center"        : $("#cost_center").val(),
                                       "tahun"              : $("#tahun").val(),
                                      "nomor_inventaris_l" : "<?php echo $kendaraan[0]['no_inventaris'];?>",
                                      "jenis_kendaraan_l"  : "<?php echo $kendaraan[0]['jenis_kendaraan'];?>",
                                      "nomor_polisi_l"     : "<?php echo $kendaraan[0]['no_polisi'];?>",
                                      "nomor_rangka_l"     : "<?php echo $kendaraan[0]['no_rangka'];?>",
                                      "nomor_mesin_l"      : "<?php echo $kendaraan[0]['no_mesin'];?>",
                                      "cost_center_l"      : "<?php echo $cost_center; ?>"
                             };
              var dataString = JSON.stringify(postData);
              $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/editData/Kendaraan",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 alert("belum valid");    
                                            }
                                           else if(data == 1){   
                                                   toastr.success("Data Inventaris telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);     
    
                                                
                                            }
                                           else if(data == 2){
                                                 toastr.error("Data sudah pernah ada","MAAF :(");
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })  

                    function myTimeout1() {
                       window.location.href = "<?php echo site_url();?>Operator/settingdata";  
                    } 
          }
      });
  })
</script>