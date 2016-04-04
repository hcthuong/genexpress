<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
//ini_set("display_errors", 1);

	session_start();
	include('../include/config.php');
	include('../include/path.php');
	include('../data/config_site.php');
	include('../class/db_mysql.php');
	include('../class/functions.php');
	include('../language/language_vn.php');
	include('../libs/Smarty.class.php');
	include('../CKEditor/ckeditor.php');
	//------------------------------
	require("../module/homepage/main.php");
	require("../module/cms/cms.class.php");
	require("../module/cms/main.php");
	require("../module/setting/main.php");
	require("../module/category/category.class.php");
	require("../module/product/product.class.php");
	require("../module/product/main.php");
	require("../module/contact/main.php");
	require("../module/link/link.class.php");
	require("../module/link/main.php");
	require("../module/news/news.class.php");
	require("../module/news/main.php");
	require("../module/block/block.class.php");
	require("../module/block/main.php");
	require("../module/yahoo/yahoo.class.php");
	require("../module/yahoo/main.php");
    require("../module/information/information.class.php");
    require("../module/information/main.php");
    require("../module/module_control/module.class.php");
    require("../module/module_control/main.php");
	//------------------------------
	$smarty = new Smarty;
	$function = new Functions;
	$db = null;
	$db = new db_mysql(DB_HOST, DB_USER, DB_PWD, DB_NAME, false);
?>