
<?php 
$conn=pg_connect("host = localhost port = 5432 dbname = hearing_disorders user = postgres password = 1234");
if(!$conn){
	die('database pg connection failed');
}
?>