<?php
class Contact{
function Contact(){
		global $db;
	}
function add_contact($client_name,$client_mail,$description){
	global $db;
	$create_time = time();
	$sql = "INSERT INTO contact VALUES(NULL, '$client_name', '$client_mail', '$description', '', 0, $create_time, 0, 0)";
	$res = $db->db_query($sql);
	return 1;}
function edit_contact($id,$reply){
	global $db;
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update contact set Reply_Content = '$reply', Update_By = $update_by, Update_Time = $update_time, Status = 1 where Contact_ID = '$id'";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}
function del_contact($id){
	global $db;
	$sql = "Delete from contact where Contact_ID = $id";
	$res = $db->db_query($sql);
	return 1;}
function show_all_contact($is_reply,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($is_reply == 0){
		$sql = "SELECT *, FROM_UNIXTIME(Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(Update_Time,'%d-%m-%Y') AS Update_Time_Change
		FROM contact Where Status = 0 ORDER BY $order_field $order_type Limit $page, $per_page";
	}else{
		$sql = "SELECT a.*, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, b.Admin_Name
		FROM contact a,admin b Where a.Status = 1 and a.Update_By = b.Admin_ID ORDER BY a.$order_field $order_type Limit $page, $per_page";
	}
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
function show_contact($id){
	global $db,$function;	
	$sql = "SELECT * FROM contact Where Contact_ID = $id ";		
	$res = $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	return $row;}
function get_num_contact(){
	global $db;
	$sql = "SELECT a.* FROM contact Where a.Status = 1 ORDER BY a.$order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
}
}
?>
