<?php 

class Dataentry extends CI_Controller{
   
   var $modelKendaraan;
   var $modelEntri;
   var $modelUser;
   var $modelAccount;
   var $modelVendor;
   var $modelPerbaikan;
   var $modelTagihan;

  

   public function __construct(){
   	  parent::__construct();
   	  $this->modelAccount = new Account();
      $this->modelEntri = new Entri();
      $this->modelKendaraan = new Kendaraan();
      $this->modelUser = new User();
      $this->modelVendor = new Vendor();
      $this->modelPerbaikan = new Perbaikan();
      $this->modelTagihan = new Tagihan();
      $this->modelAccount->fillAllData($this->session->userdata("tipe_account"),$this->session->userdata("username"),$this->session->userdata("foto"),$this->session->userdata("tipe_account"));
   }

   public function index(){
       
   }  

    public function kerjakanAduan($opk){ //METHOD UNTUK MENGERJAKAN ADUAN
       if($this->session->userdata("tipe_account") == 1){
            $list_entri = $this->modelEntri->read("*","WHERE c.nomor=".$opk." AND c.no_inventaris = a.no_inventaris AND a.id_user = b.id_user","entri c,kendaraan a,user b");
            $row_entri = $list_entri->result_array();
            if(sizeof($row_entri) > 0){ //CEK APAKAH SUDAH DIHAPUS OLEH USER 
              $list_perbaikan = $this->modelPerbaikan->read("*","WHERE id_entri=".$opk);
              $row_perbaikan = $list_perbaikan->result_array();

              $this->load->view("Operator/header",["model" => $this->modelAccount]);
              $this->load->view("sidebar",["side" => 1]);
              $this->load->view("Operator/Kerjakan",["entri" => $row_entri,"perbaikan"=>$row_perbaikan]);
              $this->load->view("Operator/footer");
            }
            else{
              redirect("Operator");
            }

            
       }
       else{
           redirect("");
       }
    }

    public function cetakLHPK($nomor){ //METHOD UNTUK MENCETAK LHPK
        if($this->session->userdata("tipe_account") == 1){
          $list_entri = $this->modelEntri->dataLHPK($nomor);
          $row_entri = $list_entri->result_array();

          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 1]);
          $this->load->view("Operator/Lhpk",["entri" => $row_entri]);
          $this->load->view("Operator/footer");
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

    public function entryByVendor($id_vendor){ //METHOD UNTUK MENAMPILKAN ENTRI BERDASARKAN VENDOR
       if($this->session->userdata("tipe_account") == 1){
           $list_entri = $this->modelEntri->readDataByVendor($id_vendor);
            $row_entri = $list_entri->result_array();

            $list_tagihan = $this->modelTagihan->readKeRelasiTagihanEntri("DISTINCT(id_entri)"); //PERIKSA APAKAH SUDAH PERNAH MENAGIH
            $row_tagihan = $list_tagihan->result_array();

           $this->load->view("Operator/header",["model" => $this->modelAccount]);
           $this->load->view("sidebar",["side" => 2]);
           $this->load->view("Operator/entrybyvendor",["entri"=>$row_entri,"tagihan"=>$row_tagihan]);
           $this->load->view("Operator/footer");
       }
       else{
        redirect("");
       }
    }

    public function dataProses($aksi,$opk){ //METHOD UNTUK MEMPROSES SUBMENU DATA TABLE
        if($this->session->userdata("tipe_account") == 1){
          if($aksi == "edit"){
              $this->editLHPK($opk);
          }
          elseif($aksi == "hapus"){
              $this->deleteLHPK($opk);
          }
          elseif($aksi == "cetakSPK"){
              $this->cetakSPK($opk);
          }
          elseif($aksi == "cetakOPK"){
              $this->cetakOPK($opk);
          }
        }
        else{

        }
    }

    private function editLHPK($opk){ //METHOD UNTUK MERUBAH LHPK
          $list_entri = $this->modelEntri->formEditLHPK($opk);
          $row_entri = $list_entri->result_array();

          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 1]);
          $this->load->view("Operator/edit_lhpk",["entri"=>$row_entri]);
          $this->load->view("Operator/footer");
    }

    private function deleteLHPK($opk){ //METHOD UNTUK MENGHAPUS LHPK
      echo "delete ".$opk;
    }

    private function cetakSPK($opk){ //METHOD UNTUK MENCETAK SPK
          $list_entri = $this->modelEntri->readDataSPK($opk);
          $row_entri = $list_entri->result_array();
        
          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 1]);
          $this->load->view("Operator/Spk",["entri"=>$row_entri]);
          $this->load->view("Operator/footer");
    }

    private function cetakOPK($opk){ //METHOD UNTUK MENCETAK OPK
      if($this->session->userdata("tipe_account") == 1){
          $list_entri = $this->modelEntri->readDataSPK($opk);
          $row_entri = $list_entri->result_array();
          
          $this->load->view("Operator/header",["model" => $this->modelAccount]);
          $this->load->view("sidebar",["side" => 1]);
          $this->load->view("Operator/Opk",["entri"=>$row_entri]);
          $this->load->view("Operator/footer");
      }
      else{
        redirect("");
      }
    }


    public function tambahUraian(){ //METHOD UNTUK MENAMBAH URAIAN PEKERJAAN 
        if($this->session->userdata("tipe_account") == 1){
            $u_pekerjaan = $_POST["pekerjaan"];
            $quantity = $_POST["quantity"];
            $satuan = $_POST["satuan"];
            $keterangan = $_POST["keterangan"];
            $opk = $_POST["opk"];
            
            $result = $this->modelPerbaikan->insert("pekerjaan,quantity,satuan,keterangan,id_entri","'".$u_pekerjaan."','".$quantity."','".$satuan."','".$keterangan."',".$opk);
            echo $result;

        }
        else{
           redirect("");
        }
    }
    
    public function editTambahUraian(){ //METHOD UNTUK MELAKUKAN PERUBAHAN LHPK DENGAN MENAMBAH DATA
        if($this->session->userdata("tipe_account") == 1){
            $u_pekerjaan = $_POST["pekerjaan"];
            $quantity = $_POST["quantity"];
            $satuan = $_POST["satuan"];
            $keterangan = $_POST["keterangan"];
            $opk = $_POST["opk"];
            $nama_spare_part = $_POST["nama_spare_part"];

            $result = $this->modelPerbaikan->insert("pekerjaan,nama_spare_part,quantity,satuan,keterangan,id_entri","'".$u_pekerjaan."','".$nama_spare_part."','".$quantity."','".$satuan."','".$keterangan."',".$opk);
            echo $result;
        }
        else{
          redirect("");
        }
    }

   public function editUpdateUraian(){ //METHOD UNTUK MELAKUKAN UPDATE LHPK DENGAN MERUBAH DATA
      if($this->session->userdata("tipe_account") == 1){
            $u_pekerjaan = $_POST["pekerjaan"];
            $pekerjaan_lama = $_POST["pekerjaan_lama"];
            $quantity = $_POST["quantity"];
            $satuan = $_POST["satuan"];
            $keterangan = $_POST["keterangan"];
            $opk = $_POST["opk"];
            $nama_spare_part = $_POST["nama_spare_part"];

            $id_perbaikan = $this->modelPerbaikan->read("id_perbaikan","WHERE id_entri = '".$opk."' AND pekerjaan = '".$pekerjaan_lama."'")->result_array()[0]["id_perbaikan"];
            // var_dump($pekerjaan_lama." ".$quantity." ".$quantity." ".$satuan." ".$keterangan." ".$id_perbaikan);

            $result = $this->modelPerbaikan->update("pekerjaan = '".$u_pekerjaan."', nama_spare_part = '".$nama_spare_part."', quantity = '".$quantity."', satuan = '".$satuan."', keterangan = '".$keterangan."' WHERE id_perbaikan = ".$id_perbaikan." AND pekerjaan = '".$pekerjaan_lama."'");
            echo $result;
      }
      else{
        redirect("");
      }
    }

    public function editDeleteUraian(){ //METHOD UNTUK MELAKUKAN DELETE LHPK 
       if($this->session->userdata("tipe_account") == 1){
           $id_perbaikan = $_POST["id_perbaikan"];
          $result = $this->modelPerbaikan->delete($id_perbaikan);
            echo $result;
       }
       else{
        redirect("");
       }
    }

    public function hapusUraian($id_perbaikan,$opk){ //METHOD UNTUK MENGHAPUS URAIAN PEKERJAAN
       if($this->session->userdata("tipe_account") == 1){
           $result = $this->modelPerbaikan->delete($id_perbaikan);
           if($result == 1){
              redirect("Dataentry/kerjakanAduan/".$opk);
           }
       }
       else{
          redirect("");
       }
    }

    public function hapusDataUraianLHPK(){ //METHOD UNTUK MENGHAPUS DATA URAIAN LHPK
       if($this->session->userdata("tipe_account") == 1){
          $id_perbaikan = $_POST["myData"];
          $row_perbaikan = $this->modelPerbaikan->read("*","WHERE id_perbaikan=".$id_perbaikan)->result_array(); 
          echo json_encode($row_perbaikan); 
       }
       else{
        redirect("");
       }
    }

    public function gantiStatus($status,$opk){ //METHOD UNTUK MENGGANTI STATUS ENTRI
        if($this->session->userdata("tipe_account") == 1){
            switch ($status) {
              case 1 :  
                         $list_entri = $this->modelEntri->dataLHPK($opk);
                         $row_entri = $list_entri->result_array();

                         $row_vendor = $this->modelVendor->read()->result_array();
                         
                         $this->load->view("Operator/header",["model" => $this->modelAccount]);
                         $this->load->view("sidebar",["side" => 1]);
                         $this->load->view("Operator/statusproses",["entri"=>$row_entri,"vendor"=>$row_vendor]);
                         $this->load->view("Operator/footer");
                break;
              case 2 :   $list_entri = $this->modelEntri->readDataSPK($opk);
                         $row_entri = $list_entri->result_array();

                         $this->load->view("Operator/header",["model" => $this->modelAccount]);
                         $this->load->view("sidebar",["side" => 1]);
                         $this->load->view("Operator/statusselesai",["entri"=>$row_entri]);
                         $this->load->view("Operator/footer");
                break;
              default:
                # code...
                break;
            }
        }
        else{
          redirect("");
        }
    }

    public function tambahNamaSparePart(){ //METHOD UNTUK MENAMBAH NAMA SPARE PART
      if($this->session->userdata("tipe_account") == 1){
         $data = json_decode($_POST["data"]);
         $vendor = $_POST["vendor"];
         $size = sizeof($data);
         $valid = 0;

         // var_dump($vendor);

         $id_entri = $this->modelPerbaikan->read("id_entri","WHERE id_perbaikan=".$data[0][0])->result_array()[0]['id_entri'];
         if($size == 1){
            $value = $data[0][1];
            $id_perbaikan = $data[0][0];
            $result = $this->modelPerbaikan->update("nama_spare_part='".$value."' WHERE id_perbaikan=".$id_perbaikan);
            if($result == 1){
               $valid++;
            }
         }
         else{
         for($i=0;$i<$size;$i++){
           $id_perbaikan = "";
           $value = "";
           for($j=0;$j<$size;$j++){
              if($j == 0){
                  $id_perbaikan = $data[$i][$j];
              }    
              else if($j == 1){
                 $value = $data[$i][$j];
              }
           }
            $result = $this->modelPerbaikan->update("nama_spare_part='".$value."' WHERE id_perbaikan=".$id_perbaikan);
            if($result == 1){
               $valid++;
            }
         }
       }

         if($valid == $size){
              $id_vendor = $this->modelVendor->read("id_vendor","WHERE nama_vendor='".$vendor."'")->result_array()[0]['id_vendor'];
             
              $result = $this->modelEntri->update("tanggal = NOW(),id_status=1,id_vendor=".$id_vendor." WHERE nomor=".$id_entri);
              if($result == 1){
                echo $result;
              } 
         }
         else{
            var_dump("valid tidak mencapai batas perulangan");
         }
         
      }
      else{
        redirect("");
      }
    }
   
    public function tutupEntry($aksi){
         if($this->session->userdata("tipe_account") == 1){         
             
             if($aksi == "input_file"){
                $file_name = $_FILES['file']['name']; 
                $tmp_name  = $_FILES['file']['tmp_name'];
                $file_size = $_FILES['file']['size'];
                $file_type = $_FILES['file']['type'];
                
                $fp = fopen($tmp_name, 'r');
                $file_content = fread($fp, $file_size) or die("Error: cannot read file1");
                // $file_content = mysql_real_escape_string($file_content) or die("Error: cannot read file2");
                // fclose($fp);
                
                
                $result = $this->modelEntri->insertFile($file_name,$file_content,$file_type,$file_size);

                echo $this->db->insert_id();
             }
             elseif($aksi == "input_biaya"){
                 $biaya = $_POST["b iaya"];
                 $id_file = $_POST["id_file"];
                 $opk = $_POST["opk"];

                 $result = $this->modelEntri->update("id_status=2,biaya_total=".$biaya.",id_file=".$id_file." WHERE nomor=".$opk);
                 echo $result;
                 
             }
         }
         else{

         }
    }

    public function unduhFile($opk){ //METHOD UNTUK MENDOWNLOAD FILE KOPELAN
      if($this->session->userdata("tipe_account") == 1){
          $list_entri = $this->modelEntri->readFile($opk);
          $filen= $list_entri->row();
          

          header("Content-Disposition: attachment; filename=".$filen->nama_file);
          header("Content-length: ".$filen->ukuran."");
          header("Content-type: ".$filen->ekstensi."");
          echo $filen->file;    
      }
      else{
        redirect("");
      }
    }

    public function riwayat($no_inven,$tahun="",$bulan=""){ //METHOD UNTUK MELIHAT RIWAYAT KENDARAAN BERDASARKAN INVENTARIS
         if($this->session->userdata("tipe_account") == 1){
              $list_tahun = $this->modelEntri->read("DISTINCT(YEAR(tanggal)) AS tahun","WHERE no_inventaris='".$no_inven."' AND id_status = 2");
              $row_tahun = $list_tahun->result_array();

             $list_entri = $this->modelEntri->dataRiwayat($no_inven,$tahun,$bulan);
             $row_entri = $list_entri->result_array();
              
             $this->load->view("Operator/header",["model" => $this->modelAccount]);
             $this->load->view("sidebar",["side" => 2]);
             $this->load->view("Operator/Riwayat",["entri"=>$row_entri,"tahun"=>$row_tahun,"tahun_filter"=>$tahun,"bulan_filter"=>$bulan,"inven"=>$no_inven]);
             $this->load->view("Operator/footer");

         }
         else{
           redirect("");
         }
    }

    public function allEntri($waktu1="",$waktu2=""){
       if($this->session->userdata("tipe_account") == 1){

           if($waktu1 != "" && $waktu2 != ""){
               $list_entri = $this->modelEntri->readAllFinishedDataFilter($waktu1,$waktu2);
               $row_entri = $list_entri->result_array();
           }
           else{
               $list_entri = $this->modelEntri->readAllFinishedData();
               $row_entri = $list_entri->result_array();
           } 
         
         $this->load->view("Operator/header",["model" => $this->modelAccount]);
         $this->load->view("sidebar",["side" => 3]);
         $this->load->view("Operator/semuaentri",["entri"=>$row_entri,"waktu1"=>$waktu1,"waktu2"=>$waktu2]);
         $this->load->view("Operator/footer");
          
       }else{
         redirect("");
       } //METHOD UNTUK MELIHAT SEMUA DATA NAMUN DI FILTER PER TAHUN
    }

    public function agendatagihan($waktu1="none",$waktu2="none",$no_agenda=""){
        if($this->session->userdata("tipe_account") == 1){
            
            $cond= "";
            if($waktu1 != "none" && $waktu2 != "none" && $no_agenda != ""){
              $cond = 'AND DATE(g.tanggal_tagihan) BETWEEN "'.$waktu1.'" AND "'.$waktu2.'" AND g.no_agenda ='.$no_agenda;
            }
            else if($no_agenda != ""){
              $cond = 'AND g.no_agenda ='.$no_agenda;
            }
            else if($waktu1 != "none" && $waktu2 != "none"){
              $cond = 'AND DATE(g.tanggal_tagihan) BETWEEN "'.$waktu1.'" AND "'.$waktu2.'"'; 
            }


            $list_tagihan = $this->modelTagihan->readAgendaTagihan($cond);
            $row_tagihan = $list_tagihan->result_array();


            $this->load->view("Operator/header",["model" => $this->modelAccount]);
            $this->load->view("sidebar",["side" => "agendatagihan"]);
            $this->load->view("Operator/agendatagihan",["tagihan"=>$row_tagihan,"waktu1"=>$waktu1,"waktu2"=>$waktu2,"no_agenda"=>$no_agenda]);
            $this->load->view("Operator/footer");
        }else{
           redirect("");
        }
    }

    public function selesai($tahun=""){
       if($this->session->userdata("tipe_account") == 1){
            if($tahun == ""){
                $tahun = date("Y");
             }
    

             $list_entri = $this->modelEntri->readDataSelesai($tahun);
             $row_entri = $list_entri->result_array();

             $list_tahun = $this->modelEntri->read("DISTINCT(YEAR(tanggal)) AS tahun");
             $row_tahun = $list_tahun->result_array();

             $this->load->view("Operator/header",["model" => $this->modelAccount]);
             $this->load->view("sidebar",["side" => 1]);
             $this->load->view("Operator/Datautama/data_entry_selesai",["entri" => $row_entri,"tahun"=>$row_tahun,"tahun_filter"=> $tahun]);
             $this->load->view("Operator/footer");

       }else{
        redirect("");
       }        
    }

    public function buatNota(){ //METHOD UNTUK MENCETAK NOTA DARI VENDRO
        if($this->session->userdata("tipe_account") == 1){
            
            $biaya_tagihan = 0;
            $nomor_agenda = 0;
            $no_surat = "";


            $obj = json_decode($_POST['myData']);
            $size = sizeof($obj);
            $no_surat = $obj[$size-1];
            
            $arr = array();
            for($i=0;$i<$size-1;$i++){
               $list_entri = $this->modelEntri->readNotaVendor($obj[$i]);
               $row_entri = $list_entri->result_array();
               array_push($arr,$row_entri);   
            }
            
            // TENTUKAN NOMOR AGENDA
            $maxID = $this->modelTagihan->read("MAX(id_tagihan) as id")->row()->id;
            if(isset($maxID)){
                $row_tagihan = $this->modelTagihan->read("*","WHERE id_tagihan = ".$maxID)->result_array();
            
                $lastyear = new DateTime( $row_tagihan[0]['tanggal_tagihan']);
                $lastyear = $lastyear->format("Y"); 
            
                if(date('Y') - $lastyear > 0){
                   $nomor_agenda = 1;
                }
                else{
                   $nomor_agenda = $row_tagihan[0]['no_agenda'] + 1;
                }
            }else{
               $nomor_agenda = 1;
            }
            

            //TENTUKAN BIAYA TOTAL TAGIHAN
            for($i=0;$i<sizeof($arr);$i++){
               $biaya_tagihan += $arr[$i][0]["biaya_total"];
            }
            
            //MASUKKAN KE DATABASE
            $result = $this->modelTagihan->insert("no_agenda,tanggal_tagihan,no_surat,biaya_total_tagihan",$nomor_agenda.",NOW(),'".$no_surat."',".$biaya_tagihan);
            if($result == 1){
               $id_tagihan = $this->db->insert_id();
              for($i=0;$i<$size-1;$i++){
                $this->modelTagihan->insertKeRelasiTagihanEntri("id_entri,id_tagihan",$obj[$i].",".$id_tagihan);
              }
              echo 1;
            }




        }else{
          redirect("");
        }
    }

    public function riwayat_lawas($no_inventaris){
         if($this->session->userdata("tipe_account") == 1){
          
             $list_entri = $this->modelEntri->readEntriLama($no_inventaris);
             $row_entri = $list_entri->result_array();

             $this->load->view("Operator/header",["model" => $this->modelAccount]);
             $this->load->view("sidebar",["side" => 1]);
             $this->load->view("Operator/Riwayat_lama",["entri"=>$row_entri]);
             $this->load->view("Operator/footer");
         }
         else{
          redirect("");
         }

    }



   

  

   

  
 
 

  

   

}




?>