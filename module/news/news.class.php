<?php
class News{
function News(){
	global $db;
}
function add_news($data, $file_name){
	global $db;
	$title = $data['title'];
	$summary = $data['summary'];
	$description = $data['description'];
	$title_en = $data['title_en'];
	$summary_en = $data['summary_en'];
	$description_en = $data['description_en'];
	$source = $data['source'];
	$create_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$create_time = time();
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "INSERT INTO news VALUES(NULL, '$title', '$summary', '$description', '$title_en', '$summary_en', '$description_en', '$file_name','$source', 0, 0, $create_by, $create_time, $update_by, $update_time)";
    $res = $db->db_query($sql);
	if($res){ return true;}
	else return false;
}

function edit_news($id,$data, $file_name){
	global $db;
	$title = $data['title'];
	$summary = $data['summary'];
	$description = $data['description'];
	$title_en = $data['title_en'];
	$summary_en = $data['summary_en'];
	$description_en = $data['description_en'];
	$source = $data['source'];
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update news set Title = '$title', Summary = '$summary', Image_Name = '$file_name'
		, Description = '$description', Title_EN = '$title_en', Summary_en = '$summary_en', Description_EN = '$description_en'
		, Source = '$source',Update_By = $update_by, Update_Time = '$update_time' where News_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;
}

function show_all_news($page, $per_page){
	global $db,$function;
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y %H:%i:%s') AS Update_Time_Change
		FROM news a, admin b, admin c Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID ORDER BY News_ID desc Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	if($rows){
		for($i=0;$i<count($rows);$i++){
			$rows[$i]['Summary_Cut'] = $function->cutnchar($rows[$i]['Summary'],100);
		}
	}
	return $rows;}
	
function show_all_news2($page, $per_page){
	global $db,$function;
	$sql = "SELECT News_ID, Title".SUFFIX." as Title, Summary".SUFFIX." as Summary, Description".SUFFIX." as Description, Image_Name, Source, 
			Views, FROM_UNIXTIME(Update_Time,'%d-%m-%Y %H:%i:%s') AS Update_Time_Change
			FROM news ORDER BY News_ID DESC LIMIT $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	if($rows){
		for($i=0;$i<count($rows);$i++){
			$rows[$i]['Summary_Cut'] = $function->cutnchar($rows[$i]['Summary'],200);
			$rows[$i]['Title_r'] = $function->to_character($rows[$i]['Title']);
		}
	}
	return $rows;}	

function get_nums_news(){
	global $db;
	$sql = "SELECT * FROM news";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function show_news($id){
	global $function,$db;
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change FROM news a,admin b Where News_ID = $id and a.Create_By = b.Admin_ID";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrow($res);
	return $rows;}

function del_news($id){
	global $db;
	$id = intval($id);
	$sql = "Delete from news where News_ID = $id";
	$db->db_query($sql);
	return 1;}

function update_hot($id,$hot){
	global $db;
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update news set Hot = $hot, Update_By = $update_by, Update_Time = '$update_time' where News_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}
function update_view($id){
	global $db;
	$sql = "update news set Views = Views + 1 where News_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}
function show_all_news_search($keyword,$order_field,$order_type,$page, $per_page){
	global $db,$function,$limit_string;
	$sql = "SELECT * FROM news Where Title like '%$keyword%' or Summary like '%$keyword%' ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	if($rows){
		for($i=0;$i<count($rows);$i++){
			$rows[$i]['Summary_Cut'] = $function->cutnchar($rows[$i]['Summary'],100);
		}
	}
	return $rows;}

function get_nums_news_search($keyword){
	global $db;
	$sql = "SELECT * FROM news where Title like '%$keyword%' or Summary like '%$keyword%'";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}
//Block
function show_top_news($type,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($type > 0){ $str = "and a.Hot = $type";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change
		FROM news a, admin b, admin c Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID $str 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	if($rows){
		for($i=0;$i<count($rows);$i++){
			$rows[$i]['Title_Cut'] = $function->cutnchar($rows[$i]['Title'],100);
			$rows[$i]['Summary_Cut'] = $function->cutnchar($rows[$i]['Summary'],150);
		}
	}
	return $rows;}
function show_order_news_client($news_id,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change
		FROM news a, admin b, admin c Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and a.News_ID <> $news_id 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
//End Blcok

}
?>
