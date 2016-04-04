<?php
class Link{
function Link(){
		global $db;
	}
function add_link($link, $file_name){
	global $db,$function;
	$title = $link['title'];
	$url = $link['url'];
	$check = substr_count($url,"http://");
	if($check == 0){$url = 'http://'.$url;}
	$position = $link['position'];
	$create_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$create_time = time();
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "INSERT INTO web_link VALUES(NULL, '$title', '$url', '$file_name', $position, $create_by, $create_time, $update_by, $update_time,1)";
	$res = $db->db_query($sql);
	return 1;}

function edit_link($id,$data, $file_name){
	global $db;
	$title = $data['title'];
	$url = $data['url'];
	$check = substr_count($url,"http://");
	if($check == 0){$url = 'http://'.$url;}
	$position = $data['position'];
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update web_link set Title = '$title', Url = '$url' , Image_Name = '$file_name', Position = $position, 
		Update_By = $update_by, Update_Time = '$update_time' where Link_ID = '$id'";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}

function show_all_link(){
	global $db,$function;
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change
		FROM web_link a, admin b, admin c Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID 
		ORDER BY Link_ID desc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function get_nums_link(){
	global $db;
	$sql = "SELECT * FROM link";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function show_link($linkid){
	global $function,$db;
	$sql = "SELECT * FROM web_link Where Link_ID = '$linkid'";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrow($res);
	return $rows;}
	
function del_link($id){
	global $db;
	$id = intval($id);
	$sql = "Delete from web_link where Link_ID='$id'";
	$db->db_query($sql);
	return 1;}
	
function update_status($id,$status){
	global $db;
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update product set Status = $status, Update_By = $update_by, Update_Time = '$update_time' where Link_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}	
//client

function show_all_link_client($position){
	global $db,$function;
	$sql = "SELECT * FROM web_link where Position = $position ORDER BY Link_ID asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

}
?>
