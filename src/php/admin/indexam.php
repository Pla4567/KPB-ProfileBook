<?php 
include './../config/server/function.php';
session_start();
$conn = connectDB();

$idcard = $_SESSION['idcard'] OR $_SESSION['idnumber'];
$sqluserfrom = "SELECT * FROM loginfrom WHERE idcard = $idcard OR idnumber = $idcard LIMIT 1";
$result = $conn->query($sqluserfrom);
$rowuserfrom = $result->fetch_assoc();
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