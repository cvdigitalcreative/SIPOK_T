<?php 


class Main extends CI_Controller{
    
   var $modelAccount;
   var $modelEntri;
   
   function __construct(){
      parent::__construct();
       $this->modelEntri = new Entri();
       $this->modelAccount = new Account();
   }
   
   function _remap($action){ //keluar masuk aplikasi
      if($action == 1){
          $this->loginProcess();
       }
       else{
             if($this->session->userdata('id')!=null){
              echo $this->session->userdata('id');
                 if($this->session->userdata('tipe_account') == 1){
                     $this->modelAccount->fillAllData($this->session->userdata("id"),$this->session->userdata("username"),$this->session->userdata("tipe_account"));

                     redirect("Operator");
                 }
                 else if($this->session->userdata('tipe_account') == 2){
                     $this->modelAccount->fillAllData($this->session->userdata("id"),$this->session->userdata("username"),$this->session->userdata("tipe_account"));

                     redirect("Unit");
                 }
             }
             else{
                $this->load->view("login.php");
             }
       }
   }

   public function index($action=''){
       
   }

   private function loginProcess(){ //method untuk memproses login
       $username = $_POST["usr"];
       $password = $_POST["pass"];
       $pass_md5 = md5($password);

       if($this->account->readLogin($username,$pass_md5) > 0){
          $row = $this->account->read("*","WHERE username='".$username."'");
          $datasession = array("id"=>$row->id_account,
                               "username"=>$row->username,
                               "tipe_account"=>$row->tipe_account);
          $this->session->set_userdata($datasession); // aktifkan session
       }

       if($this->account->readLogin($username,$pass_md5) == 1 && $this->session->userdata("tipe_account") == 1){
          echo 1;
       }
       else if($this->account->readLogin($username,$pass_md5) == 1 && $this->session->userdata("tipe_account") == 2){
          
          $islogin = $this->modelAccount->getIsLogin($this->session->userdata("username"))->result_array()[0]["islogin"];
          $this->modelAccount->setIsLogin(1,$this->session->userdata("username"));

          if($this->session->userdata("listopk") == NULL || $this->session->userdata('username') != $this->session->userdata('whologin')){
            $this->session->unset_userdata("listopk");
            $this->session->unset_userdata("whologin");
            $list_entri = $this->modelEntri->dataUser($this->session->userdata("username"));
            $row_entri = $list_entri->result_array();
            $listOPK=array();
            $size =  sizeof($row_entri);
            for($i=0;$i<$size;$i++){
              array_push($listOPK,$row_entri[$i]["nomor"]);
            }
            $this->session->set_userdata("listopk",$listOPK);
            $this->session->set_userdata("whologin",$this->session->userdata('username'));
          }
          echo 2;
       }
   }

}



?>