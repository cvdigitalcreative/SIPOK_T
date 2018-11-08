<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current"></a> </div>
    <h1>Perubahan Data LHPK</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Data LHPK</h5>
          </div>
          <div class="widget-content">
          <table class="table table-bordered">
            <a href="<?php echo base_url();?>Dataentry/cetakLHPK/<?php echo $entri[0]['nomor']?>"><i class="icon-print"></i> LHPK</a>
            <tr>
              <th>NO</th>
              <th>URAIAN PEKERJAAN</th>
              <th>QUANTITY</th>
              <th>SATUAN</th>
              <th>KETERANGAN</th>
              <th>NAMA SPARE PART</th>
              <th>AKSI</th>
            </tr>
          <!-- <?php var_dump($entri); ?> -->
          <?php $size = sizeof($entri);
            for($i=0;$i<$size;$i++){
          ?> 
            <tr>
              <td><center><?php echo $i+1;?></td>
              <td><center><?php echo $entri[$i]['pekerjaan'];?></td>
              <td><center><?php echo $entri[$i]['quantity'];?></td>
              <td><center><?php echo $entri[$i]['satuan'];?></td>
              <td><center><?php echo $entri[$i]['keterangan'];?></td>
              <td><center><?php echo $entri[$i]['nama_spare_part'];?></td>
              <td><center><button class="btn btn-primary" id="edit<?php echo $i;?>" value="<?php echo $entri[$i]['id_perbaikan']?>">Edit</button><button class="btn btn-danger" id="hapus<?php echo $i;?>" value="<?php echo $entri[$i]['id_perbaikan']?>">Hapus</button></td>
            </tr>
          <?php }?>
          </table>
          <button id="tambah" class="btn btn-success">Tambah</button>
          <button id="sb_tambah" class="btn btn-danger">Sembunyikan</button>
          </div>
        </div>
      </div>
    </div>
<!-- FORM PENAMBAHAN DATA LHPK -->
     <div class="row-fluid" id="form_tambah">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Form Penambahan Data LHPK</h5>
          </div>
          <div class="widget-content">
           <form class="form-horizontal">

                 <div class="control-group">
                             <label class="control-label">Pekerjaan :</label>
                                  <div class="controls">
                                     <input type="text"  id="uraian_pekerjaan" class="span11" placeholder="Masukkan Uraian Pekerjaan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Quantity :</label>
                                  <div class="controls">
                                     <input type="text" id="quantity" class="span11" placeholder="Masukkan Quantity" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Satuan :</label>
                                  <div class="controls">
                                     <input type="text" id="satuan"  class="span11" placeholder="Masukkan Satuan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Keterangan :</label>
                                  <div class="controls">
                                     <input type="text" id="keterangan" class="span11" placeholder="Masukkan Keterangan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Nama Spare Part :</label>
                                  <div class="controls">
                                     <input type="text"  id="nama_spare_part" class="span11" placeholder="Masukkan Nama Spare Part" />
                                 </div>
                  </div>
                  <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_data_lhpk">Kirim</button>
                              <input type="reset" name="" class="btn btn-warning">
                  </div> 
           </form>
          </div>
        </div>
      </div>
    </div>
<!-- AKHIR FORM PENAMBAHAN DATA LHPK -->
<!-- FORM PERUBAHAN DATA LHPK -->
   <div class="row-fluid" id="form_edit">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Form Perubahan Data LHPK</h5>
          </div>
          <div class="widget-content">
              <form class="form-horizontal">
                  <div class="control-group">
                             <label class="control-label">Pekerjaan :</label>
                                  <div class="controls">
                                     <input type="text"  id="pekerjaan_u" class="span11" placeholder="Masukkan Uraian Pekerjaan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Quantity :</label>
                                  <div class="controls">
                                     <input type="text"  id="quantity_u" class="span11" placeholder="Masukkan Quantity" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Satuan :</label>
                                  <div class="controls">
                                     <input type="text"  id="satuan_u" class="span11" placeholder="Masukkan Satuan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Keterangan :</label>
                                  <div class="controls">
                                     <input type="text" id="keterangan_u" class="span11" placeholder="Masukkan Keterangan" />
                                 </div>
                  </div>

                  <div class="control-group">
                             <label class="control-label">Nama Spare Part :</label>
                                  <div class="controls">
                                     <input type="text" id="nama_spare_part_u" class="span11" placeholder="Masukkan Nama Spare Part" />
                                 </div>
                  </div>
                  <div class="form-actions">            
                              <button type="button" class="btn btn-success" id="kirim_update_data_lhpk">Kirim</button>
                             <button type="button" class="btn btn-danger" id="batal_update">Batal</button>
                  </div> 
              </form>
          </div>
          </div>
        </div>
  </div>
<!-- AKHIR FORM PERUBAHAN DATA LHPK -->
  </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      data_lama = "";
      size = <?php echo $size; ?>;
      for(let i=0; i<size; i++){
          $("#edit"+i).click(function(){
             // alert$("#hapus"+i).val();
               $.ajax({
                                type  : "post",
                              dataType: "json",
                                url   : "<?php echo base_url();?>Dataentry/hapusDataUraianLHPK",
                                data  : { myData : $("#edit"+i).val() },
                         beforeSubmit : function(data){ },
                              success : function(data){
                                         data_lama = data ; 
                                         // console.log(data[0].pekerjaan);
                                         $("#form_edit").fadeIn();
                                         $("#pekerjaan_u").attr("value",data[0].pekerjaan);
                                         $("#quantity_u").attr("value",data[0].quantity);
                                         $("#satuan_u").attr("value",data[0].satuan);
                                         $("#keterangan_u").attr("value",data[0].keterangan);
                                         $("#nama_spare_part_u").attr("value",data[0].nama_spare_part);
                              },
                              error   : function (request) {
           
                                      }
                    })  
          })

          $("#hapus"+i).click(function(){
             size = <?php echo $size?>;
             if(size == 1){
                alert("Uraian tidak diperkenankan kosong");
             }
             else{
               $.post("<?php echo base_url();?>Dataentry/editDeleteUraian",{id_perbaikan:$("#hapus"+i).val()},
                      function(data){
                        if(data == 1){
                            location.reload();
                        }
                        else{

                        }
                      });
             } 
          })
      }

      $("#kirim_data_lhpk").click(function(){
               var valid = 0;

               var pekerjaan = $("#uraian_pekerjaan").val();
               var quantity = $("#quantity").val();
               var satuan = $("#satuan").val();
               var keterangan = $("#keterangan").val();
               var nama_spare_part = $("#nama_spare_part").val()
               
               if(pekerjaan.length != 0 && quantity.length != 0 && satuan.length != 0 && keterangan.length != 0 && nama_spare_part.length != 0){
                  valid++;
               }

               if(valid == 1){
                   
                    $.post("<?php echo base_url();?>Dataentry/editTambahUraian",{pekerjaan:pekerjaan,quantity:quantity,satuan:satuan,keterangan:keterangan,nama_spare_part:nama_spare_part,opk:<?php echo $entri[0]['nomor']?>},
                      function(data){
                        if(data == 1){
                            location.reload();
                        }
                        else{

                        }
                      });
               }
               else{
                  alert("data belum lengkap");
               }
        })

      $("#kirim_update_data_lhpk").click(function(){
               var valid = 0;

               var pekerjaan = $("#pekerjaan_u").val();
               var quantity = $("#quantity_u").val();
               var satuan = $("#satuan_u").val();
               var keterangan = $("#keterangan_u").val();
               var nama_spare_part = $("#nama_spare_part_u").val();
               var pekerjaan_lama = data_lama[0].pekerjaan;

               if(pekerjaan.length != 0 && quantity.length != 0 && satuan.length != 0 && keterangan.length != 0 && nama_spare_part.length != 0){
                  valid++;
               }

                if(valid == 1){
                   
                    $.post("<?php echo base_url();?>Dataentry/editUpdateUraian",{pekerjaan:pekerjaan,quantity:quantity,satuan:satuan,keterangan:keterangan,nama_spare_part:nama_spare_part,opk:<?php echo $entri[0]['nomor']?>,pekerjaan_lama:pekerjaan_lama},
                      function(data){
                        if(data == 1){
                            location.reload();
                        }
                        else{

                        }
                      });
               }
               else{
                  alert("data belum lengkap");
               }
      });

      $("#form_tambah").hide();
      $("#form_edit").hide();
      $("#sb_tambah").hide();

      $("#tambah").click(function(){
          $("#form_tambah").fadeIn();
          $("#tambah").hide();
          $("#sb_tambah").show();
       })

       $("#sb_tambah").click(function(){
          $("#form_tambah").fadeOut();   
          $("#tambah").show();
          $("#sb_tambah").hide();
       })

       $("#batal_update").click(function(){
          $("#form_edit").fadeOut();
       })
   })
</script>