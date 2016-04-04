<?php

class Quickcount{
function Quickcount(){
		global $db;
	}
	
function show_count(){
		global $db;
		$sql = "SELECT * FROM statistics";
		$res = $db->db_query($sql);
		$rows = $db->db_fetchrow($res);
		return $rows;
	}
function update_count($statcls,$hit){
		global $db;
		$sql = "UPDATE statistics SET clients='".$statcls."', hits='".$hit."'";
		$res = $db->db_query($sql);
		if($res){ return true;}
		else return false;
	}

}
?>
