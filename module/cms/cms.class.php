<?php
class CMS{
function CMS(){
}
function check_user($username)
	{
		global $db;
		$sql = "SELECT * FROM admin WHERE Admin_Login = '$username'";
		$rs = $db->db_query($sql);
		$num = $db->db_numrows($rs);
		if($num == 1){
			$row = $db->db_fetchrow($rs);
			return $row;
		}else{
			return false;
		}
	}
function check_login($username,$password)
	{
		global $db;
		$sql = "SELECT * FROM admin WHERE Password = '$password' and  Admin_Login = '$username'";
		$rs = $db->db_query($sql);
		$num = $db->db_numrows($rs);
		if($num == 1){
			$row = $db->db_fetchrow($rs);
			return $row;
		}else{
			return false;
		}
	}
	
function check_email_register($email)
	{
		global $db;
		$sql = "SELECT * FROM admin WHERE Email = '$email'";
		$rs = $db->db_query($sql);
		$num = $db->db_numrows($rs);
		return $num;
	}

function insert_admin($username,$name,$pass,$email){
		global $db;
		$sql = "INSERT INTO admin VALUES(NULL, '$username','$name', '$pass', 0, '$email', '', 0)";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}
function insert_admin_role($adminid,$moduleid){
		global $db;
		$sql = "INSERT INTO roles VALUES(NULL, '$adminid','$moduleid')";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}
function change_password($password){
		global $db;
		$password = md5($password);
		$sql = "update admin set Password = '$password'";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}

function show_all_admin(){
		global $db;
		$sql = "SELECT * FROM admin ORDER BY Admin_ID asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
function show_info_admin_edit($id)
	{
		global $db;
		$id = intval($id);
		$sql = "Select * from admin where Admin_ID = $id";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrow($res);
		return $rows;
	}
function edit_admin($id,$username, $name,$pass,$email){
		global $db;
		$id = intval($id);
		if($pass == "")
			{
				$sql = "update admin set Admin_Name = '$name', Email = '$email', Admin_Login = '$username' where Admin_ID = '$id'";				
			}
		else
			{
				$pass = md5($pass);
				$sql = "update admin set Admin_Name = '$name', Email = '$email', Password = '$pass', Admin_Login = '$username' where Admin_ID = '$id'";				
			}
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}	
function edit_status($id,$ip,$status){
		global $db;
		$id = intval($id);
		$sql = "update admin set Status = '$status',  IP = '$ip' where Admin_ID = '$id'";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}
function del_admin($id){
		global $db;
		$id = intval($id);
		$sql = "Delete from admin where Admin_ID='$id'";
		$db->db_query($sql);
		if($res){ return true;}
		else return false;
}
function get_nums_admin(){
		global $db;
		$sql = "SELECT * FROM admin";
		$res = $db->db_query($sql);
		$num = $db->db_numrows($res);
		return $num;
	}

//danh sach chuc nang
function show_all_module(){
		global $db;
		$sql = "SELECT * FROM modules ORDER BY Module_ID asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
function get_nums_module(){
		global $db;
		$sql = "SELECT * FROM modules";
		$res = $db->db_query($sql);
		$num = $db->db_numrows($res);
		return $num;
	}
function show_module($moduleid){
		global$db;
		$sql = "Select * from modules where Module_ID = $moduleid";
		$res = $db->db_query($sql);
		$row = $db->db_fetchrow($res);
		return $row;
}
//lay danh sacc cac module chua dung hieu ung hinh anh
function show_all_module_no_use($module_use){
		global $db;
		$sql = "SELECT * FROM modules where Module_ID not in($module_use) and Module_Code <> 'gallery' ORDER BY Module_Name asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
//ket thuc danh sach chuc nang
//lay danh sach chuc nang chua the hien tran Block
function show_all_module_no_block($blockid){
		global $db;
		$sql = "SELECT Module_ID, Module_Name FROM modules where Module_ID not in(Select Module_ID from block_list where Block_ID = $blockid)";
		$sql .= "Union Select 0 As Module_ID, 'Trang ch&#7911;' As Module_Name from modules where 0 not in(Select Module_ID from block_list where Block_ID = $blockid) ORDER BY Module_Name asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
//ket thuc laty danh sach chuc nang
//danh sach quyen
function get_nums_module_admin($adminid){
		global $db;
		$sql = "SELECT * FROM roles where Admin_ID = '$adminid' ";
		$res = $db->db_query($sql);
		$num = $db->db_numrows($res);
		return $num;
	}
function show_all_module_admin($adminid){
		global $db;
		$sql = "SELECT a.*, b.Module_Name, b.Description, b.Module_Code, b.Summary, b.Act FROM roles a, modules b where a.Admin_ID = '$adminid' and a.Module_ID = b.Module_ID ORDER BY b.Module_ID asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
function list_module_norole($adminid){
		global $db;
		$sql = "SELECT * FROM modules where Module_ID not in(select Module_ID from roles where Admin_ID = $adminid) ORDER BY Module_ID asc";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
function remove_role($roleid){
		global $db;
		$id = intval($id);
		$sql = "Delete from roles where Roles_ID='$roleid'";
		$db->db_query($sql);
		if($res){ return true;}
		else return false;
}
function remove_all_role($adminid){
		global $db;
		$sql = "Delete from roles where Admin_ID=$adminid";
		$db->db_query($sql);
		if($res){ return true;}
		else return false;
}
function module_infomation($module){
		global$db;
		$sql = "Select * from modules where Module_Code = '$module'";
		$res = $db->db_query($sql);
		$row = $db->db_fetchrow($res);
		return $row;
}
//ket thuc danh sach quyen
/*function edit_mod($id, $name){
		global $db;
		$id = intval($id);
		if($pass == "")
			{
				$sql = "update modules set Module_Name = '$name' where Module_ID = '$id'";
			}
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}*/
//ket thuc danh sach chuc nang
//bat dau diary system
function add_diary($module,$adminid,$action){
		global $db;
		$create_time = time();
		$sql = "INSERT INTO diary_system VALUES(NULL, $module,$adminid, '$action', $create_time)";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}

function show_all_diary_system($page,$per_page){
		global $db;
		$sql = "SELECT a.*, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change, b.Module_Name, c.Admin_Name
			FROM diary_system a, modules b, admin c
			where a.Module_ID > 0 and a.Module_ID = b.Module_ID and a.Admin_ID = c.Admin_ID 
			Union
			SELECT a.*, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change, 'System' as Module_Name, c.Admin_Name 
			FROM diary_system a, modules b, admin c
			where a.Module_ID = 0 and a.Admin_ID = c.Admin_ID 
			ORDER BY Diary_ID desc limit $page,$per_page";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}

function get_nums_diary_system(){
	global $db;
	$sql = "SELECT * FROM diary_system";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function delete_diary_system($diaryid){
		global $db;
		$id = intval($id);
		$sql = "Delete from diary_system where Diary_ID='$diaryid'";
		$db->db_query($sql);
		if($res){ return true;}
		else return false;
}
//ket thuc diary system
}
?>