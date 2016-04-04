<?php
function contact_process_client(){
	global $db, $smarty, $function,$template, $mail_admin;
	$oContact = new contact;
	$a = isset($_GET['a']) ? $_GET['a'] : "home";
	$smarty->assign("module_title", _CONTACT);
	switch(strtolower($a)){
		case "home":
		default:
			if($_POST['submit']) {
				$client_name = $function->FixQuotes($_POST['fullname']);
				$client_mail = $function->FixQuotes($_POST['email']);
				$subject = "Liên hệ ban quản trị";
				$description = $function->FixQuotes($_POST['description']);
				
				// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

				// Additional headers
				$headers .= 'To: '. $mail_admin . "\r\n";
				$headers .= 'From: '. $client_mail . "\r\n";
				//include('class/smtp.php');
				if($client_name == "" or $client_mail == "" or $description == ""){
					return $function->msg_box_client($template,_ERR_SEND_INVALID,2, URL_HOMEPAGE."/contact.html");}
				if($_POST['txt_verify_register'] != $_SESSION["code_verify"]){
					return $function->msg_box_client($template,_ERR_VERIFY_DIFF,2, URL_HOMEPAGE."/contact.html");}
				//if(SendMail($client_mail, $mail_admin, $subject, $description,$client_name)){						
				if(@mail($mail_admin, $subject, $description, $headers)) {
					return $function->msg_box_client($template,_MESS_SUCCESS_CONTACT,2, URL_HOMEPAGE);
				}else{return $function->msg_box_client($template,_ERR_SEND,2, URL_HOMEPAGE."/contact.html");}
					unset($_SESSION["code_verify"]);
			}else{
				$chars_rand = explode("/",$function->chars_rand(6));
				$_SESSION["code_verify"] = $chars_rand[0];
				return $smarty->fetch($template."/contact/index.html");
			}
		break;
	}
}
?>