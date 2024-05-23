<?php
require_once('sendMailClass.php');
require_once('sendSMSClass.php');

class User {
    private $dbc;
    private $error_message;

    function __construct($dbc){
	    $this->dbc = $dbc;
	    $this->error_message="";
	}

    public static function sendResponse($status,$payload,$errorMsg=""){
		$resp = array();
		$resp["status"]=$status;
		if ( isset($errorMsg) && $errorMsg != "" ) $resp["error"]=$errorMsg;
		$resp["data"]=$payload;
		echo json_encode($resp);
		die();
	}
	
	public function applyKSFL(){

		$data=array();
        
    	$data["name"]=$_REQUEST["name"];
    	$data["email"]=$_REQUEST["email"];
		$data["address"]=str_replace("'", '"',$_REQUEST["address"]);
		$data["whatsApp"]=$_REQUEST["whatsApp"];
		$data["number"]=$_REQUEST["number"];
		$data["title"]=str_replace("'", '"',$_REQUEST["title"]);
		$data["cast"]=str_replace("'", '"',$_REQUEST["cast"]);
		$data["duration"]=str_replace("'", '"',$_REQUEST["duration"]);
		$data["writer"]=str_replace("'", '"',$_REQUEST["writer"]);
		$data["production_banner"]=str_replace("'", '"',$_REQUEST["production_banner"]);
		$data["director"]=str_replace("'", '"',$_REQUEST["director"]);
		$data["makeup_artist"]=str_replace("'", '"',$_REQUEST["makeup_artist"]);
		$data["editor"]=str_replace("'", '"',$_REQUEST["editor"]);
		$data["art_director"]=str_replace("'", '"',$_REQUEST["art_director"]);
		$data["vfx_artist"]=str_replace("'", '"',$_REQUEST["vfx_artist"]);
		$data["designer"]=str_replace("'", '"',$_REQUEST["designer"]);
		$data["costumer"]=str_replace("'", '"',$_REQUEST["costumer"]);
		$data["cameraman"]=str_replace("'", '"',$_REQUEST["cameraman"]);
		$data["categories"]=serialize($_REQUEST["categories"]);
		$data["child_artist"]=str_replace("'", '"',$_REQUEST["child_artist"]);
		$data["production_completion_date"]=$_REQUEST["production_completion_date"];
		$data["producer_contact"]=str_replace("'", '"',$_REQUEST["producer_contact"]);
		$data["female_lead"]=str_replace("'", '"',$_REQUEST["female_lead"]);
		$data["male_lead"]=str_replace("'", '"',$_REQUEST["male_lead"]);
		$data["synopsis"]=str_replace("'", '"',$_REQUEST["synopsis"]);
		$data["artistes_details"]=str_replace("'", '"',$_REQUEST["artistes_details"]);
		$data["role"]=str_replace("'", '"',$_REQUEST["role"]);
		$data["preview_format"]=str_replace("'", '"',$_REQUEST["preview_format"]);
		$data["tac"]=str_replace("'", '"',$_REQUEST["tac"]);
		$data["project_details"]=str_replace("'", '"',$_REQUEST["project_details"]);
		$data["signature"]=str_replace("'", '"',$_REQUEST["signature"]);
		$data["uploadFilePath"]=str_replace("'", '"',$_REQUEST["uploadFilePath"]);

		

		
	    $result = $this->dbc->insert_query($data, 'tbl_ksfl_applications');
	
		if($result != ""){
		    self::sendResponse("1", "Success");
		}else self::sendResponse("0", "Failed to save");

		// $send = new sendMails(true);
		// $mailRes = $send->sendMail($subject , "Machoose International" , "machoos522@gmail.com" , $html , $name, $email );
        	    
	}
	
	
	
	
	
	

}

?>