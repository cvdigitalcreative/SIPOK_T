<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; SIPPOK by UNSRI <a href="http"> (Matrik Admin)</a> </div>
</div>

<!--end-Footer-part-->

<script src="<?php echo base_url(); ?>/js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>  
<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.flot.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.flot.resize.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/fullcalendar.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.dashboard.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.gritter.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.interface.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.chat.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.validate.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.form_validation.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.wizard.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.popover.js"></script> 
<script src="<?php echo base_url(); ?>/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>/js/matrix.tables.js"></script> 

<script src="<?php echo $base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo $base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo $base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo $base_url(); ?>js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo $base_url(); ?>js/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>



<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>