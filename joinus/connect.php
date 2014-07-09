<?php

$dbhost='localhost';
$dbusername='aawprod_admin';
$dbpass='admin';
$dbname='aawprod_test';

$link=mysql_connect($dbhost,$dbusername,$dbpass) or die("Could not connect to MySQL");
mysql_select_db($dbname,$link) or die("No database");

?>