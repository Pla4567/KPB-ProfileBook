<?php 
//เครียร์ session ทั้งหมดและกลับไปที่หน้า login
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>