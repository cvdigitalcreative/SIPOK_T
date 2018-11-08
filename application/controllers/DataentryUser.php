<?php 

class DataentryUser extends CI_Controller{
 
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
      

     public function index(){
        redirect("");
     }

     public function editAduan($opk){
       if($this->session->userdata("tipe_account") == 2){
           $list_user = $this->modelUser->read("*","WHERE cost_center='".$this->session->userdata("username")."'");
           $row_user = $list_user->result_array();

           $list_kendaraan = $this->modelEntri->read("*","WHERE a.id_user = b.id_user AND b.cost_center='".$this->session->userdata("username")."'"," kendaraan a,user b");
           $row_kendaraan = $list_kendaraan->result_array();

           $list_entri = $this->modelEntri->read("*","WHERE nomor=".$opk);
           $row_entri = $list_entri->result_array();

           $this->load->view("User/header",["model" => $this->modelAccount]);
           $this->load->view("User/Sidebar",["side" => 1]);
           $this->load->view("User/Edit_Aduan",["entri" => $row_entri, "user" => $row_user,"kendaraan"=>$row_kendaraan]);
           $this->load->view("User/footer");
       }
       else{
         redirect("");
       }
     }

      public function hapusAduan($opk){
       if($this->session->userdata("tipe_account") == 2){
           $list_user = $this->modelUser->read("*","WHERE cost_center='".$this->session->userdata("username")."'");
           $row_user = $list_user->result_array();

           $list_kendaraan = $this->modelEntri->read("*","WHERE a.id_user = b.id_user AND b.cost_center='".$this->session->userdata("username")."'"," kendaraan a,user b");
           $row_kendaraan = $list_kendaraan->result_array();

           $list_entri = $this->modelEntri->read("*","WHERE nomor=".$opk);
           $row_entri = $list_entri->result_array();

           $this->load->view("User/header",["model" => $this->modelAccount]);
           $this->load->view("User/Sidebar",["side" => 1]);
           $this->load->view("User/hapus_aduan",["entri" => $row_entri, "user" => $row_user,"kendaraan"=>$row_kendaraan]);
           $this->load->view("User/footer");
       }
       else{
         redirect("");
       }
     }


      public function riwayat($no_inven,$tahun="",$bulan=""){ //METHOD UNTUK MELIHAT RIWAYAT KENDARAAN BERDASARKAN INVENTARIS
         if($this->session->userdata("tipe_account") == 2){
              $list_tahun = $this->modelEntri->read("DISTINCT(YEAR(tanggal)) AS tahun","WHERE no_inventaris='".$no_inven."' AND id_status = 2");
              $row_tahun = $list_tahun->result_array();

             $list_entri = $this->modelEntri->dataRiwayat($no_inven,$tahun,$bulan);
             $row_entri = $list_entri->result_array();
              
             $this->load->view("User/header",["model" => $this->modelAccount]);
             $this->load->view("User/Sidebar",["side" => 3]);
             $this->load->view("User/Riwayat",["entri"=>$row_entri,"tahun"=>$row_tahun,"tahun_filter"=>$tahun,"bulan_filter"=>$bulan,"inven"=>$no_inven]);
             $this->load->view("User/footer");

         }
         else{
           redirect("");
         }
    }

     public function lihatInventaris($no_inven){
       if($this->session->userdata("tipe_account") == 2){

       }
       else{
         redirect("");
       }
     }

     public function ubah_data(){
       $obj = json_decode($_POST['myData']);
       
       $id = $obj->id_account;
       $username      = $obj->username;
       $pass_lama     = $obj->password_lama;
       $pass_baru     = $obj->password_baru;
       $pass_lama_md5 = md5($pass_lama);
       $pass_baru_md5 = md5($pass_baru);

       $password_l = $this->modelAccount->read("password","WHERE username = '".$username."'")->password;
       if($password_l == $pass_lama_md5){
          $query1 = $this->modelAccount->ubah_password($pass_baru_md5,$username);
          echo 1;
       }else{
          echo 2;
       }

     }


     public function lihatDataProses($opk){
        if($this->session->userdata("tipe_account") == 2){
           $list_entri = $this->modelEntri->readDataSPK($opk);
           $row_entri = $list_entri->result_array();

           $this->load->view("User/header",["model" => $this->modelAccount]);
           $this->load->view("User/Sidebar",["side" => 1]);
           $this->load->view("User/lihatproses",["entri" => $row_entri]);
           $this->load->view("User/footer");
       }
       else{
         redirect("");
       }
     }

      public function tambahData(){
      if($this->session->userdata("tipe_account")==2){
          $obj = json_decode($_POST['myData']);
          
          $user          = $obj->user;
          $no_inventaris = $obj->no_inventaris;
          $ekstensi      = $obj->ekstensi;
          $kerusakan     = $obj->kerusakan;

          $query1 = $this->modelEntri->read("COUNT(no_inventaris) as ada","WHERE no_inventaris = '".$no_inventaris."' AND id_status = '0'")->result_array()[0]["ada"];
          $query3 = $this->modelEntri->read("COUNT(no_inventaris) as ada","WHERE no_inventaris = '".$no_inventaris."' AND id_status = '1'")->result_array()[0]["ada"];

          if($query1 == 0 && $query3 == 0){
            $query2 = $this->modelEntri->insert("aduan,no_inventaris,no_ex,nama_user","'".$kerusakan."', '".$no_inventaris."','".$ekstensi."', '".$user."'");
            if($query2 == 1){
              $result= $this->modelEntri->update("tanggal = NOW() WHERE nomor=".$this->db->insert_id());

              $this->session->unset_userdata("listopk");
              $list_entri = $this->modelEntri->dataUser($this->session->userdata("username"));
              $row_entri  = $list_entri->result_array();
              $listOPK = array();
              $size = sizeof($row_entri);
              for($i=0;$i<$size;$i++){
                array_push($listOPK,$row_entri[$i]["nomor"]);
              }
              $this->session->set_userdata("listopk",$listOPK);
            }
            echo 1;
          }else{
            echo 2;
          }
      }else{
        redirect("");
      }
     }

      public function editData(){
      if($this->session->userdata("tipe_account")==2){
          $obj = json_decode($_POST['myData']);
          
          $user          = $obj->user;
          $no_inventaris = $obj->no_inventaris;
          $no_inventaris_l = $obj->no_inventaris_l;
          $ekstensi      = $obj->ekstensi;
          $kerusakan     = $obj->kerusakan;
          $opk           = $obj->opk;

          if($no_inventaris == $no_inventaris_l){
             $query1 = $this->modelEntri->update("nama_user = '".$user."', no_inventaris= '".$no_inventaris."', no_ex = '".$ekstensi."', aduan = '".$kerusakan."' WHERE nomor = '".$opk."'");
             echo 1;
          }
          else{
              $query1 = $this->modelEntri->read("COUNT(no_inventaris) as ada","WHERE no_inventaris = '".$no_inventaris."' AND id_status = '0'")->result_array()[0]["ada"];
          $query3 = $this->modelEntri->read("COUNT(no_inventaris) as ada","WHERE no_inventaris = '".$no_inventaris."' AND id_status = '1'")->result_array()[0]["ada"];

          if($query1 == 0 && $query3 == 0){
              $query1 = $this->modelEntri->update("nama_user = '".$user."', no_inventaris= '".$no_inventaris."', no_ex = '".$ekstensi."', aduan = '".$kerusakan."' WHERE nomor = '".$opk."'");
          }else{ echo 2; }



         if($query1 == 1)
         {
          echo 1;
         }
          }

      }else{
        redirect("");
      }
     }

     public function hapusData(){
       if($this->session->userdata("tipe_account") == 2){
           $nomor = $_POST["mydata"];
           $query1 = $this->modelEntri->delete($nomor);
           if($query1 == 1){
             $this->session->unset_userdata("listopk");
              $list_entri = $this->modelEntri->dataUser($this->session->userdata("username"));
              $row_entri  = $list_entri->result_array();
              $listOPK = array();
              $size = sizeof($row_entri);
              for($i=0;$i<$size;$i++){
                array_push($listOPK,$row_entri[$i]["nomor"]);
              }
              $this->session->set_userdata("listopk",$listOPK);
             echo 1;
           }else{
             echo 2;
           }
       }
       else{
            redirect("");
       }
     }
    
}



?>