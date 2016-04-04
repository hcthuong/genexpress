<?php

class Yahoo{
function Yahoo(){
	global $db;}

function add_yahoo($nick, $fullname){
	global $db;
	$create_date = time();
	$sql = "INSERT INTO yahoo VALUES(NULL, '$nick', '$fullname')";
	$res = $db->db_query($sql);
	return 1;
	}

function edit_yahoo($id,$nick, $fullname){
	global $db;
	$lastupdate = time();
	$sql = "update yahoo set Nick = '$nick', Fullname = '$fullname' where Yahoo_ID = '$id'";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;
	}

function show_all_yahoo($page, $per_page){
	global $db,$function;
	$sql = "SELECT * FROM yahoo ORDER BY Yahoo_ID desc Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;
	}

function get_nums_yahoo(){
		global $db;
		$sql = "SELECT * FROM yahoo";
		$res = $db->db_query($sql);
		$num = $db->db_numrows($res);
		return $num;
	}

function show_yahoo($yahooid){
	global $function,$db;
	$sql = "SELECT * FROM yahoo Where Yahoo_ID = '$yahooid'";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrow($res);
	return $rows;
	}

function del_yahoo($id){
	global $db;
	$id = intval($id);
	$sql = "Delete from yahoo where Yahoo_ID='$id'";
	$db->db_query($sql);
	return 1;
	}

//client
function show_all_yahoo_client(){
	global $db,$function;
	$sql = "SELECT * FROM yahoo ORDER BY Yahoo_ID asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;
	}

}
?>
