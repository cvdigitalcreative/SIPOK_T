<?php 
                  $size = sizeof($entri);
                  $data= array();
                  if($size > 0){
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Proses Entri '<?php echo $entri[0]['no_inventaris']; ?>'</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- MASUKKAN NAMA SPARE PART -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <!-- <?php echo sizeof($entri); ?> -->
            <h5>Tentukan Nama Spare Part dan Nama Vendor</h5>
          </div>
          <div class="widget-content">
            <table class="table table-bordered">
                <tr><th><h6>Pilih Vendor Perbaikan</h6></th><td>
                 
                  <select id="k_vendor">
                  <?php 
                    $size_vendor = sizeof($vendor);
                    for($i=0;$i<$size_vendor;$i++){
                  ?>
                    <option values="<?php echo $vendor[$i]['id_vendor']?>"><?php echo $vendor[$i]['nama_vendor']?></option>
                  <?php } ?>
                  </select>
                </td></tr>
               <?php for($i=0;$i<$size;$i++){?>
                <tr>
                 <th><h6><?php echo $entri[$i]['pekerjaan']; ?></h6></th>
                 <?php array_push($data,$entri[$i]['id_perbaikan']); ?>
                 <td><input  id="ns<?php echo $i;?>" type="text" name=""></td>
               </tr>
               <?php } 
                 $data = json_encode($data);
               ?>
            </table>
             <a href="#" id="selesai"><button class="btn btn-primary">Selesai</button></a>
          </div>
        </div>
      </div>
     </div>
   </div>
</div>
<?php }else{ ?>
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Ooops!</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- MASUKKAN NAMA SPARE PART -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Nama Spare Part</h5>
          </div>
          <div class="widget-content">
             <h2> Duh , Maaf , Uraian Pekerjaan tidak ditemukan :(</h2>
          </div>
          </div>
          </div>
   </div>
<?php } ?>
<!-- AKHIR MASUKKAN NAMA SPARE PART -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>
<script type="text/javascript">

toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;

    $(document).ready(function(){
        
       $("#selesai").click(function(){
          err = 0;
          arrID = <?php echo $data; ?>;
          size = <?php echo $size; ?>; 
          arrData = [];
          for(i=0;i<size;i++){
             arrData.push([arrID[i],$("#ns"+i).val()]);
             if($("#ns"+i).val() == ""){
                err = 1;
                break;
             }
          }

          if(err > 0){
           toastr.warning("Maaf data yang anda inputkan belum lengkap :(","DATA BELUM LENGKAP");
          }
          else{
             var stringData = JSON.stringify(arrData);
             console.log(stringData);
          
             $.post("<?php echo base_url();?>Dataentry/tambahNamaSparePart",{data : stringData,vendor : $("#k_vendor").val()},
                      function(data){
                        if(data == 1){
                           window.location.href = "<?php echo base_url();?>Operator/proses";  
                        }
            });
          }
       })   
    })
</script>
