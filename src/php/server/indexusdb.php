<?php
include './../../../config/server/function.php';
session_start();
$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $numlogin = isset($_POST['numlogin']) ? htmlspecialchars(mysqli_real_escape_string($conn, trim($_POST['numlogin']))) : null;

  //แก้ไขรหัสผ่าน
    $idcard = $_SESSION['idcard'] ?? $_SESSION['idnumber'];

    // ดึง hash เดิม
    $query_update = "UPDATE loginfrom SET numlogin=? WHERE idcard=? OR idnumber=? LIMIT 1";
    $stmt = $conn->prepare($query_update);
    $stmt->bind_param('sss', $numlogin, $idcard, $idcard);
    $stmt->execute();

    // $query_update = "UPDATE loginfrom SET numlogin = '$numlogin' WHERE idcard = '$idcard' OR idnumber = '$idcard' LIMIT 1";
    // $call_update = mysqli_query($conn, $query_update);

        if ($stmt) {
            // echo "เปลี่ยนรหัสผ่านสำเร็จ";
        $_SESSION['success_password'] = true;
            header("Location: ../../indexus.php");
        } else {
            echo "เกิดข้อผิดพลาดในการเปลี่ยนรหัสผ่าน";
        }
    exit();
}
?>