<?php 
session_start();
if(!isset($_SESSION["username"]) || !isset($_SESSION["password"])){
	header("Location:login.php");
	exit();
}
<a href="AttendenceForm.php" class="list-group-item">Do Attendance</a>
 ?>