<?php
function link_process_admin(){
	global $db, $smarty, $function,$module,$arr_r;
	$oLink = new link;
	$oCms = new Cms;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$module_info = $oCms->module_infomation($module);
	$oModuleID = $module_info['Module_ID'];
	if(!in_array($oModuleID,$arr_r)){
		return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
	switch(strtolower($a)){
		case "ads_manager":
		default:
			$rs = $oLink->show_all_link();
			$smarty->assign("rs", $rs);
			return $smarty->fetch("link/link_manager.html");
		break;
		case "ads_add":
			global $max_size,$files_mime,$extension;
			if($_POST['submit']){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$url = stripslashes($function->FixQuotes($_POST['url']));
				$position = intval($_POST['position']);
				$_SESSION['link']['title'] = $title;
				$_SESSION['link']['url'] = $url;
				$_SESSION['link']['position'] = $position;
				if($title == "" or $url == ""){
					return $function->msg_box("Bạn chưa nhập đầy đủ các thông tin yêu cầu. Vui lòng kiểm tra lại.<br /><a href='?module=ads&a=ads_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_add",3);
				}else{
					if(isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name'])){
						$file_name = $_FILES['filename']['name'];
						$file_size = $_FILES['filename']['size'];
						$file_type = $_FILES['filename']['type'];
						$files_mime = explode(",",$files_mime);
						$extension = explode(",",$extension);
						$files_extension = end(explode(".",$file_name));
						$files_extension = strtolower($files_extension);
						if ( $file_size > $max_size ){
							return $function->msg_box("Không thể upload hình. Kích thước hình lớn hơn " . $max_size ." byte.<br /><a href='?module=ads&a=ads_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_add",3);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
							return $function->msg_box("Kiểu file hoặc phần mở rộng của hình ảnh không được phép thêm.<br /><a href='?module=ads&a=ads_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_add",3);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						if($position == 1){
							$resize_width = 10000;
							$resize_height = 78;
						}else if($position == 2){
							$resize_width = 241;
							$resize_height = 10000;
						}
						$resize = new resize("filename", $resize_width,$resize_height);
						$resize->saveTo($real_name, IMG_LINK_THUMB);
					}
					$oLink->add_link($_SESSION['link'],$real_name);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Thêm quảng cáo.");
					unset($_SESSION['link']);
					return $function->msg_box("Đã thêm quảng cáo mới.<br /><a href='?module=ads'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads",1);
				}
			}else{				
				return $smarty->fetch("link/link_add.html");
			}
		break;

		case "ads_edit":
			global $max_size,$files_mime,$extension;
			$id = isset($_GET['id']) ? intval($_GET['id']) : "";
			$link = $oLink->show_link($id);
			$smarty->assign("link", $link);
			if($_POST['submit']){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$url = stripslashes($function->FixQuotes($_POST['url']));
				$position = intval($_POST['position']);
				$data['title'] = $title;
				$data['url'] = $url;
				$data['position'] = $position;
				$dcheck = intval($_POST['del_image']);
				if($title == "" or $url == ""){
				return $function->msg_box("Có lỗi trong quá trình thay đổi thông tin. Vui lòng thử lại.<br /><a href='?module=ads&a=ads_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_edit&id=".$id,3);
				}else{
					if(isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name'])){
						$file_name = $_FILES['filename']['name'];
						$file_size = $_FILES['filename']['size'];
						$file_type = $_FILES['filename']['type'];
						$files_mime = explode(",",$files_mime);
						$extension = explode(",",$extension);
						$files_extension = end(explode(".",$file_name));
						$files_extension = strtolower($files_extension);
						if ( $file_size > $max_size ){
							return $function->msg_box("Không thể upload hình. Kích thước hình lớn hơn " . $max_size ." byte.<br /><a href='?module=ads&a=ads_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_edit&id=".$id,3);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
							return $function->msg_box("Kiểu file hoặc phần mở rộng của hình ảnh không được phép thêm.<br /><a href='?module=ads&a=ads_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_edit&id=".$id);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						if($position == 1){
							$resize_width = 10000;
							$resize_height = 78;
						}else if($position == 2){
							$resize_width = 241;
							$resize_height = 10000;
						}
						$resize = new resize("filename", $resize_width,$resize_height);
						$resize->saveTo($real_name, IMG_LINK_THUMB);
						if($link['Image_Name'] != ''){
							unlink(IMG_LINK_THUMB.$link['Image_Name']);}
					}else{
						$real_name = $link['Image_Name'];
					}
				}
				$oLink->edit_link($id,$data,$real_name);
				$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cập nhật thông tin liên kết web.");
				return $function->msg_box("Thay đổi thông tin thành công.<br /><a href='?module=ads'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=ads&a=ads_manager",1);
			}else{
				return $smarty->fetch("link/link_edit.html");
			}
		break;

		case "ads_delete":
			$check = $_POST['check_del'];
			if($check != null){
				foreach($check as $id){
					$id= intval($id);
					$link = $oLink->show_link($id);
					if($link['Image_Name'] != ''){
					unlink(IMG_LINK.$link['Image_Name']);
					unlink(IMG_LINK_THUMB.$link['Image_Name']);}
					$oLink->del_link($id);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Xóa thông tin liên kết web.");
				}
			}
			return $function->msg_box("Đã xóa thông tin liên kết web!<br /><a href='?module=ads'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=link&a=ads",1);
		break;
	}
}

function link_process_client(){
	global $db, $smarty, $function;
	$oLink = new link;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	switch(strtolower($a)){
		case "detail":
		default:
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$link_p = $oLink->show_link($id);
			$smarty->assign("link_p", $link_p);
			return $smarty->fetch("link/index.html");
		break;
	}
}
?>