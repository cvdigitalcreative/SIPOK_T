<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
   <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
            <h5>Notifications delete</h5>
          </div>
            <div class="widget-content">
            <div class="alert alert-block" style="height: 231px;"> <!-- <a class="close" data-dismiss="alert" href="#">×</a> -->
              <h2 class="alert-heading">Peringatan!</h2>
                 <h3>
                 <?php if( isset($kendaraan[0]['no_inventaris'])){
                      ?>
                          Anda akan menghapus Inventaris '<?php echo $kendaraan[0]['no_inventaris']?>' <br>dengan jenis kendaraan
                          '<?php echo $kendaraan[0]['jenis_kendaraan']?>'' 
                      <?php 
                      }
                  ?>
               </h3>
                 <button id="ya" class="btn btn-danger">Ya</button>&nbsp;<button id="batal" class="btn btn-primary">Batal</button>
              </div>
            </div>
      </div>
 </div>

 <script type="text/javascript">
 	$(document).ready(function(){
       $("#ya").click(function(){
          $.ajax({
           type  : "post",
           url   : "<?php echo base_url();?>Settingdata/hapusData/Kendaraan",
           data  : {mydata : '<?php echo $kendaraan[0]["no_inventaris"]; ?>'},
           beforeSubmit : function(data){ },
           success : function(data){
           if(data == 0){
              
           }
           else if(data == 1){
             window.location.href = "<?php echo site_url();?>Operator/settingdata";      
            }
           else{
                alert("ERROR, Gagal dihapus");
           } },error : function(data){}})
        })

        $("#batal").click(function(){
             window.location.href = "<?php echo site_url();?>Settingdata/dataKendaraan"; 
        })
 	})
 </script>

