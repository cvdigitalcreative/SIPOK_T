<?php 

 class Operator extends CI_Controller{
   
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
   }

  public function _remap($act){
       if($this->session->userdata('id') != "" && $this->session->userdata('tipe_account') == 1){
          if($act == 1){
            $this->logoutProcess();
          }
          else if($act == "proses"){
             $this->proses();
          }
          else if($act == "selesai"){
              $this->selesai();
          }
          else if($act == "settingdata"){
            $this->setting_data();
          }
          else if($act == "ubah_data"){
             $this->ubah_data();
          }
          else if($act == "form_entri"){
             $this->form_entri();
          }
          else{
             $this->home();
          }
       }
       else{
         redirect();
       }
  }

    private function home(){ //MELIHAT DATA UTAMA UNTUK ADUAN
      $list_entri = $this->modelEntri->readDataAduan();
      $row_entri = $list_entri->result_array();
      
      $this->load->view("Operator/header",["model" => $this->modelAccount]);
      $this->load->view("sidebar",["side" => 1]);
      $this->load->view("Operator/Datautama/data_entry_aduan",["entri" => $row_entri]);
      $this->load->view("Operator/footer");
    }

    private function proses(){ //MELIHAT DATA UTAMA STATUS BELUM
      $list_perbaikan = $this->modelPerbaikan->readDataPerbaikanBelum();
      $row_perbaikan = $list_perbaikan->result_array();

      $this->load->view("Operator/header",["model" => $this->modelAccount]);
      $this->load->view("sidebar",["side" => 1]);
      $this->load->view("Operator/Datautama/data_entry_proses",["entri"=>$row_perbaikan]);
      $this->load->view("Operator/footer");
    }
    
     private function selesai(){ //MELIHAT DATA UTAMA STATUS PROSES
      $list_entri = $this->modelEntri->readDataSelesai();
      $row_entri = $list_entri->result_array();

      $this->load->view("Operator/header",["model" => $this->modelAccount]);
      $this->load->view("sidebar",["side" => 1]);
      $this->load->view("Operator/Datautama/data_entry_selesai",["entri" => $row_entri]);
      $this->load->view("Operator/footer");
    }

    private function ubah_data(){
      $account = $this->modelAccount->read("*","WHERE username='".$this->session->userdata('username')."'");

      $this->load->view("Operator/header",["model" => $this->modelAccount]);
      $this->load->view("sidebar",["side" => 1]);
      $this->load->view("Operator/ubah_data_opr",["account"=>$account]);
      $this->load->view("Operator/footer");
    }

    private function form_entri(){
       $list_user = $this->modelUser->read("DISTINCT cost_center,org_name","WHERE org_name LIKE 'DEP.%' OR org_name LIKE 'DEPARTEMEN%' OR org_name LIKE 'DIV.%' OR org_name LIKE 'DIVISI%' OR org_name LIKE 'DIREKTORAT%' OR org_name = 'PUPUK SRIWIDJAJA PALEMBANG' OR org_name = 'KOMITE AUDIT PSP' OR org_name = 'DEWAN KOMISARIS PSP'");
        $row_user = $list_user->result_array();

      $row_vendor = $this->modelVendor->read()->result_array();

      $this->load->view("Operator/header",["model" => $this->modelAccount]);
      $this->load->view("sidebar",["side" => 4]);
      $this->load->view("Operator/Form_entri",["user"=>$row_user,"vendor"=>$row_vendor]);
      $this->load->view("Operator/footer");
    }

    
    private function setting_data(){ //MENGATUR SETTING DATA
      redirect("Settingdata/dataKendaraan");
    }

  

    private function logoutProcess(){
      $this->session->sess_destroy();
      redirect();
    }

  

    
    }


?>