<?php 

  $size = sizeof($tagihan);

?>
<div id="content">
  <div id="content-header">
    <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
    <h1>Agenda Tagihan</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
         
         <input type="date" value="<?php echo $waktu1; ?>" id="waktu1" name=""> s.d. <input type="date" value="<?php echo $waktu2; ?>" id="waktu2" name="">
            <input type="number" id="no_agenda" name="" value="<?php echo $no_agenda; ?>" placeholder="Cari Nomor Agenda Juga?">
          <button style="margin-top: -10px;
               margin-left: 10px;" id="cari" class="btn btn-danger">cari</button>
           <button style="margin-top: -10px;
               margin-left: 10px;" id="refresh" class="btn btn-warning">refresh table</button>

          <br>
        <?php 
           if($this->session->tempdata("notif") != NULL){
        ?>
            <div  id="addnotif" class="alert alert-success alert-block" hidden> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Tagihan Perbaikan Berhasil di Tambahkan!</h4>
         </div>
        <?php
              $this->session->unset_tempdata("notif");
           }
        ?>   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>E-book Agenda Tagihan</h5>
          </div>
          <div class="widget-content">
              <table class="table table-bordered data-table">
                <thead>
                   <th>Nomor</th>
                   <th>No. Agenda</th>
                   <th>ATPM</th>
                   <th>No.Inventaris</th>
                   <th>Biaya</th>
                   <th>User</th>
                   <th>OPK</th>
                   <th style="width: 58px;">Tanggal SPK</th>
                   <th>No.Surat</th>
                   <th>Tanggal Tagihan</th>
                   <th>Biaya Total Perbaikan</th>
                </thead>
                <tbody>
                  <?php 
                     for($i=0;$i<$size;$i++){?>
                       <tr>
                         <td style="text-align: center;"><?php echo $i+1; ?></td>
                         <td><center><?php echo $tagihan[$i]["no_agenda"]; ?></center></td>
                         <td><a href="<?php echo base_url()?>Dataentry/entryByVendor/<?php echo $tagihan[$i]['id_vendor']?>"><?php echo $tagihan[$i]["nama_vendor"]; ?></a></td>
                         <td><?php echo $tagihan[$i]["no_inventaris"]; ?></td>
                         <td><?php echo $tagihan[$i]["biaya"]; ?></td>
                         <td><?php echo $tagihan[$i]["nama_user"]; ?></td>
                         <td><center><?php echo $tagihan[$i]["opk"]; ?></center></td>
                         <td><?php echo $tagihan[$i]["tanggal_spk"]; ?></td>
                         <td><?php echo $tagihan[$i]["no_surat"]; ?></td>
                         <td><center><?php echo $tagihan[$i]["tanggal_tagihan"]; ?></center></td>
                         <td><?php echo number_format($tagihan[$i]["biaya_total_tagihan"],0,".","."); ?></td>
                       </tr>
                     <?php
                     }
                  ?>
                </tbody>
              </table>
          </div>
      </div>
      <button class="btn btn-success" id="cetak_agenda_tagihan" >cetak</button>

      <div class="widget-box" hidden>
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>E-book Agenda Tagihan</h5>
          </div>
          <div class="widget-content">
            <div id="agenda_tagihan">
              <h2>Agenda Tagihan</h2>
              <?php 
                     if($waktu1 != "none" && $waktu2 != "none"){
                       $createDate1 = new DateTime( $waktu1); 
                          $strip1 = $createDate1->format('d-m-Y');

                     $createDate2 = new DateTime( $waktu2); 
                          $strip2 = $createDate2->format('d-m-Y');
              ?>
                    <p><?php echo $strip1?> s.d. <?php echo $strip2?></p>
              <?php
                     }
              ?>
              <table border="1" cellspacing="2" cellpadding="5">
                <thead>
                   <th>Nomor</th>
                   <th>No. Agenda</th>
                   <th>ATPM</th>
                   <th>No.Inventaris</th>
                   <th>Biaya</th>
                   <th>User</th>
                   <th>OPK</th>
                   <th style="width: 80px;">Tanggal SPK</th>
                   <th>No.Surat</th>
                   <th>Tanggal Tagihan</th>
                   <th>Biaya Total Perbaikan</th>
                </thead>
                <tbody>
                  <?php 
                     for($i=0;$i<$size;$i++){?>
                       <tr>
                         <td style="text-align: center;"><?php echo $i+1; ?></td>
                         <td><center><?php echo $tagihan[$i]["no_agenda"]; ?></center></td>
                         <td><?php echo $tagihan[$i]["nama_vendor"]; ?></td>
                         <td><?php echo $tagihan[$i]["no_inventaris"]; ?></td>
                         <td><?php echo $tagihan[$i]["biaya"]; ?></td>
                         <td><?php echo $tagihan[$i]["nama_user"]; ?></td>
                         <td><center><?php echo $tagihan[$i]["opk"]; ?></center></td>
                         <td><?php echo $tagihan[$i]["tanggal_spk"]; ?></td>
                         <td><?php echo $tagihan[$i]["no_surat"]; ?></td>
                         <td><center><?php echo $tagihan[$i]["tanggal_tagihan"]; ?></center></td>
                         <td><?php echo number_format($tagihan[$i]["biaya_total_tagihan"],0,".","."); ?></td>
                       </tr>
                     <?php
                     }
                  ?>
                </tbody>
              </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    

     $("#cari").click(function(){
        waktu1 = $("#waktu1").val();
        waktu2 = $("#waktu2").val();
        noagenda = $("#no_agenda").val();
        
        err = 0;
        if(waktu1 != "" && waktu2 == ""){
            alert("rentang waktu harus valid ");
            err++;
        }
        else if(waktu1 == "" && waktu2 != ""){
           alert("rentang waktu harus valid ");
           err++;
        }
        else if(waktu1 == "" && waktu2 == ""){
           waktu1 = "none";
           waktu2 = "none";
        }

        if(err == 0){
           window.location.href="<?php echo base_url()?>Dataentry/agendatagihan/"+waktu1+"/"+waktu2+"/"+noagenda;
        }
     })
     $("#cetak_agenda_tagihan").click(function(){
                   w=window.open();
                   w.document.write($('#agenda_tagihan').html());
                   w.print();
                   w.close(); 
     })
     $("#refresh").click(function(){
         window.location.href="<?php echo base_url()?>Dataentry/agendatagihan/";
     })
  })
</script>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.js"></script> 
<script src="<?php echo base_url(); ?>js/matrix.tables.js"></script>