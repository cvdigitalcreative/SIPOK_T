<?php 

class Kepala extends CI_Controller{
 
      var $modelAccount;
      var $modelEntri;

	  public function __construct(){
         parent::__construct();
         $this->modelAccount = new Account();
         $this->modelEntri = new Entri();
          $this->modelAccount->fillAllData($this->session->userdata("id"),$this->session->userdata("username"),$this->session->userdata("foto"),$this->session->userdata("tipe_account"));

      }
      

      public function _remap($act){
         if($this->session->userdata('id') != "" && $this->session->userdata('tipe_account') == 2){
             if($act == 1){
               $this->logoutProcess();
              }
              else if($act == 2){
                 $this->operatorData();
              }
              else if($act == 3){
                $this->form_ubahpass();
              }
              else if($act == 4){
                $this->ubah_password();
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

      private function operatorData(){
             $list_account = $this->modelAccount->readAll("*","WHERE id_account = 1");
             $row_account = $list_account->result_array();
             
            $this->load->view("Kepala/header",["model" => $this->modelAccount]);
            $this->load->view("Kepala/sidebar",["side" => 2]);
            $this->load->view("Kepala/ubah_password",["acc" => $row_account]);
            $this->load->view("Kepala/footer");
      }
     
      private function logoutProcess(){
         $this->session->sess_destroy();
         redirect();
      }

      private function home(){
            $row_entri = $this->modelEntri->readDataUtama(0)->result_array();
            $this->load->view("Kepala/header",["model" => $this->modelAccount]);
            $this->load->view("Kepala/sidebar",["side" => 1]);
            $this->load->view("Kepala/Home",["entri" => $row_entri]);
            $this->load->view("Kepala/footer");
      }
      private function form_ubahpass(){
            $list_account = $this->modelAccount->readAll("*","WHERE id_account = 1");
            $row_account = $list_account->result_array();
            $this->load->view("Kepala/header",["model" => $this->modelAccount]);
            $this->load->view("Kepala/sidebar",["side" => 2]);
            $this->load->view("Kepala/ubah_password",["acc" => $row_account]);
            $this->load->view("Kepala/footer");     
      }
      private function ubah_password(){
            $obj = json_decode($_POST["myData"]);
            $username  = $obj->username;
            $new_pass  = $obj->new_pass;
            $confirm   = $obj->confirm_pass;
            if($new_pass == $confirm)
            {
              $query1 = $this->modelAccount->ubah_password($new_pass,$username);
              echo $query1;
            }
            else{
              echo 0;
            }
      }

      

}



?>