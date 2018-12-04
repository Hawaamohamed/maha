<?
$hostname="localhost";
$database="school";
$username="root";
$password="abc123";
$con=mysql_connect($hostname , $username , $password);
if(!$con)
{
	die("could not connect" . mysql_error());
}
$select_db=mysql_select_db($database , $con);
if(!$select_db)
{
	mysql_close($con);
	die("could not select_db" . mysql_error());
}
?>