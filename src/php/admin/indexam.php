<?php 
include './../config/server/function.php';
session_start();
$conn = connectDB();
$rowuserfrom = getselectuserfrom();
?>
<title><%= pageTitle %></title>

<body>
    <?php echo $rowuserfrom['idcard']; ?>
    <?php echo $rowuserfrom['idnumber']; ?>
    <?php echo $rowuserfrom['pfname']; ?>
    <?php echo $rowuserfrom['firstname']; ?>
    <?php echo $rowuserfrom['midname']; ?>
    <?php echo $rowuserfrom['lastname']; ?>
    <?php echo $rowuserfrom['status']; ?>
</body>