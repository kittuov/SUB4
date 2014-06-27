<?php
$mysqlhost='mysql.hostinger.in';
$mysqluser='u791919998_admin';
$mysqlpass='K!ttu1234';
$mysqldb='u791919998_note';

$mysqlhost='localhost';
$mysqluser='root';
$mysqlpass='';
$mysqldb='notebook';
if (!mysql_connect($mysqlhost,$mysqluser,$mysqlpass)) echo "cannot connect";

if (!mysql_select_db($mysqldb))echo "cannot DB";
?>