<?php 

 
 class Kendaraan extends CI_Model{
 	 var $no_inven;
 	 var $jenis_kendaraan;
 	 var $nomor_polisi;
 	 var $vendor;  //ID VENDOR
     
    public function read($row="*",$cond="",$tabel="kendaraan"){
      $sql = "SELECT ".$row." FROM ".$tabel." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function readMasterData(){ //METHOD UNTUK MEMBACA KE SETTING DATA MASTER DATA
      $sql = "SELECT * FROM kendaraan LEFT JOIN user ON kendaraan.id_user = user.id_user ORDER BY kendaraan.jenis_kendaraan";
      $query = $this->db->query($sql);
      return $query; 
   }

   public function readDatakeform($no_inventaris){ //METHOD UNTUK MEMBACA DATA SEWAKTU EDIT MASTER DATA
      $sql = "SELECT * FROM kendaraan a WHERE a.no_inventaris=?";
      $query = $this->db->query($sql,array($no_inventaris));
      return $query; 
   }


    function insert($no_inventaris,$jenis_kendaraan,$nomor_polisi,$id_unitkerja)
 	  {
 		  $sql = "INSERT INTO kendaraan(no_inventaris,jenis_kendaraan,no_polisi,id_unitkerja) VALUES (?,?,?,?)";
     	$query = $this->db->query($sql,array($no_inventaris,$jenis_kendaraan,$nomor_polisi,$id_unitkerja));
     	return $query;
    }

    function insertBaru($row,$value,$no_inven){
      $sql = "UPDATE kendaraan SET ".$row." = ? WHERE no_inventaris = ?";
      $query = $this->db->query($sql,array($value,$no_inven));
      return $query;
    }
    
    function insertKendaraan($no_inventaris,$jenis_kendaraan,$tahun,$nomor_polisi,$nomor_rangka,$nomor_mesin,$id_user)
    {
      $sql = "INSERT INTO kendaraan(no_inventaris,jenis_kendaraan,tahun,no_polisi,no_rangka,no_mesin,id_user) VALUES (?,?,?,?,?,?,?)";
      $query = $this->db->query($sql,array($no_inventaris,$jenis_kendaraan,$tahun,$nomor_polisi,$nomor_rangka,$nomor_mesin,$id_user));
      return $query;
    }

   

    function update($no_inventaris_baru,$jenis_kendaraan,$no_polisi,$no_inventaris_lama) 
     {
       $sql = "UPDATE kendaraan SET no_inventaris = ?,  jenis_kendaraan = ?, no_polisi = ?  WHERE no_inventaris = ?";
       $query = $this->db->query($sql,array($no_inventaris_baru,$jenis_kendaraan,$no_polisi,$no_inventaris_lama));
       return $query;
    }

    function updateKendaraan($no_inventaris_baru,$jenis_kendaraan,$tahun,$no_polisi,$no_rangka,$no_mesin,$id_user,$no_inventaris_lama) 
    {
       $sql = "UPDATE kendaraan SET no_inventaris = ?,  jenis_kendaraan = ?,tahun = ?, no_polisi = ?, no_rangka = ?, no_mesin = ?, id_user = ? WHERE no_inventaris = ?";
       $query = $this->db->query($sql,array($no_inventaris_baru,$jenis_kendaraan,$tahun,$no_polisi,$no_rangka,$no_mesin,$id_user,$no_inventaris_lama));
       return $query;
    }
    function delete($no_inventaris)
  {
      $sql = "DELETE FROM kendaraan WHERE no_inventaris = ?";
      $query = $this->db->query($sql,array($no_inventaris));
      return $query;
  }

 	 
 }



?>