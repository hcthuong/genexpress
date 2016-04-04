<?php
function setting_process_admin(){
	global $db, $smarty, $function;
	$oCms = new Cms;
	$oModuleID = 0;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	switch(strtolower($a)){
		case "setting_manager":
			default:
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này!!!",1,"index.php?module=homepage");}
			global $sitename,$site_disable,$message_disable,$template,$files_mime,$extension,$max_size,$diary,$hot_line,$mail_admin;
			if($_POST['submit']){
				$xsitename = stripslashes($function->FixQuotes($_POST['sitename']));
				if($xsitename == ''){$xsitename = $sitename;}
				$xmail_admin = stripslashes($function->FixQuotes($_POST['email']));
				$xhot_line = stripslashes($function->FixQuotes($_POST['hot_line']));
				$xtemplate = $function->FixQuotes($_POST['template']);
				$xdisable_site = intval($_POST['disable_site']);
				$xdisable_message = $function->FixQuotes($_POST['disable_message']);
				$xfiles_mime = $function->FixQuotes($_POST['files_mime']);
				$xextension = $function->FixQuotes($_POST['extension']);
				$xmax_size = intval($_POST['max_size']);
				if($xmax_size < 1048576){$xmax_size = 1048576;}
				$xdiary = intval($_POST['diary']);
				if($xdiary < 10){$xdiary = 10;}
 				@chmod("../data/config_site.php", 0777);
				@$file = fopen("../data/config_site.php", "w");
 				$content .= "<?php \n";
				$content .= "\$sitename = \"$xsitename\";\n";
				$content .= "\$mail_admin = \"$xmail_admin\";\n";
				$content .= "\$hot_line = \"$xhot_line\";\n";
				$content .= "\$template = \"$xtemplate\";\n";
				$content .= "\$diary = $xdiary;\n";
				$content .= "\$files_mime = \"$xfiles_mime\";\n";
				$content .= "\$extension = \"$xextension\";\n";
				$content .= "\$max_size = $xmax_size;\n";
				$content .= "\$site_disable = $xdisable_site;\n";
				$content .= "\$message_disable = \"$xdisable_message\";\n";
				$content .= "?>";
				@fwrite($file, $content);
    				@fclose($file);
    				@chmod("../data/config_site.php", 0604);
				$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cài đặt cấu hình hệ thống");
    				return $function->msg_box("Cài đặt cấu hình hệ thống thành công.<br /><a href='?module=setting&a=setting_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=setting&a=setting_manager",1);
			}else{
				$smarty->assign("sitename",$sitename);
				$smarty->assign("email",$mail_admin);
				$smarty->assign("hot_line",$hot_line);
				$smarty->assign("template",$template);
				$smarty->assign("site_disable",$site_disable);
				$smarty->assign("message_disable",$message_disable);
				$list_template = $function->printTree(TEMPLATE_URL);
				$list_template = $function->array_remove($list_template,"..");
				$list_template = $function->array_remove($list_template,".");
				$smarty->assign('list_template',$list_template);
				$smarty->assign('files_mime',$files_mime);
				$smarty->assign('extension',$extension);
				$smarty->assign('max_size',$max_size);
				$smarty->assign('diary',$diary);
				return $smarty->fetch("setting/setting_site.html");
			}
		break;
	}
}
?>