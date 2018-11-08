
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
               <table class="table table-bordered data-table">
                 <thead>
                   <th>Nomor</th>
                   <th>Vendor</th>
                   <th>Alamat</th>
                   <th>No. Telp</th>
             <!--       <th>Biaya Total Perbaikan</th> -->
                   <th></th>
                 </thead>
                 <tbody>
                     <?php $size = sizeof($vendor);
                       for($i=0;$i<$size;$i++){
                     ?>
                         <tr>
                           <td style="text-align: center;"><?php echo $i+1; ?></td>
                           <td><center><a href="<?php echo base_url()?>Dataentry/entryByVendor/<?php echo $vendor[$i]['id_vendor']?>"><?php echo $vendor[$i]["nama_vendor"]; ?></a></td>
                           <td><center><?php echo $vendor[$i]["Alamat"]; ?></td>
                           <td><center><?php echo $vendor[$i]["No_telp"]; ?></td>
                           <?php  
                                $number_format = "Rp ".number_format($vendor[$i]["SUM(entri.biaya_total)"],0,".",".");
                           ?>
                        <!--   <td><center><?php echo $number_format; ?></td> -->
                          <td><center><a href="<?php echo base_url()?>Settingdata/editDataVendor/<?php echo $vendor[$i]["id_vendor"] ?>"><button style="width: 60px;" class="btn btn-primary">Edit</button></a>&nbsp;<a href="<?php echo base_url()?>Settingdata/hapusDataVendor/<?php echo $vendor[$i]["id_vendor"] ?>"><button style="width: 60px;" class="btn btn-danger">Hapus</button></a></td>
                         </tr>
                     <?php } ?>
                 </tbody>
               </table>
                <p>jumlah vendor : <?php echo $size;?></p>
                <div id="btnAksi">
                     <button class="btn btn-success" id="btn_tambah_user">Tambah Data Vendor</button>
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
                             <label class="control-label">Nama Vendor :</label>
                                  <div class="controls">
                                     <input type="text"   id="nama_vendor" class="span11"  onchange="validasiNoInventaris('nama_vendor','validasiNamaVendor','Nama Vendor')" placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNamaVendor"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">Alamat :</label>
                                  <div class="controls">
                                     <input type="text"   id="alamat_vendor"  class="span11"  placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiCostCenter"></p>
                                 </div>
                        </div>
                        <div class="control-group">
                             <label class="control-label">No. Telp :</label>
                                  <div class="controls">
                                     <input type="text"   id="no_telp_vendor"  class="span11"  placeholder="" />
                                 </div>
                                  <div style="margin-left: 58px;">
                                       <p style="color:red" id="validasiNoEkstensi"></p>
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
                                      "no_telp_vendor"          : $("#no_telp_vendor").val()
                             };
               var dataString = JSON.stringify(postData);
                    $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Settingdata/tambahData/Vendor",
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
                                                alert("data sudah ada ");
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


        