<?php 
// Make the database connection.
$db = null;
if(defined("DB_DBMS")) {
	switch(DB_DBMS)
	{
		case 'mysql':
			include('class/db_mysql.php');
			$db = new db_mysql(DB_HOST, DB_USER, DB_PWD, DB_NAME, false);
			if (!$db) {die('Could not connect: ' . mysql_error());}
		break;
	}
}

?>