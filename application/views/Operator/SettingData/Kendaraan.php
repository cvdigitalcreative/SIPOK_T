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
             <!-- KENDARAAN -->
                 <table  class="table table-bordered data-table">
                   <thead>
                    <!--  <th>Nomor</th> -->
                     <th>Nomor</th>
                     <th>Jenis Kendaraan</th>
                     <th>Nomor Inventaris</th>
                     <th>Tahun</th>
                     <th>Nomor Polisi</th>
                     <th>Cost Center</th>
                     <th>Aksi</th>
                    
                   </thead>
                   <tbody>
                      <?php 
                         $size = sizeof($kendaraan);
                         for($i=0;$i<$size;$i++){
                      ?>
                         <tr>
                           <td style="text-align: center;"><?php echo $i+1; ?></td>
                           <td><?php echo $kendaraan[$i]["jenis_kendaraan"]?></td>
                           <td><center><a href="<?php echo base_url();?>Dataentry/riwayat/<?php echo $kendaraan[$i]["no_inventaris"];?>"></center><?php echo $kendaraan[$i]["no_inventaris"]?></a></td>
                           <td><center><?php echo $kendaraan[$i]["tahun"]?></td>
                           <td><center><?php echo $kendaraan[$i]["no_polisi"]?></td>
                           <td><center><a href="<?php echo base_url();?>Settingdata/dataUser/<?php echo $kendaraan[$i]['cost_center']?>"><?php echo $kendaraan[$i]["cost_center"]?></a></center></td>
                           <td><center><a href="<?php echo base_url();?>Settingdata/editDataKendaraan/<?php echo $kendaraan[$i]["no_inventaris"]?>"><button style="width: 60px;" class="btn btn-primary">Edit</button></a>&nbsp;<a href="<?php echo base_url();?>Settingdata/hapusDataKendaraan/<?php echo $kendaraan[$i]["no_inventaris"]?>"><button style="width: 60px;" class="btn btn-danger">Hapus</button></a></td>
                         </tr>
                      <?php } ?>           
                   </tbody>
                 </table>
                 <p>jumlah kendaraan : <?php echo $size;?></p>
                 <div id="btnAksi">
                     <button class="btn btn-success" id="btn_tambah_kendaraan">Tambah Data Kendaraan</button>
                     <button class="btn btn-danger" id="btn_semby_tambah_kendaraan">Sembunyikan Form</button>
                 </div>
                 <div>
           <script type="text/javascript">
                  
                  function validasiNoInventaris(id,msg,field=''){

                      if(id == "no_inventaris"){

                         if($("#no_inventaris").val().length > 17){

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
                     <form id="formtambahkendaraan" class="form-horizontal">
                    <div class="control-group">
                             <label class="control-label">Nomor Inventaris :</label>
                                  <div class="controls">
                                     <input type="text"   id="no_inventaris" class="span11"  onchange="validasiNoInventaris('no_inventaris','validasiNoinven','Nomor Inventaris')" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoinven"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Jenis Kendaraan :</label>
                                  <div class="controls">
                                     <input type="text"   id="jenis_kendaraan" class="span11" onchange="validasiNoInventaris('jenis_kendaraan','validasiKendaraan','Jenis Kendaraan')" placeholder="Masukkan Jenis Kendaraan" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Nomor Polisi :</label>
                                  <div class="controls">
                                     <input type="text"  id="no_polisi" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoPol"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Tahun Mobil:</label>
                                  <div class="controls">
                                     <input type="text"  id="tahun" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoPol"></p>
                                 </div>
                        </div>
                         <div class="control-group">
                             <label class="control-label">Nomor Rangka :</label>
                                  <div class="controls">
                                     <input type="text"  id="rangka" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Nomor Mesin :</label>
                                  <div class="controls">
                                     <input type="text"  id="no_mesin" class="span11" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiKendaraan"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Cost Center</label>
                             <div class="controls">
                                <input type="text" id="cost_center" autocomplete="off" class="span8" placeholder="Cost Center…" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
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
                             <p style="color:red"></p>
                    </div>
            </div>
                          <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_data_kendaraan">Kirim</button>
                              <input type="reset" name="" class="btn btn-warning">
                        </div> 
                        </form>
                   
                 </div>
             <!-- KENDARAAN -->
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
      $("#formtambahkendaraan").hide();
      $("#btn_semby_tambah_kendaraan").hide();
      
      $("#cost_center").change(function(){
            txt = $("#cost_center").val();
            txt = txt.split(" ||");
            $("#cost_center").val(txt[0]);
      })



      $("#btn_tambah_kendaraan").click(function(){
          $("#formtambahkendaraan").fadeIn();
          $("#btn_semby_tambah_kendaraan").show();
          $("#btn_tambah_kendaraan").hide();    
          $("#no_inventaris").focus();
      });

      $("#btn_semby_tambah_kendaraan").click(function(){
          $("#formtambahkendaraan").fadeOut();
          $("#btn_semby_tambah_kendaraan").hide();
          $("#btn_tambah_kendaraan").show();   
      });

      $("#kendaraan").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataKendaraan";
      });
       $("#user").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataUser";
      });
      $("#vendor").click(function(){
          window.location.href = "<?php echo site_url();?>Settingdata/dataVendor";
      });
      
       $("#kirim_data_kendaraan").click(function(){
               
            
              
                  
            if($("#no_inventaris").val().length > 17 || $("#jenis_kendaraan").val().length == 0){
               if($("#no_inventaris").val().length > 17){ 
                  $("#validasiNoinven").text("Nomor Inventaris Harus 17 Karakter");
               }
               if($("#jenis_kendaraan").val().length == 0){ 
                 $("#validasiKendaraan").text("Jenis Kendaraan Harus Diisi");
               }
           }
           else{
                  if($("#cost_center").val() == "" || $("#no_inventaris").val() == ""){
                      toastr.warning("Cost Center atau Nomor Inventaris Tidak Boleh Kosong","Peringatan");
                  }
                  else{
                        var postData = {
                                      "nomor_inventaris" : $("#no_inventaris").val(),
                                      "jenis_kendaraan"  : $("#jenis_kendaraan").val(),
                                      "nomor_polisi"     : $("#no_polisi").val(),
                                      "nomor_rangka"     : $("#rangka").val(),
                                      "nomor_mesin"      : $("#no_mesin").val(),
                                      "cost_center"      : $("#cost_center").val(),
                                      "tahun"            : $("#tahun").val()
                                 };

                  var dataString = JSON.stringify(postData);
                  $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/tambahData/Kendaraan",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                            if(data == 0){
                                                 toastr.warning("Cost Center tidak ada didalam data silahkan masukkan data usernya terlebih dahulu");
                                                 setTimeout(myTimeout1, 1000); 

                                            }
                                           else if(data == 1){   
                                                   toastr.success("Data Kendaraan telah ditambahkan","Berhasil :)");   
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
            }
               
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

        