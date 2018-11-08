<?php 

class Settingdata extends CI_Controller{
   
   var $modelKendaraan;
   var $modelEntri;
   var $modelUser;
   var $modelAccount;
   var $modelVendor;

   var $offsetBelum ;
   var $offsetProses;
   var $offsetClose;

   public function __construct(){
        parent::__construct();
      $this->modelAccount = new Account();
      $this->modelEntri = new Entri();
      $this->modelKendaraan = new Kendaraan();
      $this->modelUser = new User();
      $this->modelVendor = new Vendor();
      $this->modelAccount->fillAllData($this->session->userdata("tipe_account"),$this->session->userdata("username"),$this->session->userdata("tipe_account"));
   }
     
     public function dataKendaraan($no_inventaris = ""){ //METHOD UNTUK MELIHAT DATA DATA KENDARAAN
       if($this->session->userdata("tipe_account") == 1){ //HARUS OPERATOR
         
         $list_user = $this->modelUser->read("DISTINCT cost_center,org_name","WHERE org_name LIKE 'DEP.%' OR org_name LIKE 'DEPARTEMEN%' OR org_name LIKE 'DIV.%' OR org_name LIKE 'DIVISI%' OR org_name LIKE 'DIREKTORAT%' OR org_name = 'PUPUK SRIWIDJAJA PALEMBANG' OR org_name = 'KOMITE AUDIT PSP' OR org_name = 'DEWAN KOMISARIS PSP'");
         $row_user = $list_user->result_array(); //LOAD DATA cost center yang berbeda
  
         if($no_inventaris == ""){
            $list_kendaraan = $this->modelKendaraan->readMasterData();
            $row_kendaraan = $list_kendaraan->result_array();
         }  
         else{
            $list_kendaraan = $this->modelKendaraan->read("*","WHERE a.id_user = b.id_user AND a.no_inventaris='".$no_inventaris."'","kendaraan a,user b");
            $row_kendaraan = $list_kendaraan->result_array(); 
         } 
         

         $this->load->view("Operator/header",["model" => $this->modelAccount]);
         $this->load->view("sidebar",["side" => 2]);
         $this->load->view("Operator/SettingData/Kendaraan",["kendaraan"=>$row_kendaraan,"user" => $row_user]);
         $this->load->view("Operator/footer");
       }
       else{
         redirect("");
       }
         
     }

     public function dataUser($cost_center=""){  //METHOD UNTUK MELIHAT DATA DATA KENDARAAN
       if($this->session->userdata("tipe_account") == 1){
         
         $list_user_form = $this->modelUser->read("DISTINCT cost_center");
         $row_user_form = $list_user_form->result_array(); //LOAD DATA cost center yang berbeda


         if($cost_center == ""){
              $list_user = $this->modelUser->read("*","order BY cost_center");
              $row_user = $list_user->result_array();
         }
         else{
              $list_user = $this->modelUser->read("*","WHERE cost_center='".$cost_center."'");
              $row_user = $list_user->result_array();
         }
         
    
         $this->load->view("Operator/header",["model" => $this->modelAccount]);
         $this->load->view("sidebar",["side" => 2]);
         $this->load->view("Operator/SettingData/User",["user" => $row_user,"form" => $row_user_form]);
         $this->load->view("Operator/footer");
       }
       else{
          redirect("");
       }
     }


     public function dataVendor(){ //METHOD UNTUK MELIHAT DATA VENDOR
      if($this->session->userdata("tipe_account") == 1){
         $list_vendor = $this->modelVendor->readMasterData();
         $row_vendor = $list_vendor->result_array();

         $this->load->view("Operator/header",["model" => $this->modelAccount]);
         $this->load->view("sidebar",["side" => 2]);
         $this->load->view("Operator/SettingData/Vendor",["vendor" => $row_vendor]);
         $this->load->view("Operator/footer");
       }
       else{
          redirect("");
       }
     }

       public function tambahData($data_apa=""){   //METHOD UNTUK MENAMBAH MASTER DATA
           if($this->session->userdata("tipe_account") == 1){
               if($data_apa == "User"){
                  $obj = json_decode($_POST['myData']);
                   $cost_center = $obj->cost_center;
                   $user        = $obj->user;

                   $query2 = $this->modelUser->read("COUNT(org_name) as nama","WHERE org_name = '".$user."'")->result_array()[0]["nama"];
                   if($query2 > 0){
                      echo 2;
                   }else{
                      $query1 = $this->modelUser->insertUser($cost_center,$user);
                      echo 1;
                   }
          
         
               }else if($data_apa == "Kendaraan"){
                 $obj = json_decode($_POST['myData']);
                  
                  $no_inventaris    = $obj->nomor_inventaris;
                  $jenis_kendaraan  = $obj->jenis_kendaraan;
                  $no_polisi        = $obj->nomor_polisi;
                  $no_rangka        = $obj->nomor_rangka;
                  $no_mesin         = $obj->nomor_mesin;
                  $cost_center      = $obj->cost_center;
                  $tahun            = $obj->tahun;  

                  $querySearch = $this->modelUser->read("COUNT(cost_center) as ada","WHERE cost_center = '".$cost_center."'")->result_array()[0]["ada"];

                  if($querySearch > 0){
                    $id_user = $this->modelUser->read("id_user","WHERE cost_center = '".$cost_center."'")->result_array()[0]["id_user"];
                    $query2 = $this->modelKendaraan->read("COUNT(no_inventaris) as ada","WHERE no_inventaris = '".$no_inventaris."'")->result_array()[0]["ada"];

                      if($query2 > 0){
                         echo 2;
                      }else{
                          $query1 = $this->modelKendaraan->insertKendaraan($no_inventaris,$jenis_kendaraan,$tahun,$no_polisi,$no_rangka,$no_mesin,$id_user);
                          echo 1;
                      }
                  }else{
                    echo 0;
                  }


               }else if($data_apa == "Vendor"){
                  $obj = json_decode($_POST['myData']);
                  $nama = $obj->nama_vendor;
                  $alamat =  $obj->alamat_vendor;
                  $no_telp = $obj->no_telp_vendor;

                  $query2 = $this->modelVendor->read("COUNT(nama_vendor) as nama","WHERE nama_vendor = '".$nama."'")->result_array()[0]["nama"];
                  if($query2 > 0){
                     echo 2;
                  }else{
                    $query1 = $this->modelVendor->tambahVendor($nama,$alamat,$no_telp);
                    echo 1;
                  }
                  
               }
           }
          else{
             redirect("");
           }
    }


    public function editData($data_apa=""){ //METHOD UNTUK MENGERJAKAN EDIT MASTER DATA
       if($this->session->userdata("tipe_account") == 1){
            if($data_apa == "Kendaraan"){
                $obj = json_decode($_POST['myData']);
               $no_inventaris = $obj->nomor_inventaris;
               $no_inventaris_l = $obj->nomor_inventaris_l;
               $jenis_kendaraan = $obj->jenis_kendaraan;
               $no_polisi = $obj->nomor_polisi;
               $no_rangka = $obj->nomor_rangka;
               $no_mesin = $obj->nomor_mesin;
               $cost_center = $obj->cost_center;
               $tahun = $obj->tahun;
               

               if(empty($cost_center)){
                    $id_user = 0;
                  }else{
                    $id_user = $this->modelUser->read("id_user","WHERE cost_center = '".$cost_center."'")->result_array()[0]["id_user"];
                  }  
               $query1 = $this->modelKendaraan->updateKendaraan($no_inventaris,$jenis_kendaraan,$tahun,$no_polisi,$no_rangka,$no_mesin,$id_user,$no_inventaris_l);
               
               if($query1 ==1 ){
                echo 1; 
               }else{
                echo 2;
               }


            }
            elseif ($data_apa == "User") {
             $obj = json_decode($_POST['myData']);
             $cost_center = $obj->cost_center;
             $user        = $obj->user;
             $user_l      = $obj->user_l;
             $query2 = $this->modelUser->read("COUNT(org_name) as nama","WHERE org_name = '".$user."'")->result_array()[0]["nama"];
             if($query2 > 0){
              echo 2;
             }else{
               $query1 = $this->modelUser->updateUser($cost_center,$user,$user_l);
               echo 1;
             }
            }
            elseif ($data_apa == "Vendor") {
                $obj = json_decode($_POST['myData']);
               $nama = $obj->nama_vendor;
               $alamat =  $obj->alamat_vendor;
               $no_telp = $obj->no_telp_vendor;
               $nama_lama = $obj->nama_vendor_l;
               $query1 = $this->modelVendor->updateVendor($nama,$alamat,$no_telp,$nama_lama);
               echo $query1;
            }
       }
       else{
          redirect("");
       }
    }

    public function hapusData($data_apa=""){  //METHOD UNTUK MENGERJAKAN HAPUS DATA
       if($this->session->userdata("tipe_account") == 1){
            if($data_apa == "Kendaraan"){
              $no_inven = $_POST["mydata"];
              
              $query1 = $this->modelKendaraan->delete($no_inven);
              if($query1 == 1){
                echo 1;
              }else{
                echo 2;
              }
            }
            elseif ($data_apa == "User") {
              $id_user = $_POST["mydata"];
               $query1 = $this->modelUser->delete($id_user);
               if($query1 ==  1){
                echo 1;
               }else{
                echo 2;
               }
            }
            elseif ($data_apa == "Vendor") {
               $id_vendor = $_POST["mydata"];
               $query1 = $this->modelVendor->delete($id_vendor);
               if($query1 == 1){
                echo 1;
               }else{
                echo 2;
               }
            }
       }
       else{
            redirect("");
       }
    }

    public function editDataKendaraan($no_inventaris){ //METHOD UNTUK MENGUBAH MASTER DATA KENDARAAN
        if($this->session->userdata("tipe_account") == 1){
            $list_user = $this->modelUser->read("DISTINCT cost_center,org_name","WHERE org_name LIKE 'DEP.%' OR org_name LIKE 'DEPARTEMEN%' OR org_name LIKE 'DIV.%' OR org_name LIKE 'DIVISI%' OR org_name LIKE 'DIREKTORAT%' OR org_name = 'PUPUK SRIWIDJAJA PALEMBANG' OR org_name = 'KOMITE AUDIT PSP' OR org_name = 'DEWAN KOMISARIS PSP'");
             $row_user = $list_user->result_array(); 
            
            $list_kendaraan = $this->modelKendaraan->readDatakeform($no_inventaris);
            $row_kendaraan = $list_kendaraan->result_array();

            $list_user_form = $this->modelUser->read("*","WHERE id_user=".$row_kendaraan[0]['id_user']);
            $row_user_form = $list_user_form->result_array();
           
           $this->load->view("Operator/header",["model" => $this->modelAccount]);
           $this->load->view("sidebar",["side" => 2]);
           $this->load->view("Operator/SettingData/Edit_data_kendaraan",["kendaraan" => $row_kendaraan,"user" => $row_user,"user_form"=>$row_user_form]);
           $this->load->view("Operator/footer");

        }
        else{
          redirect("");
        }
    }

    public function editDataUser($cost_center,$id_user){ //METHOD UNTUK MENGUBAH MASTER DATA USER
        if($this->session->userdata("tipe_account") == 1){
          
          
            $list_user = $this->modelUser->read("*","WHERE cost_center='".$cost_center."' AND id_user='".$id_user."'");
            $row_user = $list_user->result_array();
           
            $this->load->view("Operator/header",["model" => $this->modelAccount]);
            $this->load->view("sidebar",["side" => 2]);
            $this->load->view("Operator/SettingData/Edit_data_user",["user" => $row_user]);
            $this->load->view("Operator/footer");

        }
        else{
          redirect("");
        }
    }

    public function editDataVendor($id_vendor){ //METHOD UNTUK MENGUBAH MASTER DATA VENDOR
         if($this->session->userdata("tipe_account") == 1){
              $list_vendor = $this->modelVendor->read("*","WHERE id_vendor='".$id_vendor."'");
              $row_vendor = $list_vendor->result_array();

              $this->load->view("Operator/header",["model" => $this->modelAccount]);
              $this->load->view("sidebar",["side" => 2]);
              $this->load->view("Operator/SettingData/Edit_data_vendor",["vendor" => $row_vendor]);
              $this->load->view("Operator/footer");   
          }
          else{
            redirect("");
          }
    }

       public function hapusDataKendaraan($no_inven){ //METHOD UNTUK MENGAHPUS DATA KENDARAAN
         if($this->session->userdata("tipe_account") == 1){
              $list_kendaraan = $this->modelKendaraan->read("*","WHERE no_inventaris='".$no_inven."'");
              $row_kendaraan = $list_kendaraan->result_array();

              $this->load->view("Operator/header",["model" => $this->modelAccount]);
              $this->load->view("sidebar",["side" => 2]);
              $this->load->view("Operator/SettingData/Konfirmasi_hapus_kendaraan",["kendaraan"=>$row_kendaraan]);
              $this->load->view("Operator/footer");
         }
         else{
            redirect("");
         }
    }

    public function hapusDataUser($id_user){
       if($this->session->userdata("tipe_account") == 1){
          $list_user = $this->modelUser->read("*","WHERE id_user='".$id_user."'");
          $row_user = $list_user->result_array();

          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 2]);
          $this->load->view("Operator/SettingData/Konfirmasi_hapus_user",["user"=>$row_user]);
          $this->load->view("Operator/footer");
       }
       else{
          redirect("");
       }
    }

       public function hapusDataVendor($id_vendor){
       if($this->session->userdata("tipe_account") == 1){
          $list_vendor = $this->modelVendor->read("*","WHERE id_vendor='".$id_vendor."'");
          $row_vendor = $list_vendor->result_array();

          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 2]);
          $this->load->view("Operator/SettingData/Konfirmasi_hapus_vendor",["vendor"=>$row_vendor]);
          $this->load->view("Operator/footer");
       }
       else{
          redirect("");
       }
    }


}

?>