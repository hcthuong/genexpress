<?php
class Block{
function Block(){
		global $db;
	}
function show_all_block_in_template($template){
	global $db,$function;
	$sql = "Select * from block where Template = '$template' order by Position asc, St asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function check_file_php($template,$file){
	global $db,$function;
	$file = 'block/'.$file;
	$sql = "Select * from block where Template = '$template' and Source = '$file'";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
}
function add_block($title,$tpl,$file_source,$file_style,$position,$st,$limit){
	global $db;
	$sql = "INSERT INTO block VALUES(NULL, '$title', '$tpl', '$file_source', '$file_style', $position, $st,$limit)";
	$res = $db->db_query($sql);
	return 1;}

function edit_block($block_id,$title,$file_source,$file_style,$position,$limit){
	global $db;
	$sql = "Update block set Title = '$title', Source = '$file_source', Style = '$file_style', Position = '$position', Per_Page = '$limit' where Block_ID = $block_id";
	$res = $db->db_query($sql);
	return 1;}
	
function update_st($block_id,$st){
	global $db;
	$sql = "Update block set St = $st where Block_ID = $block_id";
	$res = $db->db_query($sql);
	return 1;}

function del_block($block_id){
	global $db;
	$sql = "Delete from block where Block_ID = $block_id";
	$res = $db->db_query($sql);
	return 1;}

function max_st($tpl,$position){
	global $db;
	$sql = "Select max(St) as Max_ST from block where Position = $position and Template = '$tpl'";
	$res = $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	return $row;
}
function show_block($block_id){
	global $db;
	$sql = "Select * from block where Block_ID = $block_id";
	$res= $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	return $row;
}
//BLock List
function insert_block_list($blockid,$moduleid){
		global $db;
		$sql = "INSERT INTO block_list VALUES(NULL, '$blockid','$moduleid')";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}
function show_all_module_block($blockid){
		global $db;
		$sql = "(SELECT a.*, b.Module_Name As Page_Name FROM block_list a, modules b where a.Block_ID = '$blockid' and a.Module_ID <> 0 and a.Module_ID = b.Module_ID)";
		$sql  .= " Union (Select *, 'Trang ch&#7911;' As Page_Name From block_list where Block_ID = '$blockid' and Module_ID = 0) order by Module_ID";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrowset($res);
		return $rows;
	}
function remove_block_page($listid){
		global $db;
		$sql = "Delete from block_list where List_ID =$listid";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
}
function del_block_list($block_id){
		global $db;
		$sql = "Delete from block_list where Block_ID =$block_id";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
}
//End Block List
//client
function show_all_block_client($position,$template){
	global $db,$function;
	$sql = "SELECT * FROM block where Position = $position and Template = '$template' ORDER BY St asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
function show_all_block_module_client($position,$module,$template){
	global $db,$function;
	$sql = "SELECT * FROM block a,block_list b where a.Position = $position and b.Module_ID = '$module' and a.Block_ID = b.Block_ID 
		and a.Template = '$template' ORDER BY a.St asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}	
function show_block_page($blockid){
	global $db,$function;
	$sql = "SELECT * FROM block_list where Block_ID = $blockid ORDER BY List_ID asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;
}
}
?>
