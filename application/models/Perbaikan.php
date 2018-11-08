<?php 

class Perbaikan extends CI_Model{
	var $status;
	var $kerusakan;
	
     public function read($row="*",$cond="",$tabel='perbaikan'){ //METHOD READ GENERAL
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function insert($row,$value){ //METHOD INSERT GENERAL
      $sql = "INSERT INTO perbaikan(".$row.") VALUES(".$value.")";
      $query = $this->db->query($sql);
      return $query; 
    }

    public function delete($id_perbaikan){ //METHOD UNTUK MENGHAPUS
      $sql = "DELETE FROM perbaikan WHERE id_perbaikan=".$id_perbaikan;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function update($set){ //METHOD UPDATE GENERAL
      $sql = 'UPDATE perbaikan SET '.$set;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function readDataPerbaikanBelum(){ //METHOD UNTUK MEMBACA DATA BELUM 
    $sql = "SELECT c.tanggal,c.nomor,c.no_inventaris,c.nama_user,b.cost_center,c.no_ex,GROUP_CONCAT(e.pekerjaan SEPARATOR '<br>') as pekerjaan FROM entri c,perbaikan e,kendaraan a,user b WHERE c.nomor = e.id_entri AND a.no_inventaris = c.no_inventaris AND c.id_status = 1 AND b.id_user = a.id_user GROUP BY c.nomor ORDER BY c.tanggal DESC";
     $query = $this->db->query($sql);
     return $query;
   }   


   
}
?>