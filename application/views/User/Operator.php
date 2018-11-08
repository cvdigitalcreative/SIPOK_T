<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
   <!-- CONTENT -->
    <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span3">

        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
          <h5>Data Operator</h5>
        </div>
        <div class="widget-content nopadding">
             <div class="form-actions">
              <h3>Data Operator</h3>
            <h5>Username : <?php echo $opr[0]["username"]?></h5>
            
            <br>
            <br>
             <button class="btn btn-primary" id="opr">ubah password</button></h5>
             </div>
        </div>

      </div>
    </div>
    </div>
    </div>
   <!-- CONTENT -->
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $("#opr").click(function(){
           window.location.href = "<?php echo site_url();?>Kepala/3";  
      })
  });
</script>

  