<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
            <h5>Notifications delete</h5>
          </div>
            <div class="widget-content">
            <div class="alert alert-block" style="height: 231px;"> <!-- <a class="close" data-dismiss="alert" href="#">×</a> -->
              <h2 class="alert-heading">Peringatan!</h2>
                 <h3>
                 Anda akan menghapus Inventaris '<?php echo $kendaraan[0]['no_inventaris']?>'' <br>dengan jenis kendaraan
                 '<?php echo $kendaraan[0]['jenis_kendaraan']?>'' 
                 </h3>
                 <button id="ya" class="btn btn-danger">Ya</button>&nbsp;<button id="batal" class="btn btn-primary">Batal</button>
              </div>
            </div>
      </div>
 </div>

 <script type="text/javascript">
 	$(document).ready(function(){
        $("#ya").click(function(){
            
        })

        $("#batal").click(function(){
             window.location.href = "<?php echo site_url();?>Settingdata/dataKendaraan"; 
        })
 	})
 </script>

