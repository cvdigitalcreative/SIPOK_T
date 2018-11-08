<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />

<div id="content">
  <div id="content-header">
    <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
    <h1>Form Entri </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <h5>Gunakan form entri hanya untuk mengisi data untuk entri lawas</h5>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
          <br>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Form Entri</h5>
          </div>
          <div class="widget-content">
               <form id="formentry" class="form-horizontal">

              <div class="control-group">
                          <label class="control-label">Cost Center</label>
                             <div class="controls">
                                <input type="text" id="cost_center" autocomplete="off" class="span5" placeholder="Cost Center…" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
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
                
                
                <div class="control-group">
                    <label class="control-label">No Inventaris :</label>
                     <div class="controls">
                       <select id="inven" style="width: 350px;">                       
                       </select>                      
                    </div>
                </div>

                 <div class="control-group">
                    <label class="control-label">No OPK :</label>
                     <div class="controls">
                       <input type="number"   id="opk" class="span5"   placeholder="Nomor OPK" />
                    </div>             
                </div>
                
                <div class="control-group">
                    <label class="control-label">Tanggal :</label>
                     <div class="controls">
                         <input type="date"    id="tanggal" class="span4" />
                     </div>
                </div>

               

                <div class="control-group">
                    <label class="control-label">Uraian Pekerjaan dan Nama Spare Part :</label>
                     <div class="controls">
                        <textarea id="upns" class="textarea_editor span9"   style="height:200px" placeholder="cth : (Ganti Aki) (GS Astra)"></textarea>
                    </div> 
                     <script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
                     <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
                     <script src="<?php echo base_url(); ?>js/wysihtml5-0.3.0.js"></script> 
                     <script src="<?php echo base_url(); ?>js/jquery.peity.min.js"></script> 
                     <script src="<?php echo base_url(); ?>js/bootstrap-wysihtml5.js"></script> 
                     <script>
                       $('.textarea_editor').wysihtml5();
                     </script>            
                </div>
                 
                 <?php 
                    $size = sizeof($vendor);
                 ?>
                 <div class="control-group">
                    <label class="control-label">Vendor :</label>
                     <div class="controls">
                        <select id="vendor">
                         <?php 
                             for($i=0;$i<$size;$i++){
                          ?>
                              <option value="<?php echo $vendor[$i]["nama_vendor"]; ?>"><?php echo $vendor[$i]["nama_vendor"]; ?></option>
                          <?php
                             }
                         ?>
                        </select>
                    </div>             
                </div>

                <div class="control-group">
                    <label class="control-label">Biaya Total :</label>
                     <div class="controls">
                       <input type="number"   id="biaya_total" class="span5"   placeholder="Biaya Total Perbaikan" />
                    </div>             
                </div>



                <div class="form-actions">          
                   <button type="button" class="btn btn-primary" id="kirim">Kirim</button>
                   <input type="reset"  class="btn btn-danger" >
               </div> 

           </form>
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
toastr.options.timeOut = 900;

  $(document).ready(function(){
      cek = 0;
      cost_center = ""; 
     $("#cost_center").change(function(){
            txt = $("#cost_center").val();
            txt = txt.split(" ||");
            $("#cost_center").val(txt[0]);

             $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Form_entri/galihDatakeform",
                                data  : { cost_center : txt[0] },
                              success : function(data){
                                     size = data.length;
                                     container = $("#inven");
                                     ket = "";
                                     if(cek == 0 || cost_center != txt[0]){
                                         container = $("#inven");
                                         container.empty();
                                         ket = "";
                                         for(i=0;i<size;i++){
                                         ket = "";
                                         ket += "<option value='"+data[i].no_inventaris+"'>"+data[i].no_inventaris+" || "+data[i].jenis_kendaraan+"</option>";
                                         container.append(ket);
                                        }
                                        cek++;
                                        cost_center = txt[0]
                                     }   
                              },
                              error   : function (request) {
           
                                      }
                    })  
      })

     $("#kirim").click(function(){
        cost_center = $("#cost_center").val();
        no_inventaris = $("#inven").val();
        opk = $("#opk").val();
        tanggal = $("#tanggal").val();
        upns = $("#upns").val();
        vendor = $("#vendor").val();
        biaya_total = $("#biaya_total").val();

        if(cost_center == "" || no_inventaris == "" || opk == "" || tanggal == "" || upns == "" || vendor == "" || biaya_total == ""){
             alert("data belum lengkap");
        }
        else{
            var postData = {
                                      "cost_center"    : cost_center,
                                      "no_inventaris"  : no_inventaris,
                                      "opk"            : opk,
                                      "tanggal"        : tanggal,
                                      "upns"           : upns,
                                      "vendor"         : vendor,
                                      "biaya_total"    : biaya_total
                                 };

            var dataString = JSON.stringify(postData);
              $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Form_entri/tambah_entri_lama",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                           if(data == 1){
                                                toastr.success("Data telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);
                                            }
                                           else if(data == 2){
                                                alert(data);
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })

                 function myTimeout1() {
                       window.location.href="<?php echo base_url()?>Unit"; 
                    }   
        }
     })



  })
</script>