<?php 

  class User extends CI_Model{
  	 
  	 public function read($row="*",$cond="",$table="user"){
      $sql = "SELECT ".$row." FROM ".$table." ".$cond;
      $query = $this->db->query($sql);
      return $query; 
    }
    
     public function insertUser($cost_center,$org_name){
     	$sql = "INSERT INTO user(cost_center,org_name) VALUES (?,?)";
     	$query = $this->db->query($sql,array($cost_center,$org_name));
     	return $query;
     }

     public function updateUser($cost_center,$org_name,$org_name_lama){
     	$sql = "UPDATE user SET cost_center = ?, org_name = ? WHERE org_name = ?  ";
     	$query = $this->db->query($sql,array($cost_center,$org_name,$org_name_lama));
     	return $query;
     }

     public function delete($id_user)
  	 {
      $sql = "DELETE FROM user WHERE id_user = ?";
      $query = $this->db->query($sql,array($id_user));
      return $query;
  	 } 
  

}
?>