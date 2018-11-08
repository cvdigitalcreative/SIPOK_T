<?php 

 class Form_entri extends CI_Controller{
   
   var $modelKendaraan;
   var $modelEntri;
   var $modelAccount;

   public function __construct(){
      parent::__construct();
         $this->modelAccount = new Account();
          $this->modelAccount->fillAllData($this->session->userdata("tipe_account"),$this->session->userdata("username"),$this->session->userdata("foto"),$this->session->userdata("tipe_account"));

      $this->modelKendaraan = new Kendaraan();
      $this->modelEntri = new Entri();
      $this->modelVendor =  new Vendor();    
   }

  public function index(){

  }
    
   public function galihDatakeform(){  //METHOD INI UNTUK MENGAMBIL DATA KENDARAAN DAN MENAMPILKANNYA KE FORM
     if($this->session->userdata("tipe_account") == 1){
       $cost_center = $_POST['cost_center'];
       $list_kendaraan = $this->modelEntri->read("*","WHERE a.id_user = b.id_user AND b.cost_center = '".$cost_center."'","kendaraan a,user b");
       $row_kendaraan = $list_kendaraan->result_array();
       echo json_encode($row_kendaraan);
     }
     else{
      redirect("");
     }
   }

    public function tambah_entri_lama(){
       if($this->session->userdata("tipe_account") == 1){
            $obj = json_decode($_POST['myData']);
            $result = $this->modelEntri->insertEntriLama($obj->no_inventaris,$obj->opk,$obj->tanggal,$obj->upns,$obj->vendor,$obj->biaya_total);
            echo $result;
       }
       else{
         redirect("");
       }
    }

  
}

?>