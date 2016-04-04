<?php
class Category{
function Category(){
	global $db;
}
//Begin category
function category_add($module,$category_name, $category_name_en,$parent_category, $information_productcat,$type){
	global $db;
	$table_name = $module.'_category';
	$create_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$create_time = time();
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	if($type == 0){
		$sql = "Insert Into $table_name values(NULL, '$category_name', '$category_name_en', $create_by, $create_time, $update_by, $update_time)";
	}else{
		$sql = "Insert Into $table_name values(NULL, '$category_name', '$category_name_en', $parent_category, $information_productcat, $create_by, $create_time, $update_by, $update_time)";
	}
	$res = $db->db_query($sql);
	return 1;
}

function category_edit($category_id,$module,$category_name,$category_name_en,$parent_category, $information_productcat,$type){
	global $db;
	$table_name = $module.'_category';
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	if($type == 0){
		$sql = "Update $table_name set Category_Name = '$category_name', Category_Name_EN = '$category_name_en', Update_By = $update_by, Update_Time = $update_time where Category_ID = $category_id";
	}else{
		$sql = "Update $table_name set Category_Name = '$category_name', Category_Name_EN = '$category_name_en', Parent_ID = '$parent_category', Information_ProductCat=$information_productcat, Update_By = $update_by, Update_Time = $update_time where Category_ID = $category_id";}
	$res = $db->db_query($sql);
	return 1;
}

function get_nums_category($module){
	global $db;
	$table_name = $module.'_category';
	$sql = "SELECT * FROM $table_name";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
}

function show_all_parent_category($type,$module,$order_field_category,$order_type_category,$page,$per_page){
	global $db;
	$table_name = $module.'_category';
	if($type == 0){
		$sql = "Select a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(Update_Time,'%d-%m-%Y') AS Update_Time_Change 
			from $table_name a, admin b, admin c where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID 
			ORDER BY a.$order_field_category $order_type_category";
	}else{
		$sql = "Select a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(Update_Time,'%d-%m-%Y') AS Update_Time_Change 
			from $table_name a, admin b, admin c where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and
			a.Parent_ID = 0 ORDER BY a.$order_field_category $order_type_category";// limit $page,$per_page";
	}
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;
}

function show_all_product_category($module,$order_field_category,$order_type_category){
	global $db,$function;
	$table_name = $module.'_category';
	$sql = "SELECT * FROM $table_name where Parent_ID = 0 ORDER BY $order_field_category $order_type_category";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	for($i=0; $i < count($rows); $i++){
		$rows[$i]['title_kd'] = $function->to_character($rows[$i]['Category_Name']);
		$rows[$i]['num_sub']= $this->check_subcat($module,$rows[$i]['Category_ID']);
		}
	return $rows;
}

function num_all_product_category($module){
	global $db,$function;
	$table_name = $module.'_category';
	$sql = "SELECT * FROM $table_name where Parent_ID = 0 ORDER BY Category_Name asc";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
}

function show_all_product_sub_category($module,$parentid,$order_field_category,$order_type_category){
	global $db,$function;
	$table_name = $module.'_category';
	$sql = "Select a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(Create_Time,'%d-%m-%Y') AS Create_Time_Change,
			FROM_UNIXTIME(Update_Time,'%d-%m-%Y') AS Update_Time_Change 
			from $table_name a, admin b, admin c where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and
			a.Parent_ID = $parentid ORDER BY a.$order_field_category $order_type_category";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	for($i=0; $i < count($rows); $i++){
		$rows[$i]['title_kd'] = $function->to_character($rows[$i]['Category_Name']);}
	return $rows;
}

function category_list($type,$module,$category_id,$order_field_category,$order_type_category){
	global $db,$function;
	$table_name = $module.'_category';
	if($type == 0){
		$sql = "SELECT * from $table_name order by $order_field_category $order_type_category";
	}else{
	if($category_id > 0){$str = " and Category_ID <> ".intval($category_id);}
		$sql = "SELECT * from $table_name where Parent_ID = 0 $str order by $order_field_category $order_type_category";
	}
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;
}

function list_category() {
	global $db;
	$sql = "SELECT Category_ID, Category_Name".SUFFIX." as Category_Name FROM product_category WHERE Parent_ID=0 ORDER BY Category_Name ASC";
	$res = $db->db_query($sql);
	if($res) {
		$rows = $db->db_fetchrowset($res);
		return $rows;
	} else return false;
}

function category_delete($module,$category_id){
	global $db;
	$table_name = $module.'_category';
	$sql = "Delete from $table_name where Category_ID = '$category_id'";
	$db->db_query($sql);
	return 1;
}

function check_category($module,$category_id){
	global $db;
	$sql = "SELECT * FROM $module where Category_ID = $category_id";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
}

function check_subcat($module,$catid){
	global $db;
	$table_name = $module.'_category';
	$sql = "SELECT * FROM $table_name where Parent_ID = $catid";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;
	}

function show_category($type,$module,$category_id){
	global $db,$function;
	$table_name = $module.'_category';
	$sql = "SELECT * FROM $table_name Where Category_ID = '$category_id'";
	$res = $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	$row['Summary_Cut'] = $function->cutnchar($row['Summary'],500);
	if(strlen($row['Summary']) > 500){$row['Check'] = 1;}else{$row['Check'] = 0;}
	if($type == 1){
		if($row['Parent_ID'] != 0){
			$parent = $this->show_category(1,$module,$row['Parent_ID']);
			$row['Category_Name_Path'] = $parent['Category_Name'];
		}
	}
	return $row;
}

}
?>
