<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

	session_start();
	include('include/config.php');
	include('include/path.php');
	include('data/config_site.php');
	include('class/db_mysql.php');
	//include('language/language_vn.php');
	include('class/functions.php');
	include('class/nganluong.php'); // thanh toan ngan luong
	include('libs/Smarty.class.php');
	//------------------------------
	require("module/homepage/main.php");
	require("module/category/category.class.php");
	require("module/product/product.class.php");
	require("module/product/main.php");
	require("module/cms/cms.class.php");
	require("module/cms/main.php");
	require("module/setting/main.php");
	require("module/contact/contact.class.php");
	require("module/contact/main.php");
	require("module/link/link.class.php");
	require("module/link/main.php");
	require("module/news/news.class.php");
	require("module/news/main.php");
	require("module/yahoo/yahoo.class.php");
	require("module/yahoo/main.php");
    require("module/information/information.class.php");
    require("module/information/main.php");
	require("module/quickcount/quickcount.class.php");
	require("module/block/block.class.php");
	//------------------------------
	$function = new Functions;
	$smarty = new Smarty;	
	$db = null;
	$db = new db_mysql(DB_HOST, DB_USER, DB_PWD, DB_NAME, false);
	if(!$db){die('Could not connect: ' . mysql_error());}
?>