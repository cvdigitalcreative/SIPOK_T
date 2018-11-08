<?php 

class Entri extends CI_Model{
	var $status;
	var $kerusakan;
	
     public function read($row="*",$cond="",$tabel="entri"){
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }
    
     public function insert($row,$value){ //METHOD INSERT GENERAL
      $sql = "INSERT INTO entri(".$row.") VALUES(".$value.")";
      $query = $this->db->query($sql);
      return $query; 
    }

    public function update($set){ //METHOD UPDATE GENERAL
      $sql = 'UPDATE entri SET '.$set;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function delete($nomor)
     {
      $sql = "DELETE FROM entri WHERE nomor = ?";
      $query = $this->db->query($sql,array($nomor));
      return $query;
     } 

    public function readDataSPK($opk){ //METHOD INI DIGUNAKAN KETIKA HENDAK AKAN MENCETAK DATA SPK DAN AKAN MERUBAHA STATUS MENJADI SELESAI
      
      $sql = 'SELECT * FROM entri c,kendaraan a,perbaikan e,user b ,vendor d WHERE c.nomor=? AND c.nomor = e.id_entri AND c.no_inventaris = a.no_inventaris AND a.id_user = b.id_user AND c.id_vendor = d.id_vendor AND c.id_status=1';  
      $query = $this->db->query($sql,array($opk));
      return $query;  
    }
   
   public function readDataAduan(){ //METHOD UNTUK MEMBACA DATA ADUAN DARI DATABASE
    $sql = 'SELECT * FROM kendaraan a, entri c ,user b WHERE a.no_inventaris = c.no_inventaris AND c.id_status = 0 AND a.id_user = b.id_user ORDER BY c.tanggal DESC';
     $query = $this->db->query($sql);
     return $query;
   }

   public function readDataByVendor($id_vendor){
     $sql = "SELECT c.tanggal,c.nomor,c.no_inventaris,d.nama_vendor,d.Alamat,d.No_telp,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan SEPARATOR '<br>') as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b ,vendor d WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 2 AND b.id_user = a.id_user AND d.id_vendor = c.id_vendor AND d.id_vendor =".$id_vendor." GROUP BY c.nomor ORDER BY c.tanggal DESC";
      $query = $this->db->query($sql);
     return $query;
   }

   public function readAllFinishedData(){
      $sql = 'SELECT c.tanggal,a.jenis_kendaraan,a.jenis_kendaraan,a.no_polisi,d.nama_vendor,c.nomor,c.no_inventaris,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan," (",e.quantity," ",e.satuan,")(",e.keterangan,")(",e.nama_spare_part,")" SEPARATOR ",<br>") as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b ,vendor d WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 2 AND b.id_user = a.id_user AND e.id_entri = c.nomor AND d.id_vendor = c.id_vendor GROUP BY c.nomor ORDER BY c.tanggal DESC';  
      $query = $this->db->query($sql);
      return $query; 
   }

   public function readAllFinishedDataFilter($awal,$akhir){
     $sql = 'SELECT c.tanggal,a.jenis_kendaraan,a.jenis_kendaraan,a.no_polisi,d.nama_vendor,c.nomor,c.no_inventaris,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan," (",e.quantity," ",e.satuan,")(",e.keterangan,")(",e.nama_spare_part,")" SEPARATOR ",<br>") as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b ,vendor d WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 2 AND b.id_user = a.id_user AND e.id_entri = c.nomor AND d.id_vendor = c.id_vendor AND DATE(c.tanggal) BETWEEN "'.$awal.'" AND "'.$akhir.'" GROUP BY c.nomor ORDER BY c.tanggal DESC';
     $query = $this->db->query($sql);
     return $query; 
   }

   public function readDataSelesai($tahun){ //METHOD UNTUK MENMAPILKAN DATA BELUM DARI DATABASE 
      $sql = "SELECT c.tanggal,c.nomor,c.no_inventaris,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan SEPARATOR '<br>') as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 2 AND c.tanggal LIKE '%".$tahun."%' AND b.id_user = a.id_user GROUP BY c.nomor ORDER BY c.tanggal DESC";  
      $query = $this->db->query($sql);
      return $query; 
   }

 
   public function dataLHPK($opk){ //METHOD UNTUK MEMBACA LHPK DIGUNAKAN KETIKA AKAN MENCETAK LHPK
     $sql='SELECT * FROM kendaraan a,user b,entri c,perbaikan e WHERE c.nomor = ? AND e.id_entri = c.nomor AND c.no_inventaris = a.no_inventaris AND a.id_user = b.id_user';
     $query = $this->db->query($sql,array($opk));
     return $query;
   }

    public function formEditLHPK($opk){//METHOD INI DIGUNAKAN KETIKA AKAN MENGUBAH DATA LHPK
     $sql='SELECT * FROM kendaraan a,user b,entri c,perbaikan e WHERE c.nomor = ? AND e.id_entri = c.nomor AND c.no_inventaris = a.no_inventaris AND a.id_user = b.id_user AND e.id_entri = c.nomor';
     $query = $this->db->query($sql,array($opk));
     return $query;
   }
    
    public function insertFile($nama,$file,$ekstensi,$size){
      $sql = 'INSERT INTO file(nama_file,ekstensi,file,ukuran) VALUES(?,?,?,?)';
      $query = $this->db->query($sql,array($nama,$ekstensi,$file,$size));
      return $query;
    }

    public function readFile($opk){ //METHOD UNTUK MENDOWNLOAD FILE
      $sql = 'SELECT f.ukuran,f.nama_file,f.ekstensi,f.file FROM entri c,file f WHERE c.id_file = f.id_file AND c.nomor = ?';
      $query = $this->db->query($sql,array($opk));
      return $query;
    }

    public function dataRiwayat($no_inven,$tahun,$bulan){  //METHOD UNTUK MENAMPILKAN DATA RIWAYAT KENDARAAN
      $sql = 'SELECT * FROM kendaraan a,user b,entri c,vendor d,perbaikan e WHERE a.no_inventaris = c.no_inventaris AND a.id_user = b.id_user AND e.id_entri = c.nomor AND c.id_vendor = d.id_vendor AND c.id_status = 2 AND c.no_inventaris = ? AND YEAR(c.tanggal) LIKE "%'.$tahun.'%" AND MONTH(c.tanggal) LIKE "%'.$bulan.'%" ORDER BY c.tanggal desc';
      $query = $this->db->query($sql,array($no_inven));
      return $query;
    }

    public function readNotaVendor($nomor){
      $sql = "SELECT c.tanggal,c.nomor,c.aduan,c.biaya_total,c.no_inventaris,a.no_polisi,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan SEPARATOR '<br>') as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 2 AND c.tanggal AND b.id_user = a.id_user AND c.nomor = ? GROUP BY c.nomor ORDER BY c.tanggal DESC";
      $query = $this->db->query($sql,array($nomor));
      return $query; 
    }

    public function insertEntriLama($inventaris,$opk,$tanggal,$upns,$vendor,$biaya_total){
        $sql = "INSERT INTO entri_lama(opk,inventaris,tanggal,pekerjaan_dan_nama_spare_part,biaya_total_opk,pleaner) VALUES (?,?,?,?,?,?)";
        $query = $this->db->query($sql,array($opk,$inventaris,$tanggal,$upns,$biaya_total,$vendor));
        return $query;
    }

    public function readEntriLama($no_inventaris){
       $sql = 'SELECT * FROM entri_lama WHERE inventaris=? ORDER BY tanggal ASC';
       $query = $this->db->query($sql,array($no_inventaris));
       return $query;
    }

// ------------------------------------------------------------------- USER ---------------------------------------------------//

    public function dataUser($cost_center){ //METHOD UNTUK MENAMPILKAN DATA KETIKA USER BERADA DI HOME
          $sql = 'SELECT * FROM entri c,kendaraan a,user b WHERE b.id_user = a.id_user AND c.no_inventaris = a.no_inventaris AND b.cost_center = ? AND c.id_status != 2 ORDER BY c.id_status ASC,c.tanggal DESC';
          $query = $this->db->query($sql,array($cost_center));
          return $query;
    }

 
}



?>