<?php
$hostName ='localhost';
$dbusername='root';
$dbpassword='';
$dbName='house hunting';
$db=new mysqli( $hostName, $dbusername, $dbpassword, $dbName );
if ($db->connect_error) {
    die("Connection Failed".$db->connect_error);
}
?>
