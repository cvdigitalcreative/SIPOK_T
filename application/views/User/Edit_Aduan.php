<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />


<div id="content">
<!--breadcrumbs-->
 <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Form Edit</h1>
  </div>
   <div class="container-fluid">
    <div class="container-fluid">
    <div class="quick-actions_homepage">
    </div>
    <hr>

    <!-- ENTRI SAYA -->
    <div class="row-fluid">
      <div class="span12">
      
       <div id="addnotif" class="alert alert-info alert-block" hidden> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Ada Entri Yang Telah Selesai!</h4>
                Ada entri yang telah diselesaikan , silahkan lihat di daftar <a href="<?php echo base_url()?>Unit/5">entri selesai</a>
        </div>
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Edit Aduan <?php echo $entri[0]['nomor']?></h5>
          </div>
          <div class="widget-content"> 
          
           <form id="formentry" class="form-horizontal">

                <div class="control-group">
                    <label class="control-label">User :</label>
                     <div class="controls">
                         <select id="user" style="width: 350px;">
                            <?php 
                               $sizeu = sizeof($user);
                               for($i=0;$i<$sizeu;$i++){
                                if($user[$i]['id_user'] == $entri[0]['id_user']){
                               ?>
                                    <option value="<?php echo $user[$i]['org_name']; ?>" selected><?php echo $user[$i]['org_name']; ?></option>
                               <?php
                                }
                                else{?>
                                     <option value="<?php echo $user[$i]['org_name']; ?>"><?php echo $user[$i]['org_name']; ?></option>
                                <?php
                                }
                            ?>
                            <?php } ?>
                         </select>
                    </div>             
                </div>
                
                <div class="control-group">
                    <label class="control-label">No Inventaris :</label>
                     <div class="controls">
                       <select id="inven" style="width: 350px;" >
                         <?php 
                               $sizek = sizeof($kendaraan);
                               for($i=0;$i<$sizek;$i++){
                                 if($kendaraan[$i]['no_inventaris'] == $entri[0]['no_inventaris']){
                                    ?>
                                         <option value="<?php echo $kendaraan[$i]['no_inventaris']; ?>" selected><?php echo $kendaraan[$i]['no_inventaris']; ?> || <?php echo $kendaraan[$i]['jenis_kendaraan']?></option>
                                    <?php
                                 }
                                 else{
                                  ?>
                                        <option value="<?php echo $kendaraan[$i]['no_inventaris']; ?>"><?php echo $kendaraan[$i]['no_inventaris']; ?> || <?php echo $kendaraan[$i]['jenis_kendaraan']?></option>
                                  <?php
                                 }
                            ?>
                            <?php } ?>
                       </select>                      
                    </div>
                    <div style="margin-left: 58px;">
                          <p style="color:red" id="cekInventaris" hidden>hahaha</p>
                      </div>             
                </div>

                <div class="control-group" id="jenis_kendaraan" hidden>
                    <label class="control-label">Jenis Kendaraan :</label>
                     <div class="controls">
                         <input type="text"   id="uraian_pekerjaan" class="span4" disabled />
                     </div>
                </div>

                <div class="control-group">
                    <label class="control-label">No Ekstensi :</label>
                     <div class="controls">
                       <input type="text"   id="eks" class="span2" value="<?php echo $entri[0]['no_ex']?>"/>
                    </div>             
                </div>

                <div class="control-group">
                    <label class="control-label">Kerusakan :</label>
                     <div class="controls">
                           <textarea id="kerusakan" class="textarea_editor span9"   style="height:200px" placeholder="Masukkan Aduan ..."><?php echo $entri[0]['aduan'] ?></textarea>
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

                <div class="form-actions">          
                   <button type="button" class="btn btn-primary" id="kirim_entri">Kirim</button>
                   <input type="reset"  class="btn btn-danger" >
               </div> 

           </form>

          </div>
        </div>
      </div>
    </div>
    <!-- AKHIE ENTRI -->
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
        <?php  
        if($this->session->tempdata('notif') != NULL)
        {
            $this->session->unset_tempdata('notif');
        ?>
            $("#addnotif").fadeIn(1000);
        <?php 
          }
        else{
        ?>
            $("#addnotif").hide();
        <?php 
           }
        ?>    
   
      $('#kirim_entri').click(function(){
          var postData = {
                                      "opk"            : "<?php echo $entri[0]['nomor']; ?>",
                                      "user"           : $("#user").val(),
                                      "no_inventaris"  : $("#inven").val(),
                                      "no_inventaris_l": "<?php echo $entri[0]['no_inventaris']; ?>",
                                      "ekstensi"       : $("#eks").val(),
                                      "kerusakan"      : $("#kerusakan").val()
                                 };

                    var dataString = JSON.stringify(postData);
                  $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>DataentryUser/editData",
                                data  : {myData : dataString},
                         beforeSubmit : function(data){ },
                              success : function(data){
                                           if(data == 1){
                                                 toastr.success("Data telah ditambahkan","Berhasil :)");   
                                                 setTimeout(myTimeout1, 1000);          
                                            }
                                           else if(data == 2){
                                                 toastr.error("Maaf data sudah pernah dimasukkan dan sudah diproses","Maaf ");
                                            }
                              },
                                    error : function (request) {
           
                                    }
                    })
                        function myTimeout1() {
                       window.location.href= "<?php echo base_url()?>Unit/"; 
                    }   
      });
    
  })
</script>