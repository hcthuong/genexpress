<?php
session_start();
include("../modules/common/common.class.php");
$oCom = new Common;
session_destroy();
$oCom->goto_URL("index.php?module=login");

?>