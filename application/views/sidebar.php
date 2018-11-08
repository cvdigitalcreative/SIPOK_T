<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <?php 
      $cek1 = "";
      $cek2 = "";
      $cek3 = "";
      $cek4 = "";
      $cekTagihan = "";
     
      
      if(isset($side)){
         switch ($side) {
         	case 1:
         		$cek1 = "class='active'";
         		break;
            case 2:
         		$cek2 = "class='active'";
         		break;
            case 3:
            $cek3 = "class='active'";
            break;
            case 4:
            $cek4 = "class='active'";
              break;
            case "agendatagihan": 
              $cekTagihan = "class='active'";
            break;
         }
      }
    ?>
    <li <?php echo $cek1 ?>><a href="<?php echo base_url();?>Operator"><i class="icon icon-home"></i> <span>Data Entry</span></a> </li>
    <li <?php echo $cek2 ?>><a <a href="<?php echo base_url();?>Operator/settingdata"><i class="icon icon-th"></i> <span>Setting Data</span></a></li>
    <li <?php echo $cek3 ?>><a <a href="<?php echo base_url();?>Dataentry/allEntri"><i class="icon icon-th-large"></i> <span>Agenda Perbaikan</span></a></li>
    <li <?php echo $cekTagihan ?>><a <a href="<?php echo base_url();?>Dataentry/agendatagihan"><i class="icon icon-money"></i> <span>Agenda Tagihan</span></a></li>
     <li <?php echo $cek4 ?>><a <a href="<?php echo base_url();?>Operator/form_entri"><i class="icon icon-tasks"></i> <span>Form Entri</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->