<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Kerjakan Aduan</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Aduan OPK <?php echo $entri[0]['nomor']?></h5>
          </div>
          <div class="widget-content">
             <table class="table table-bordered">
                 <tr>
                   <td>Nomor Inventaris</td>
                   <td><center>:</td>
                   <td><?php echo $entri[0]["no_inventaris"]?></td>
                   </tr>
                   <tr>
                   <td>Cost Center</td>
                   <td><center>:</td>
                   <td><?php echo $entri[0]["cost_center"]?></td>
                   </tr>
                   <tr>
                   <td>No. Ekstensi</td>
                   <td><center>:</td>
                   <td><?php echo $entri[0]["no_ex"]?></td>
                 </tr>
                  <tr>
                   <td>User</td>
                   <td><center>:</td>
                   <td><?php echo $entri[0]["nama_user"]?></td>
                 </tr>
                 <tr>
                   <td colspan="3">
                     <h5 style="padding: 9px;"><?php echo $entri[0]["aduan"]?></h5>
                   </td>
                 </tr>
             </table>
            <a href="<?php echo base_url()?>Operator/home"><button class="btn btn-danger">Kembali</button></a>
          </div>
        </div>
      </div>
    </div>
<!-- END ADUAN -->
<!-- URAIAN PEKERJAAN -->
     <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Pekerjaan</h5>
          </div>
          <div class="widget-content"> 
              <form id="formentry" class="form-horizontal">

                 <div class="control-group">
                    <label class="control-label">Pekerjaan :</label>
                     <div class="controls">
                       <input type="text"   id="uraian_pekerjaan" class="span11" placeholder="Masukkan Uraian Pekerjaan" />
                    </div>             
                </div>

                 <div class="control-group">
                    <label class="control-label">Quantity :</label>
                     <div class="controls">
                       <input type="text"  id="quantity" class="span11" placeholder="Masukkan Quantity" />
                    </div>             
                </div>

                 <div class="control-group">
                    <label class="control-label">Satuan :</label>
                     <div class="controls">
                       <input type="text" id="satuan" class="span11" placeholder="Masukkan Satuan" />
                    </div>             
                </div>

                 <div class="control-group">
                    <label class="control-label">Keterangan :</label>
                     <div class="controls">
                       <input type="text"  id="keterangan" class="span11" placeholder="Masukkan Satuan" />
                    </div>             
                </div>

                <div class="form-actions">          
                  <button type="button" class="btn btn-success" id="tambah_uraian">Tambahkan Uraian</button>
                   <input type="reset"  class="btn btn-warning" >
               </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- AKHIR URAIAN PEKERJAAN -->
<!-- TABEL DATA URAIAN PEKERJAAN -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data Uraian Pekerjaan</h5>
          </div>
          <div class="widget-content">

            <table class="table table-bordered">
               <a href="<?php echo base_url();?>Dataentry/cetakLHPK/<?php echo $entri[0]['nomor']?>"><i class="icon-print"></i> LHPK</a>
              <thead>
                <tr>
                   <th>No</th>
                   <th>URAIAN PEKERJAAN</th>
                   <th>Quantity</th>
                   <th>Satuan</th>
                   <th>Keterangan</th>
                   <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                    $size = sizeof($perbaikan);
                    for($i=0;$i<$size;$i++){
                 ?>
                   <tr>
                     <td><center><?php echo $i+1; ?></td>
                     <td><center><?php echo $perbaikan[$i]['pekerjaan']; ?></td>
                     <td><center><?php echo $perbaikan[$i]['quantity']; ?></td>
                     <td><center><?php echo $perbaikan[$i]['satuan']; ?></td>
                     <td><center><?php echo $perbaikan[$i]['keterangan']; ?></td>
                     <td><center><a href="<?php echo base_url();?>Dataentry/hapusUraian/<?php echo $perbaikan[$i]['id_perbaikan'];?>/<?php echo $entri[0]['nomor']?>"><button class="btn btn-inverse">Hapus</button></a></td>
                   </tr>
                  <?php 
                    }
                  ?>
              </tbody>
            </table> 
             <div class="form-actions">          
                  <a href="<?php echo base_url()?>Dataentry/gantiStatus/1/<?php echo $entri[0]['nomor']?>"><button type="button" class="btn btn-primary" id="tambah_uraian">Selesai</button></a>
             </div> 
          </div>
        </div>
      </div>
   </div>
<!-- AKHIR TABEL DATA URAIAN PEKERJAAN -->
</div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/codeseven/toastr.min.css" />
<script src="<?php echo base_url(); ?>js/codeseven/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>js/codeseven/toastr.js"></script>


<script type="text/javascript">

toastr.options.preventDuplicates = true;
toastr.options.timeOut = 500;

  $(document).ready(function(){
        $("#tambah_uraian").click(function(){
               var valid = 0;

               var pekerjaan = $("#uraian_pekerjaan").val();
               var quantity = $("#quantity").val();
               var satuan = $("#satuan").val();
               var keterangan = $("#keterangan").val();
               
               if(pekerjaan.length != 0 && quantity.length != 0 && satuan.length != 0 && keterangan.length != 0){
                  valid++;
               }

               if(valid == 1){
                   
                    $.post("<?php echo base_url();?>Dataentry/tambahUraian",{pekerjaan:pekerjaan,quantity:quantity,satuan:satuan,keterangan:keterangan,opk:<?php echo $entri[0]['nomor']?>},
                      function(data){
                        if(data == 1){
                            location.reload();
                        }
                        else{

                        }
                      });
               }
               else{
                  toastr.warning("Maaf data yang anda inputkan belum lengkap :(","DATA BELUM LENGKAP");
               }
        })
  })
</script>
