<?php 

class Unit extends CI_Controller{
 
   var $modelKendaraan;
   var $modelUser;
   var $modelEntri;
   var $modelAccount;
   var $modelPerbaikan;

	  public function __construct(){
      parent::__construct();
      $this->modelAccount = new Account();
      $this->modelAccount->fillAllData($this->session->userdata("tipe_account"),$this->session->userdata("username"),$this->session->userdata("tipe_account"));

      $this->modelKendaraan = new Kendaraan();
      $this->modelUser = new User();
      $this->modelEntri = new Entri();
      $this->modelVendor =  new Vendor();
      $this->modelPerbaikan = new Perbaikan();
       $this->cekOPKSession();

   }
      

      public function _remap($act,$value){
         if($this->session->userdata('id') != "" && $this->session->userdata('tipe_account') == 2){
             if($act == 1){
               $this->logoutProcess();
              }
              elseif($act == 2){
                $this->form_entry();
              }
              elseif($act == 3){
                 $this->data_inventaris();
              }
              elseif($act == 4){
                 $this->data_cost_center();
              }
              elseif($act == 5){
                 $this->entriSelesai();
              }
              elseif($act == "ubah_data"){
                $this->ubah_data();
              }
              else{
                 $this->home();
              }
         }
         else{
         	$this->session->sess_destroy();
            redirect("Main");
         }
      }

     private function home(){ //MELIHAT DATA UTAMA UNTUK ADUAN
      $list_entri = $this->modelEntri->dataUser($this->session->userdata("username"));
      $row_entri  = $list_entri->result_array();

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 1]);
      $this->load->view("User/Home",["entri" => $row_entri]);
      $this->load->view("User/footer");
    }

    private function form_entry(){
   
      $list_user = $this->modelUser->read("*","WHERE cost_center='".$this->session->userdata("username")."'");
      $row_user = $list_user->result_array();

      $list_kendaraan = $this->modelEntri->read("*","WHERE a.id_user = b.id_user AND b.cost_center='".$this->session->userdata("username")."'"," kendaraan a,user b");
      $row_kendaraan = $list_kendaraan->result_array();

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 2]);
      $this->load->view("User/Form_entri",["user" => $row_user,"kendaraan"=>$row_kendaraan]);
      $this->load->view("User/footer");
    }

    private function data_inventaris(){
     
      $list_kendaraan = $this->modelKendaraan->read("*","WHERE a.id_user= b.id_user AND b.cost_center ='".$this->session->userdata("username")."'","kendaraan a,user b");
      $row_kendaraan = $list_kendaraan->result_array();

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 3]);
      $this->load->view("User/Inventaris",["kendaraan"=>$row_kendaraan]);
      $this->load->view("User/footer");
    }

    private function data_cost_center(){
   
      $list_user = $this->modelUser->read("*","WHERE cost_center='".$this->session->userdata("username")."'");
      $row_user = $list_user->result_array();

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 4]);
      $this->load->view("User/data_cost_center",["user" => $row_user]);
      $this->load->view("User/footer");
    }
    
     private function logoutProcess(){
       if($this->modelAccount->getIsLogin($this->session->userdata("username"))->result_array()[0]["islogin"] == 1){
         $this->modelAccount->setIsLogin(0,$this->session->userdata("username"));
         $this->session->unset_userdata("username");
         $this->session->unset_userdata("tipe_account");
         $this->session->unset_userdata("id");
         redirect();
      }
    }

    public function entriSelesai(){
      $list_user = $this->modelUser->read("*","WHERE a.id_user = b.id_user AND a.no_inventaris = c.no_inventaris AND b.cost_center='".$this->session->userdata("username")."' AND c.id_status = 2 ORDER BY c.tanggal DESC","kendaraan a,entri c,user b");
      $row_user = $list_user->result_array();

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 1]);
      $this->load->view("User/Entri_selesai",["entri" => $row_user]);
      $this->load->view("User/footer");
    }

    private function ubah_data(){
      $account = $this->modelAccount->read("*","WHERE username='".$this->session->userdata('username')."'");

      $this->load->view("User/header",["model" => $this->modelAccount]);
      $this->load->view("User/Sidebar",["side" => 1]);
      $this->load->view("User/ubah_data_usr",["account"=>$account]);
      $this->load->view("User/footer");
    }

    private function cekOPKSession(){
       $list_entri = $this->modelEntri->dataUser($this->session->userdata("username"));
       $row_entri  = $list_entri->result_array();
       
       $size = sizeof($row_entri);
       $notif = "false";
       
       $listOPK = $this->session->userdata("listopk");
       $size = sizeof($listOPK);
       
      
       for($i=0;$i<$size;$i++){
         if(!isset($row_entri[$i]['nomor'])){
            $notif = "true";
            $this->session->set_tempdata('notif','true');
         }
       }

       if($notif == "true"){
         $this->session->unset_userdata("listopk");
         $newArr = array();
         for($i=0;$i<sizeof($row_entri);$i++){
             array_push($newArr,$row_entri[$i]['nomor']);
         }
          $this->session->set_userdata("listopk",$newArr);
       }
    }

}



?>