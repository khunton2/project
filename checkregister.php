<?php
require_once 'config/db.php';
$userName = $_REQUEST[username];
//เช็คจากตาราง User
$sql = "SELECT * FROM User WHERE UserName='$UserName'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) == 0){
	echo "true,<span style='color:green'>ชื่อผู้ใช้งานใช้ได้ครับ</span>";
}
else{ 
	echo "false,<span style='color:red'>ชื่อผู้ใช้งานนี้ไม่ว่างครับ</span>";
}
?>