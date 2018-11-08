<?php 

class Account extends CI_Model{
    
    var $id_account;
    var $username;
    var $password;
    var $foto;
    var $tipe;
    
    public function read($row="*",$cond=""){
      $sql = "SELECT ".$row." FROM account ".$cond;
      $query = $this->db->query($sql);
      $row = $query->row();
      return $row; 
    }

     public function readAll($row,$cond){
      $sql = "SELECT ".$row." FROM account ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }

    public function readLogin($username,$password){ //Method Query Untuk Login
      $sql = "SELECT * FROM account WHERE username=? AND password =?";
      $query = $this->db->query($sql,array($username,$password));
      $row = $query->num_rows();
      
      if($row > 0){

         return 1;
      }
      else{
         return 0;
      }

    }

    public function getUsername(){
       return $this->username;   
    }

    public function getIdAccount(){
      return $this->id_account;
    }

    public function fillAllData($id,$username,$tipe){
       $this->id_account = $id;
       $this->username = $username;
       $this->tipe = $tipe;
    }

      public function ubah_password($new,$usr){
       $sql = "UPDATE account SET password = ? WHERE username = ?";
       $query = $this->db->query($sql,array($new,$usr));
       return $query;
    }
  
// ------------------------------------------------------------------------------- USER -----------------------------------------------

    public function setIsLogin($count,$username){
      $sql = "UPDATE account SET islogin = ".$count." WHERE username='".$username."'";
      $query = $this->db->query($sql);
      return $query;
    } 

    public function getIsLogin($username){
      $sql = "SELECT * FROM account WHERE username='".$username."'";
      $query = $this->db->query($sql);
      return $query;
    }

 
}


?>