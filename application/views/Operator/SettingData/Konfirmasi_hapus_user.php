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
                   Anda akan Menghapus user '<?php echo $user[0]['org_name']?>'<br>
                   Cost Center '<?php echo $user[0]['cost_center']?>'
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
           url   : "<?php echo base_url();?>Settingdata/hapusData/User",
           data  : {mydata : '<?php echo $user[0]["id_user"]; ?>'},
           beforeSubmit : function(data){ },
           success : function(data){
           if(data == 0){
              
           }
           else if(data == 1){
             window.location.href = "<?php echo site_url();?>Settingdata/dataUser";      
            }
           else{
                alert("ERROR, Gagal dihapus");
           } },error : function(data){}})
        })

        $("#batal").click(function(){
             window.location.href = "<?php echo site_url();?>Settingdata/dataUser"; 
        })
 	})
 </script>

