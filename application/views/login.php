<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistem POK</title>
  <script src="<?php echo base_url(); ?>/js/prefixfree.min.js"></script>
  <script src='<?php echo base_url(); ?>/js/jquery1.min.js'></script>
 
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>

<body>
  <div class="body"></div>
    <div class="grad"></div>
    <div style="right:150px" class="header">
      <div>Departemen <span>Sarana & Umum</span></div>
      <div><img src="<?php echo base_url(); ?>img/logo pusri.png" width="104" height="142"></div>
      <div class="login">
      <form id="formlogin"> 
        <input type="text" placeholder="username" name="usr"><br>
        <input type="password" placeholder="password" name="pass"><br>
        <input type="submit" value="Login">
        <input type="submit" value="Reset"><br><br><br>
      </form>
      </div>
    </div>
    <div style="left:150px" class="descriptionHeader">
      <div>SI-POK</div>s
      <div><font color="white" style= "font-size: x-large">
        <p style="margin-top: -10px; font-size: 15px; color: yellow; font-family: monospace;">
          (Sistem Informasi Permintaan Order Kerja)
        </p>
        <p>Sistem ini adalah sistem yang membantu untuk</p>
        <p style="margin-top: -22px;">mencatat riwayat kerusakkan kendaraan operasional</p>
        <p style="margin-top: -22px;">PT.Pusri Palembang</p>
      </font>

    </div>

    <br>  
</body>
</html>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>  
<script type="text/javascript">
toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;
  
  $(document).ready(function(){
        $("#formlogin").on('submit',function(e){
       e.preventDefault();
         $.ajax({
           type  : "post",
           url   : "<?php echo site_url();?>Main/1",
           data  : $('#formlogin').serialize(),
           beforeSubmit : function(data){ },
           success : function(data)
           {
              if(data == 0){
                toastr.error("MAAF","username dan password tidak ditemukan");
           }
              else if(data == 1){ 
                window.location.href = "<?php echo site_url();?>Operator";        
            }
              else if(data == 2){
                window.location.href = "<?php echo site_url();?>Unit";
            }
            else
            {
                toastr.error("Username or Password",data);
           } 
         },error : function(data){}
       })
       })
      });

 </script>
