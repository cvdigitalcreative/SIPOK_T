<?php 

class Vendor extends CI_Model{
	 
	public function read($row="*",$cond="",$tabel="vendor"){
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }
   

   public function readMasterData(){ //METHOD UNTUK MMEBACA DATA VENDOR BESERTA JUMLAH BIAYA PERBAIKANNYA
      $sql = "SELECT vendor.id_vendor,vendor.nama_vendor,vendor.Alamat,vendor.No_telp,SUM(entri.biaya_total) FROM vendor LEFT JOIN entri ON vendor.id_vendor = entri.id_vendor GROUP BY vendor.id_vendor ORDER BY SUM(entri.biaya_total) DESC";
      $query = $this->db->query($sql);
      return $query; 
   }

	 public function tambahVendor($vendor,$alamat,$no_telp){
       $sql = 'INSERT INTO vendor(nama_vendor,Alamat,No_telp) VALUES(?,?,?)';
       $query = $this->db->query($sql,array($vendor,$alamat,$no_telp));
       return $query;
	 }

	  public function updateVendor($nama_vendor,$alamat_vendor,$no_telp_vendor,$nama_vendor_lama){
       $sql = 'UPDATE vendor SET nama_vendor = ?, Alamat = ?, No_telp = ? WHERE nama_vendor = ?';
       $query = $this->db->query($sql,array($nama_vendor,$alamat_vendor,$no_telp_vendor,$nama_vendor_lama));
       return $query;
   }

   public function delete($vendor){
         $sql = "DELETE FROM vendor WHERE id_vendor = ?";
         $query = $this->db->query($sql,array($vendor));
         return $query;
   }
} 

?>