<?php
function yahoo_process_admin(){
	global $db, $smarty, $function,$module,$arr_r;
	$oYahoo = new Yahoo;
	$oCms = new Cms;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$module_info = $oCms->module_infomation($module);
	$oModuleID = $module_info['Module_ID'];
	if(!in_array($oModuleID,$arr_r)){
		return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
	switch(strtolower($a)){
		case "list_yahoo":
		default:
			$extra = isset($_GET['page']) ? intval($_GET['page']) : 0;
			if($extra != 0){ 
				$extranum = ($extra-1)*10;
			}else{
				$extra = 0;
			}
			$extranum1 = $extranum + 1;
			$extranum2 = $extranum + 10;
			$showof = $extranum1." - ".$extranum2;
			$per_page = 20;
			$numf = $oYahoo->get_nums_yahoo();
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=yahoo&a=list_yahoo";
			$paging = $function->generate_page($base_url, $all_page, $per_page, $page);
			$rs = $oYahoo->show_all_yahoo($page, $per_page);
			$smarty->assign("paging", $paging);
			$smarty->assign("rs", $rs);
			return $smarty->fetch("yahoo/yahoo_manager.html");
			break;

		case "insert_yahoo":
			if($_POST['submit']){
				$nick = stripslashes($function->FixQuotes($_POST['nick']));
				$fullname = stripslashes($function->FixQuotes($_POST['fullname']));
				if($nick == "" or $fullname == ""){
					return $function->msg_box("Bạn chưa nhập đầy đủ các thông tin yêu cầu. Vui lòng kiểm tra lại.<br /><a href='?module=yahoo&a=insert_yahoo'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=yahoo&a=insert_yahoo",3);
				}else{
					$oYahoo->add_yahoo($nick,$fullname);
					return $function->msg_box("Nick yahoo đã được thêm.<br /><a href='?module=yahoo'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=yahoo&a=list_yahoo",1);
				}
			}else{
				return $smarty->fetch("yahoo/yahoo_add.html");
			}
			break;

		case "yahoo_edit":
			$id = isset($_GET['id']) ? intval($_GET['id']) : "";
			if($_POST['submit']){
				$nick = stripslashes($function->FixQuotes($_POST['nick']));
				$fullname = stripslashes($function->FixQuotes($_POST['fullname']));
				if($nick == "" or $fullname == ""){
					return $function->msg_box("Có lỗi trong quá trình thay đổi thông tin. Vui lòng thử lại.<br /><a href='?module=yahoo&a=yahoo_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=yahoo&a=yahoo_edit&id=".$id,3);
				}
				$oYahoo->edit_yahoo($id,$nick, $fullname);
				return $function->msg_box("Cập nhật thành công.<br /><a href='?module=yahoo'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=yahoo&a=list_yahoo",1);
			}else{
				$info = $oYahoo->show_yahoo($id);
				$smarty->assign("info", $info);
				return $smarty->fetch("yahoo/yahoo_edit.html");
			}
		break;

		case "delete_yahoo":
			$check = $_POST['nick_del'];
			if($check != null){
				foreach($check as $id){
					$id= intval($id);
					$oYahoo->del_yahoo($id);
				}
			}
			return $function->msg_box("Đã xóa nick yahoo.<br /><a href='?module=yahoo'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=yahoo&a=list_yahoo",1);
			break;
	}
}
?>