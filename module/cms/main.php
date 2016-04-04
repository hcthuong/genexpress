<?php
function cms_process(){
	global $db, $smarty, $function;
	$oCms = new CMS;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$oModuleID = 0;
	switch(strtolower($a)){
		case "admin_manager":
		default:
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$rs = $oCms->show_all_admin();
			for($i=0; $i < count($rs); $i++){
				$admin_module[$i] = $oCms->show_all_module_admin($rs[$i]['Admin_ID']);
				$rs[$i]['num'] = $oCms->get_nums_module_admin($rs[$i]['Admin_ID']);}
			$smarty->assign("rs", $rs);
			$smarty->assign("admin_module", $admin_module);
			$smarty->assign("all_module", $oCms->get_nums_module());
			return $smarty->fetch("cms/admin_manager.html");
		break;

		case "add_admin":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			if($_POST['submit']){
				$_SESSION["info"]["username"] = $function->FixQuotes($_POST['username']);
				$_SESSION["info"]["name"] = $function->FixQuotes($_POST['name']);
				$_SESSION["info"]["pass"] = $_POST['pass'];
				$_SESSION["info"]["repass"] = $_POST['repass'];
				$_SESSION["info"]["email"] = $function->FixQuotes($_POST['email']);
				$per = $_POST['per'];

				$check = substr_count($_SESSION["info"]["username"]," ");
				$check_username = $oCms->check_user($_SESSION["info"]["username"]);
				$check_email_register = $oCms->check_email_register($_SESSION["info"]["email"]);
				if($_SESSION["info"]["username"] == "" or $_SESSION["info"]["name"] == "" or $_SESSION["info"]["pass"] == "" or $_SESSION["info"]["email"] ==""){
					return $function->msg_box("Vui lòng kiểm tra lại thông tin nhập.<br /><a href='?module=cms&a=add_admin'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=add_admin",3);
				}elseif($check > 0){
					return $function->msg_box("Tên đăng nhập không được có khoảng trắng.<br /><a href='?module=cms&a=add_admin'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=add_admin",3);
				}elseif($check_username == true){
					return $function->msg_box("Tên đăng nhập này đã được sử dụng. Vui lòng nhập tên khác..<br /><a href='?module=cms&a=add_admin'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=add_admin",3);
				}elseif($check_email_register != 0){
					return $function->msg_box("Email này đã được sử dụng. Vui lòng nhập email khác.<br /><a href='?module=cms&a=add_admin'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=add_admin",3);
				}else{
					$oCms->insert_admin($_SESSION["info"]["username"],$_SESSION["info"]["name"],md5($_SESSION["info"]["pass"]),$_SESSION["info"]["email"]);
					$new_id = intval($db->db_inserted_id());
					foreach($per as $moduleid){
						$oCms->insert_admin_role($new_id,$moduleid);}
						/*if(intval($_SESSION["info"]["per"]) == 0){
							$module_l = $oCms->show_all_module();
							for($i = 0; $i < count($module_l); $i++){
								$oCms->insert_admin_role($new_id,$module_l[$i]['Module_ID']);
								}
						}else{
							$oCms->insert_admin_role($new_id,$_SESSION["info"]["per"]);
						}*/
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Thêm quản trị viên");
					unset($_SESSION["info"]);
					return $function->msg_box("Đã thêm thành công quản trị viên mới.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=admin_manager",1);
				}
			}else{
				$module_l = $oCms->show_all_module();
				$smarty->assign('module_l', $module_l);
				return $smarty->fetch("cms/add_admin.html");
			}
		break;

		case "edit_admin":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0 and $_SESSION["logined_information_detail"]["Admin_ID"] != $admin_id){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$admin_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$rs = $oCms->show_info_admin_edit($admin_id);
			if($_POST["submit"]){
				$id_hidden = intval($_POST['id']);
				$username = $function->FixQuotes($_POST['username']);
				$name = $function->FixQuotes($_POST['name']);
				$pass = $_POST['pass'];
				$repass = $_POST['repass'];
				$email = $function->FixQuotes($_POST['email']);
				$check = substr_count($username," ");
				$check_username = $oCms->check_user($username);
				$check_email_register = $oCms->check_email_register($email);
				if($username == "" or $name == "" or $email ==""){
					return $function->msg_box("Vui lòng kiểm tra lại các thông tin đã nhập.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($check > 0){
					return $function->msg_box("Tên đăng nhập không được co khoảng trắng.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($check_username == true and $username != $_SESSION['logined_information_detail']['Admin_Login'] and $username != $rs['Admin_Login']){
					return $function->msg_box("Tên đăng nhập này đã được sử dụng. Vui lòng nhập tên khác.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($id_hidden == $_SESSION['logined_information_detail']['Admin_ID'] and $check_email_register > 1 and $email == $rs['Email']){
					return $function->msg_box("Email này đã được sử dụng. Vui lòng nhập tên khác.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($id_hidden == $_SESSION['logined_information_detail']['Admin_ID'] and $check_email_register > 0 and $email != $rs['Email']){
					return $function->msg_box("Email này đã được sử dụng. Vui lòng nhập email khác.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($id_hidden != $_SESSION['logined_information_detail']['Admin_ID'] and $check_email_register > 1 and $email == $rs['Email']){
					return $function->msg_box("Email này đã được sử dụng. Vui lòng nhập email khác.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($id_hidden != $_SESSION['logined_information_detail']['Admin_ID'] and $check_email_register > 0 and $email != $rs['Email']){
					return $function->msg_box("Email này đã được sử dụng. Vui lòng nhập email khác.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}elseif($pass != "" and $pass != $repass){
					return $function->msg_box("Mật khẩu và xác nhận mật khẩu không giống nhau.<br /><a href='?module=cms&a=edit_admin&id=".$admin_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=edit_admin&id=$admin_id",3);
				}else{
					$oCms->edit_admin($id_hidden, $username, $name, $pass,$email);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cập nhật thông tin quản trị viên");
					if($_SESSION['logined_information_detail']['Admin_ID'] != $admin_id and $_SESSION['logined_information_detail']['IsAdmin'] == 1){
						return $function->msg_box("Thông tin đã được cập nhật.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?index.php&module=cms&a=admin_manager",1);
					}else{
						$oCms->edit_status($_SESSION['logined_information_detail']['Admin_ID'],'',0);
						unset($_SESSION['logined_information_detail']);
						unset($_SESSION['logined_information']);
						return $function->msg_box("Thông tin đã được cập nhật.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?index.php?module=login",1);
					}
				}
			}else{
				if(!$rs){
					return $function->msg_box("Tài khoản quản trị không tồn tại.<br /><a href='?index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?index.php?module=homepage",2);}
					$smarty->assign("rs",$rs);
					return $smarty->fetch("cms/edit_admin.html");
			}
		break;

		case "add_role":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$admin_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$rs = $oCms->show_info_admin_edit($admin_id);
			if($_POST["submit"]){
				$per = $_POST['per'];
				foreach($per as $moduleid){
					$oCms->insert_admin_role($admin_id,intval($moduleid));}
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cấp quyền quản trị chức năng cho quản trị viên");
					return $function->msg_box("Đã cấp thêm quyển quản lý cho quản trị viên.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=cms&a=admin_manager",1);
			}else{
				if(!$rs){
					return $function->msg_box("Tài khoản không tồn tại.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
				$smarty->assign("rs",$rs);
				$list_module_norole = $oCms->list_module_norole($admin_id);
				$smarty->assign("list_module_norole", $list_module_norole);
				return $smarty->fetch("cms/add_role.html");
			}
		break;

		case "del_admin":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$check = $_POST['check_del'];
			if($check != null){
				foreach($check as $id){
					$id = intval($id);
					$oCms->remove_all_role($id);
					$oCms->del_admin($id);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Xóa quản trị viên");}
			}
			return $function->msg_box("Đã xóa tài khoản quản trị viên.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=admin_manager",1);
		break;

		case "remove_role":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$roleid = isset($_GET['roleid']) ? intval($_GET['roleid']) : 0;
			$oCms->remove_role($roleid);
			$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Xóa quyền quản trị chức năng");
			return $function->msg_box("Đã xóa quyền truy cập chức năng.<br /><a href='?module=cms&a=admin_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=admin_manager",1);
		break;

		case "system_diary":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			global $diary;
			$per_page = $diary;
			$numf = $oCms->get_nums_diary_system();
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=cms&a=system_diary";
			$paging = $function->generate_page($base_url, $all_page, $per_page, $page);
			$rs = $oCms->show_all_diary_system($page, $per_page);
			$smarty->assign("paging", $paging);
			$smarty->assign("rs", $rs);
			return $smarty->fetch("cms/diary_system.html");
		break;
		
		case "delete_system_diary":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
			$check = $_POST['check_del'];
			if($check != null){
				foreach($check as $id){
					$id = intval($id);
					$oCms->delete_diary_system($id);}
			}
			return $function->msg_box("Đã xóa thông tin nhật ký hệ thống.<br /><a href='?module=cms&a=system_diary'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=cms&a=system_diary",1);
		break;
	}
}
?>