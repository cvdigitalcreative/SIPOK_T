<?php 

class Tagihan extends CI_Model{

    public function read($row="*",$cond="",$tabel="tagihan"){
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }

     public function insert($row,$value){ //METHOD INSERT GENERAL
      $sql = "INSERT INTO tagihan(".$row.") VALUES(".$value.")";
      $query = $this->db->query($sql);
      return $query; 
    }

      public function insertKeRelasiTagihanEntri($row,$value){ //METHOD INSERT GENERAL
      $sql = "INSERT INTO relasi_entri_tagihan(".$row.") VALUES(".$value.")";
      $query = $this->db->query($sql);
      return $query; 
    }

     public function readKeRelasiTagihanEntri($row="*",$cond="",$tabel="relasi_entri_tagihan"){
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function readAgendaTagihan($cond){
      $sql = 'SELECT g.no_agenda,d.nama_vendor,d.id_vendor,GROUP_CONCAT(c.no_inventaris SEPARATOR "<br>") as no_inventaris,GROUP_CONCAT(c.biaya_total SEPARATOR "<br>") as biaya,GROUP_CONCAT(c.nama_user SEPARATOR ",<br>") as nama_user,GROUP_CONCAT(c.nomor SEPARATOR ",<br>") as opk,GROUP_CONCAT(DATE_FORMAT(c.tanggal, "%d-%m-%Y") SEPARATOR "<br>") as tanggal_spk,DATE_FORMAT(g.tanggal_tagihan, "%d-%m-%Y") as tanggal_tagihan,g.no_surat,g.biaya_total_tagihan FROM entri c,tagihan g,relasi_entri_tagihan h,vendor d WHERE c.id_vendor = d.id_vendor AND h.id_entri = c.nomor AND h.id_tagihan = g.id_tagihan '.$cond.' GROUP BY g.id_tagihan ORDER BY g.tanggal_tagihan DESC';

      $query = $this->db->query($sql);
      return $query; 

    }

}

?>
