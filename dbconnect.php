<?php
$host='localhost';
$user='root';
$pass='root';
$s='personaility';
if(@mysql_connect($host, $user, $pass)){
	if(@mysql_select_db($s)){
		//echo 'connected to db';
 	}
 	else
 	echo 'could not conected to database';
}
else
'could not conect to the server';
?>