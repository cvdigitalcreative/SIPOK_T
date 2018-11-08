<?php 

class Datakendaraan extends CI_Controller{
     
    var $modelAccount;
    var $modelKendaraan;
	
	public function __construct(){
		parent::__construct();
         $this->modelAccount = new Account();
         $this->modelKendaraan = new Kendaraan();
         $this->modelAccount->fillAllData($this->session->tempdata("id"),$this->session->tempdata("username"),$this->session->tempdata("foto"),$this->session->tempdata("tipe_account"));
	}

	public function index(){

	}

	public function tambahNomorRangka(){
		$rangka =  $_POST["rangka"];
		$no_inventaris = $_POST["no_inventaris"];
        
        $hasil = $this->modelKendaraan->insertBaru("rangka",$rangka,$no_inventaris);
        echo $hasil;

	}

	public function tambahNomorMesin(){
        $mesin =  $_POST["no_mesin"];
		$no_inventaris = $_POST["no_inventaris"];
        
        $hasil = $this->modelKendaraan->insertBaru("no_mesin",$mesin,$no_inventaris);
        echo $hasil;
	}
}


?>