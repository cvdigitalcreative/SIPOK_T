<div id="content">
  <div id="content-header">
    <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url();?>/Operator" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
    <h1>Riwayat Lama</h1>
  </div>
  <div class="container-fluid">
    <hr>
<!-- ADUAN DARI USE -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Riwayat Lama</h5>
          </div>
          <div class="widget-content">
             <table class="table table-bordered">
               <thead>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>No.OPK</th>
                  <th>Jenis Kerusakan dan Nama Spare Part</th>
                  <th>Biaya total OPK</th>
                  <th>Pleaner</th>          
               </thead>
               <tbody>
                  <?php 
                         $size = sizeof($entri);
                         for($i=0;$i<$size;$i++){ ?>
                          <tr>
                           <td style="text-align: center;"><?php echo $i+1; ?></td>
                           <td><center><?php echo $entri[$i]["tanggal"]; ?></center></td>
                           <td><center><?php echo $entri[$i]["opk"]; ?></center></td>
                           <td><center><?php echo $entri[$i]["pekerjaan_dan_nama_spare_part"]; ?></center></td>
                           <td><center><?php echo $entri[$i]["biaya_total_opk"]; ?></center></td>
                           <td><center><?php echo $entri[$i]["pleaner"]; ?></center></td>
                          </tr>
                   <?php      }
                  ?>
               </tbody>
             </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>