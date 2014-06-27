<?php

$mysqlhost='localhost';
$mysqluser='root';
$mysqlpass='';
$mysqldb='notebook';
if (!mysql_connect($mysqlhost,$mysqluser,$mysqlpass)) echo "cannot connect";

if (!mysql_select_db($mysqldb))echo "cannot DB";
?>