<?php
class Product{
function Product(){
	global $db;
}
function add_product($data, $file_name){
	global $db;
	$sql = "INSERT INTO product VALUES(
		NULL, 
		'".$data['product_category']."', 
		'".$data['product_name']."', 
		'".$data['product_name_en']."', 
		'".$data['product_name_search']."',
		'".$data['product_code']."', 
		'".$data['description']."', 
		'".$data['description_en']."', 
		'$file_name',
		1,
		0, 
		'".$data['product_price']."', 
		'".$data['product_price_en']."', 
		".$_SESSION['logined_information_detail']['Admin_ID'].", 
		".time().", 
		".$_SESSION['logined_information_detail']['Admin_ID'].", 
		".time().")";
	$res = $db->db_query($sql);
	return 1;}

function edit_product($id,$data, $file_name){
	global $db;
	$sql = "UPDATE product SET Category_ID = ".$data['product_category'].", Product_Name = '".$data['product_name']."', 
			Product_Name_EN = '".$data['product_name_en']."', Product_Name_Search = '".$data['product_name_search']."', Product_Code = '".$data['product_code']."', Image_Name = '$file_name', 
			Description = '".$data['description']."', Description_EN = '".$data['description_en']."', 
			Price = '".$data['product_price']."', Price_EN = '".$data['product_price_en']."',
			Update_By = ".$_SESSION['logined_information_detail']['Admin_ID'].", Update_Time = '".time()."' WHERE Product_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}

function show_all_product($category_id,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($category_id > 0){ $str = "and (a.Category_ID = $category_id or a.Category_ID in(Select Category_ID from product_category where Parent_ID = $category_id))";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, d.Category_Name 
		FROM product a, admin b, admin c, product_category d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID 
		and a.Category_ID = d.Category_ID $str ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function get_nums_product($category_id){
	global $db;
	if($category_id > 0){ $str = "Category_ID = $category_id";}
	$sql = "SELECT * FROM product $str";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function show_product($id){
	global $function,$db;
	$sql = "SELECT * FROM product Where Product_ID = $id";
	$res = $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	return $row;}

function del_product($id){
	global $db;
	$id = intval($id);
	$sql = "Delete from product where Product_ID = $id";
	$db->db_query($sql);
	return 1;}

function update_hot($id,$hot){
	global $db;
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update product set Hot = $hot, Update_By = $update_by, Update_Time = '$update_time' where Product_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}
	
function update_status($id,$status){
	global $db;
	$update_by = $_SESSION['logined_information_detail']['Admin_ID'];
	$update_time = time();
	$sql = "update product set Status = $status, Update_By = $update_by, Update_Time = '$update_time' where Product_ID = $id";
	$res = $db->db_query($sql);
	if($res){ return true;}
	else return false;}
//client
function show_top_product($type,$order_field,$order_type,$page, $per_page){
	global $db;
	if($type > 0){ $str = "and a.Hot = 1";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, d.Category_Name
		FROM product a, admin b, admin c, product_category d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and a.Category_ID = d.Category_ID and a.Status = 1 $str 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
function show_sale_product($order_field,$order_type,$page, $per_page){
	global $db;
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, d.Category_Name
		FROM product a, admin b, admin c, product_category d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and a.Category_ID = d.Category_ID and a.Status = 1 and a.Sale <> 0 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

	
	function show_all_product_for_carousel() {
		global $db;
		$sql = "SELECT Product_ID, Product_Name".SUFFIX." as Product_Name, Image_Name FROM product";
		$res = $db->db_query($sql);
		if($res) {
			$rows = $db->db_fetchrowset($res);
			return $rows;
		} else return false;
	}
	
	function show_all_product_hot() {
		global $db;
		$sql = "SELECT Product_ID, Product_Name".SUFFIX." as Product_Name, Image_Name FROM product WHERE Hot=1 LIMIT 4";
		$res = $db->db_query($sql);
		if($res) {
			$rows = $db->db_fetchrowset($res);
			return $rows;
		} else return false;
	}
	
	function get_cat_name($id) {
		global $db;
		$sql = "SELECT Category_ID, Category_Name".SUFFIX." as Category_Name, Information_ProductCat FROM product_category WHERE Category_ID=$id";
		$res = $db->db_query($sql);
		if($res) {
			$row = $db->db_fetchrow($res);
			return $row;
		} else return false;
	}
	
	function get_nums_all_product_in_cat($id) {
		global $db;
		$sql = "SELECT Product_ID FROM product WHERE Category_ID=$id";
		$res = $db->db_query($sql);
		$nums = $db->db_numrows($res);
		return $nums;
	}
	
	function get_all_products_in_cat($id, $page, $perpage) {
		global $db;
		$sql = "SELECT Product_ID, Product_Name".SUFFIX." as Product_Name, Image_Name, Price".SUFFIX." as Price, Description".SUFFIX." as Description 
				FROM product 
				WHERE Category_ID=$id ORDER BY Product_Name ASC LIMIT $page,$perpage";
		$res = $db->db_query($sql);
		if($res) {
			$rows = $db->db_fetchrowset($res);
			return $rows;
		} else return false;
	}
	
	function get_product_detail($id) {
		global $db;
		$sql = "SELECT Product_ID, Product_Name".SUFFIX." as Product_Name, Image_Name, Price".SUFFIX." as Price, Description".SUFFIX." as Description 
				FROM product 
				WHERE Product_ID=$id";
		$res = $db->db_query($sql);
		if($res) {
			$row = $db->db_fetchrow($res);
			return $row;
		} else return false;
	}
	
	function get_lastest_order_id() {
		global $db;
		$id = $db->db_inserted_id();
		return $id;
	}
	
	function update_order_nganluong($id, $payment_id) {
		global $db;
		$sql = "UPDATE order_detail SET Pay_Type=3, Payment_id='".$payment_id."' WHERE Order_ID=$id";
		$res = $db->db_query($sql);
		if($res) {
			return true;
		} else return false;
	}
	
	function get_lastest_order($id) {
		global $db;
		$sql = "SELECT a.*,FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change,FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y %H:%i:%s') AS Update_Time_Change 
				FROM order_detail a WHERE a.Order_ID='$id' order by a.Status asc";
		$res = $db->db_query($sql);
		if($res) {
			$row = $db->db_fetchrow($res);
			return $row;
		} else return false;
	}
	
function show_all_product_client($type,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($type > 0){ $str = "and a.Hot = 1";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, d.Category_Name
		FROM product a, admin b, admin c, product_category d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID 
		and a.Category_ID = d.Category_ID and a.Status = 1 $str 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function get_nums_product_client($type){
	global $db;
	if($type > 0){ $str = "and Hot = 1";}
	$sql = "SELECT * FROM product where Status = 1 $str";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function show_order_product_client($product_id,$catid,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($catid > 0){ $str = "and Category_ID = $catid";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change
		FROM product a, admin b, admin c d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID and a.Product_ID <> $product_id and a.Status = 1 $str 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
	
function show_all_product_status($category_id,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($category_id > 0){ $str = " and a.Status = 1 and (a.Category_ID = $category_id or a.Category_ID in(Select Category_ID from product_category where Parent_ID = $category_id))";}
	$sql = "SELECT a.*,b.Admin_Name as Create_Name,c.Admin_Name as Update_Name, FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y') AS Create_Time_Change, 
		FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y') AS Update_Time_Change, d.Category_Name
		FROM product a, admin b, admin c, product_category d Where a.Create_By = b.Admin_ID and a.Update_By = c.Admin_ID 
		and a.Category_ID = d.Category_ID $str 
		ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function get_nums_product_status($category_id){
	global $db;
	if($category_id > 0){ $str = "where Category_ID = $category_id and Status = 1";}
	$sql = "SELECT * FROM product $str";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}
function show_all_product_search($slt_price,$slt_category,$order_field,$order_type,$page, $per_page){
	global $db,$function;
	if($slt_price != 0){
		if($slt_price == 5000000){
			$str = "and REPLACE(Price, '.', '') >= $slt_price";
		}else{
		$temp = explode("-",$slt_price);
			$str = "and REPLACE(Price, '.', '') > $temp[0] and REPLACE(Price, '.', '') <= $temp[1]";
		}
	}
	if($slt_category > 0){
		$str .= " and Category_ID = $slt_category";
	}
	$sql = "SELECT a.* FROM product a Where Product_ID = Product_ID $str ORDER BY $order_field $order_type Limit $page, $per_page";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function get_nums_product_search($slt_price,$slt_category){
	global $db;
	if($slt_price != 0){
		if($slt_price == 5000000){
			$str = "and REPLACE(Price, '.', '') >= $slt_price";
		}else{
		$temp = explode("-",$slt_price);
			$str = "and REPLACE(Price, '.', '') > $temp[0] and REPLACE(Price, '.', '') <= $temp[1]";
		}
	}
	if($slt_category > 0){
		$str .= " and Category_ID = $slt_category";
	}
	$sql = "SELECT * FROM product where Product_ID = Product_ID $str";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}
//Shopping ---------------------------------------------------------------
function check_product_in_cart($session,$productid){
	global $db;
	$sql = "Select * from shopping where Session='$session' and Product_ID='$productid'";
	$res = $db->db_query($sql);
	$nums = $db->db_numrows($res);
	return $nums;}
/*
function update_product_in_cart($session,$productid){
	global $db;
	$update_time = time();
	$sql = "Update shopping set Amount = Amount + 1, Create_Time = $update_time where Session = '$session' and Product_ID = '$productid'";
	$res = $db->db_query($sql);
	return 1;}
*/
	
function update_product_in_cart($session,$productid, $qty){
	global $db;
	$update_time = time();
	$sql = "Update shopping set Amount = Amount + $qty, Create_Time = $update_time where Session = '$session' and Product_ID = '$productid'";
	$res = $db->db_query($sql);
	return 1;}	
/*
function add_product_in_cart($session,$productid){
	global $db;
	$create_time = time();
	$sql = "Insert Into shopping Values(NULL,'$session', '$productid','1',$create_time)";
	$res = $db->db_query($sql);
	return 1;}*/
	
function add_product_in_cart($session,$productid, $qty){
	global $db;
	$create_time = time();
	$sql = "Insert Into shopping Values(NULL,'$session', '$productid','$qty',$create_time)";
	$res = $db->db_query($sql);
	return 1;}	

function check_cart($session){
	global $db;
	$sql = "Select * from shopping where Session='$session'";
	$res = $db->db_query($sql);
	$nums = $db->db_numrows($res);
	return $nums;}

/*function show_cart($session){
	global $db;
	$sql = "Select a.*,b.*, b.Product_ID AS Pro_ID from shopping a, product b where a.Session='$session' and a.Product_ID = b.Product_ID Order By b.Product_Name asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}*/
	
function show_cart($session){
	global $db;
	$sql = "SELECT a.*,b.*, b.Product_ID AS Pro_ID FROM shopping a, product b 
			WHERE a.Session='$session' AND a.Product_ID = b.Product_ID ORDER BY b.Product_Name ASC";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}
	
function cart_info($session,$productid){
	global $db;
	$sql = "Select a.*,b.*, b.Product_ID AS Pro_ID from shopping a, product b where a.Session='$session' and a.Product_ID = b.Product_ID and a.Product_ID = $productid";
	$res = $db->db_query($sql);
	$row = $db->db_fetchrow($res);
	return $row;}
function update_amount($Cart_ID,$amount){
	global $db;
	$sql = "Update shopping set Amount = '$amount' where Shopping_ID = '$Cart_ID'";
	$res = $db->db_query($sql);
	return 1;}

function remove_cart($cartid,$session){
	global $db;
	$sql = "Delete From shopping where Session = '$session' and Shopping_ID = '$cartid'";
	$res = $db->db_query($sql);
	return 1;}
function clear_shoping($session){
	global $db;
	$thoigian = time() - 86400;
	$sql = "Delete From shopping where Session = '$session' and Create_Time < $thoigian";
	$res = $db->db_query($sql);
	return 1;}
function count_shoping($session){
	global $db;
	$sql = "SELECT * FROM shopping WHERE Session='$session'";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}	
function remove_product_cart($productid,$session){
	global $db;
	$sql = "Delete From shopping where Session = '$session' and Product_ID = '$productid'";
	$res = $db->db_query($sql);
	return 1;}
function remove_product_cart2($shoppingid){
	global $db;
	$sql = "DELETE FROM shopping WHERE Shopping_ID = '$shoppingid'";
	$res = $db->db_query($sql);
	return 1;}	
	
function insert_order($data,$strorder){
	global $db;
	$date = time();
	$yourname = $data['fullname'];
	$address = $data['address'];
	$phone = $data['phone'];
	$email = $data['email'];
	$requirements = $data['requirements'];
	$start_date = $data['start_date'];
	$start_date = explode("-",$start_date);
	$start_date = $start_date[2]."-".$start_date[1]."-".$start_date[0];
	$method = "";
	$paytype = $data['pay_type'];
	$sql = "Insert Into order_detail Values(NULL, '$yourname', '$address', '$phone', '$email', '$requirements', '$strorder', '$method', '$date','$start_date', '', '$date', '0', '$paytype', NULL)";
	$res = $db->db_query($sql);
	return 1;}

function delete_cart($session){
	global $db;
	$sql = "DELETE FROM shopping where Session = '$session'";
	$res = $db->db_query($sql);
	return 1;}

function get_nums_order(){
	global $db;
	$sql = "SELECT * FROM order_detail";
	$res = $db->db_query($sql);
	$num = $db->db_numrows($res);
	return $num;}

function show_all_order_page($page, $per_page){
	global $db;
	$sql = "SELECT *,FROM_UNIXTIME(Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change,FROM_UNIXTIME(Update_Time,'%d-%m-%Y %H:%i:%s') AS Update_Time_Change 
		FROM order_detail order by Create_Time desc Limit $page, $per_page ";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrowset($res);
	return $rows;}

function process_order($id, $status){
	global $db;
	$update_by = $_SESSION['logined_detail']['Admin_Name'];
	$update_date = time();
	$sql = "Update order_detail set Status = '$status', Update_By = '$update_by', Update_Time = '$update_date' Where Order_ID='$id'";
	$res = $db->db_query($sql);
	return 1;}

function show_info_order($id){
	global $db;
	$id = intval($id);
	$sql = "SELECT a.*,FROM_UNIXTIME(a.Create_Time,'%d-%m-%Y %H:%i:%s') AS Create_Time_Change,FROM_UNIXTIME(a.Update_Time,'%d-%m-%Y %H:%i:%s') AS Update_Time_Change 
		 FROM order_detail a WHERE a.Order_ID='$id' order by a.Status asc";
	$res = $db->db_query($sql);
	$rows = $db->db_fetchrow($res);
	return $rows;}

function delete_order($id){
	global $db;
	$id = intval($id);
	$sql = "DELETE FROM order_detail WHERE Order_ID='$id'";
	$res = $db->db_query($sql);
	return 1;}
	
function search($param) {
	global $db;
	$sql = "SELECT * FROM product WHERE Product_Name_Search LIKE '%$param%' ORDER BY Product_Name_Search ASC";
	$res = $db->db_query($sql);
	if($res) {
		$rows = $db->db_fetchrowset($res);
		return $rows;
	} else return false;
}
}
?>