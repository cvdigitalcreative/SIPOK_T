<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <?php 
      $cek1 = "";
      $cek2 = "";
      $cek3 = "";
      $cek4 = "";
      
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
         }
      }
    ?>
    <li <?php echo $cek1 ?>><a href="<?php echo base_url();?>Unit"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li <?php echo $cek2 ?>><a href="<?php echo base_url()?>Unit/2"><i class="icon icon-envelope"></i> <span>Form Entri Aduan</span></a> </li>
    <li <?php echo $cek3 ?>><a href="<?php echo base_url()?>Unit/3"><i class="icon icon-list-alt"></i> <span>Data Inventaris</span></a> </li>
    <li <?php echo $cek4 ?>><a href="<?php echo base_url()?>Unit/4"><i class="icon icon-group"></i> <span>Data Cost Center</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->